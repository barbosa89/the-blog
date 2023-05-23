<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest('id')
            ->paginate(15, ['id', 'description','price', 'created_at']);

        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = new Product();
        $product->description = $request->string('description');
        $product->price = $request->float('price');
        $product->save();

        return redirect()->route('admin.products.show', $product);
    }

    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $product->description = $request->string('description');
        $product->price = $request->float('price');
        $product->save();

        return redirect()->route('admin.products.show', $product);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
