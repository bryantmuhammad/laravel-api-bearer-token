<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductRequest $request)
    {
        Product::create($request->all());

        return response()->json([
            'product' =>  $request->all(),
            'message' => 'Product has been create'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        Product::where('id', $product->id)->update($request->all());

        return response()->json([
            'product' => $request->all(),
            'message' => 'Product has been updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        $product = Product::where('id', $request)->get();

        if ($product->count()) {
            Product::destroy($product->id);

            return response()->json([
                'message' => 'Product ' . $product->name . " has been deleted."
            ], 200);
        }

        return response()->json([
            'message' => 'Product Not Found.'
        ], 200);
    }
}
