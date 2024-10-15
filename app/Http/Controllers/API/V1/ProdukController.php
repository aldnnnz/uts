<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Http\Resources\ProdukResource;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProdukResource::collection(Produk::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request)
    {
        $produk = Produk::create($request->validated());
        return new ProdukResource($produk);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return ProdukResource::make($produk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $produk->update($request->validated());
        return new ProdukResource($produk);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return response()->json([
            'message' => 'Produk deleted successfully'
        ]);
    }
}
