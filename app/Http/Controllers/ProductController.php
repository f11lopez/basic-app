<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->get();

        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);
        $product = Product::create($validatedData);

        return new ProductResource($product);
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'max:255',
            'price' => 'numeric',
            'category_id' => 'exists:categories,id'
        ]);
        $product->update($validatedData);

        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }

    public function index2()
    {
        // $products = [
        //     ['id' => 1, 'name' => "Product 1", 'price' => 100],
        //     ['id' => 2, 'name' => "Product 2", 'price' => 200],
        // ];
        // return view('products.index', compact('products'));
        $products = Product::orderBy('name')->get();
        //return $products->toJson();
        //return $products;
        return view('products.index', compact('products'));
    }

    public function show2(Product $product)
    {
        //dd(compact('product'));
        //$product = Product::find($product);
        //$product = Product::findOrFail($product);
        //return view('products.show', ['product' => $product]);
        return view('products.show', compact('product'));
    }

    public function store2(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);
        // $data = $request->all();
        $product = Product::create($validatedData);

        return view('products.show', compact('product'));
    }

    public function update2(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'max:255',
            'price' => 'numeric',
            'category_id' => 'exists:categories,id'
        ]);
        // $data = $request->all();
        $product->update($validatedData);

        return view('products.show', compact('product'));
    }

    public function destroy2(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}
