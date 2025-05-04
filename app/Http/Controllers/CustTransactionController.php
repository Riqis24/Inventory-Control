<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustTransactions;
use App\Models\ProductTransactions;
use Illuminate\Http\Request;

class CustTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        $transactions = CustTransactions::query()->with('customer')->orderBy('id', 'desc')->get();
        return view('report.CustTransaction', compact('customers', 'transactions'));
    }

    public function detailTransaction($id)
    {
        $details = ProductTransactions::query()->with(['custTransaction', 'product', 'measurement'])->where('transaction_id', $id)->get();
        $transaction = CustTransactions::query()->with('customer')->where('id', $id)->first();
        // dd($transaction);
        return view('report.ProductTransaction', compact('details', 'transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
