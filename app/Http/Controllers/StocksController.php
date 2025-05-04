<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\stocks;
use App\Models\StockTransactions;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StorestocksRequest;
use App\Http\Requests\UpdatestocksRequest;
use Illuminate\Validation\ValidationException;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = stocks::query()->orderBy('id', 'desc')->get();
        return view('report.Stock', compact('stocks'));
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
    public function show(stocks $stocks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stocks $stocks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestocksRequest $request, stocks $stocks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(stocks $stocks)
    {
        //
    }
}
