<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products|max:255',
            'price' => 'required|numeric|decimal:0,2|min:0|max:9999999999.99',
            'weight_kg' => 'required|numeric|decimal:0,3|min:0|max:9999999.999',
            'category_id' => 'integer',
        ]);
        $product = new Product($validated);
        $product->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('product', ['product' => Product::all()->where('id', $id)->first()]);
    }

    public function orders(string $id): View
    {
        $product = Product::all()->where('id', $id)->first();

        return view('product_orders', [
            'product' => $product,
            'orders' => $product ? $product->order : collect(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('product_edit', ['product' => Product::all()->where('id', $id)->first(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request -> validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|decimal:0,2|min:0|max:9999999999.99',
            'weight_kg' => 'required|numeric|decimal:0,3|min:0|max:9999999.999',
            'category_id' => 'integer',
        ]);

        $product = Product::all()->where('id', $id)->first();
        $product->update($validated);
        $product->save();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect('/products');
    }
}
