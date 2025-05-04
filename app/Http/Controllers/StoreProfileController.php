<?php

namespace App\Http\Controllers;

use App\Models\storeProfile;
use App\Http\Requests\StorestoreProfileRequest;
use App\Http\Requests\UpdatestoreProfileRequest;

class StoreProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = StoreProfile::first();
        return view('store.StoreProfile', compact('profile'));
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
    public function store(StorestoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(storeProfile $storeProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(storeProfile $storeProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestoreProfileRequest $request, storeProfile $storeProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(storeProfile $storeProfile)
    {
        //
    }
}
