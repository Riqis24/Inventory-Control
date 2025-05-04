<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Measurement;
use App\Models\ProductMeasurements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->with('measurement')->orderBy('id', 'desc')->get();
        $satuans = Measurement::query()->orderBy('id', 'desc')->get();
        return view('master.ProductMstrList', compact('products', 'satuans'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function updateMeasurement(request $request)
    {
        try {
            $request->validate([
                'product' => 'required',
                'satuan' => 'required',
                'conversi' => 'required',
            ]);

            // dd($request->all());

            ProductMeasurements::create([
                'product_id' => $request->product,
                'measurement_id' => $request->satuan,
                'conversion' => $request->conversi,
            ]);

            return redirect()->back()->with('success', 'Product berhasil ditambahkan!');

        } catch (ValidationException $e) {
            // Laravel akan otomatis redirect back, tapi kalau kamu mau manual:
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (Exception $e) {
            Log::error('Gagal menambahkan Satuan', ['error' => $e->getMessage()]);

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan satuan.');
        }
    }


    public function EditPrdMeasurement($idProduct)
    {
        $products = ProductMeasurements::query()->with(['product', 'measurement'])->where('product_id', $idProduct)->get();
        $default = Product::query()->with('measurement')->where('id', $idProduct)->first();
        $satuans = Measurement::query()->get();
        return view('master.PrdMeasurement', compact('products', 'default', 'satuans'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'products' => 'required|array',
                'products.*' => ['required', 'unique:products,name'],
                'satuans' => 'required|array',
                'satuans.*' => ['required'],
                'codes' => 'required|array',
                'codes.*' => ['required', 'unique:products,code'],
                'descriptions' => 'required|array',
                'descriptions.*' => ['required'],
            ]);

            foreach ($request->codes as $index => $productCode) {
                Product::create([
                    'code' => $productCode,
                    'name' => $request->products[$index],
                    'measurement_id' => $request->satuans[$index],
                    'description' => $request->descriptions[$index],
                    'is_stockable' => isset($request->is_stockables[$index]) ? 1 : 0,
                ]);

                ProductMeasurements::create([
                    'product_id' => Product::latest('id')->first()->id,
                    'measurement_id' => $request->satuans[$index],
                ]);
            }

            return redirect()->back()->with('success', 'Product berhasil ditambahkan!');
        } catch (ValidationException $e) {
            // Laravel akan otomatis redirect back, tapi kalau kamu mau manual:
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (Exception $e) {
            Log::error('Gagal menambahkan Product', ['error' => $e->getMessage()]);

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan Product.');
        }
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
