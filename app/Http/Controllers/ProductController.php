<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // If there's a search query, filter the results by product name
        if ($request->has('search') && $request->search != '') {
            $query->where('product_name', 'like', '%' . $request->search . '%');
        }

        // Paginate the results (optional, for large data sets)
        $products = $query->paginate(10);

        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required|numeric',
            'product_detail' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        Product::create($request->only(['product_name', 'price', 'product_detail', 'status']));

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    public function show($id)
    {
        // Fetch the product by ID
        $product = Product::findOrFail($id);

        // Return the show view with the product data
        return view('products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required|numeric',
            'product_detail' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        $product->update($request->only(['product_name', 'price', 'product_detail', 'status']));

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
