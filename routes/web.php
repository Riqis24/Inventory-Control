<?php

use App\Models\Measurement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CustTransactionController;
use App\Http\Controllers\ExpenseTransactionController;
use App\Http\Controllers\FinancialRecordController;
use App\Http\Controllers\StockTransactionController;
use App\Http\Controllers\ReceivablePaymentController;
use App\Http\Controllers\ProductMeasurementController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\StoreProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('UserMstr', UserController::class);
    Route::put('/UserMstr/{id}/update-inline', [UserController::class, 'updateInline'])->name('UserMstr.updateInline');

    Route::resource('RoleMstr', RoleController::class);
    Route::get('RoleMstr/{idRole}/assignRole', [RoleController::class, 'assignRole'])->name('RoleMstr.assignRole');
    Route::put('RoleMstr/{idRole}/update', [RoleController::class, 'update'])->name('RoleMstr.update');

    Route::resource('PermissionMstr', PermissionController::class);

    Route::resource('ProductMstr', ProductController::class);
    Route::post('ProductMstr/updateMeasurement', [ProductController::class, 'updateMeasurement'])->name('updateMeasurement');
    Route::get('ProductMstr/{idProduct}/EditPrdMeasurement', [ProductController::class, 'EditPrdMeasurement'])->name('EditPrdMeasurement');

    Route::resource('MeasurementMstr', MeasurementController::class);

    Route::resource('Transaction', TransactionController::class);

    Route::resource('CustMstr', CustomerController::class);

    Route::resource('CustTransaction', CustTransactionController::class);
    Route::get('CustTransaction/{transId}/detail', [CustTransactionController::class, 'detailTransaction'])->name('getDetailTransaction');

    Route::resource('ProductTransaction', ProductTransactionController::class);

    Route::resource('StockTransaction', StockTransactionController::class);

    Route::resource('ProductMeasurement', ProductMeasurementController::class);

    Route::resource('PriceMstr', PriceController::class);

    Route::resource('FinancialRecord', FinancialRecordController::class);

    Route::resource('ExpenseTransaction', ExpenseTransactionController::class);

    Route::resource('Stock', StocksController::class);

    Route::resource('ReceivablePayment', ReceivablePaymentController::class);

    Route::resource('StoreProfile', StoreProfileController::class);

    // Route::get('Transaction/{idProduct}/get-satuans', TransactionController::class);
    Route::get('/get-product', [TransactionController::class, 'getProduct']);
    Route::get('/get-satuans/{product}', [TransactionController::class, 'getSatuans']);
    Route::get('/get-harga/{product}/{satuan}', [TransactionController::class, 'getHarga']);
});

require __DIR__ . '/auth.php';
