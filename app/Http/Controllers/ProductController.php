<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
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
        $parnter = Partner::find($request->partner_id);
        $product = Product::find(1);
        $partner = $product->partner;

        $product = Product::create([
            'user_id' => $request->user()->id,
            'company_name' => $request->company_name,
            'company_website' => $request->company_website,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'name' => $request->name,
            'description' => $request->description,
            'image' => Storage::disk('public')->put('products', $request->file('image')),
            'url' => $request->url,
            'address' => $request->address,
            'partner_id' => $partner

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        
    }
}
