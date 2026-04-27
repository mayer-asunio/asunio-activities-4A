<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller
{
   public function index(Request $request)
{
    $query = Product::query();

    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->min) {
        $query->where('price', '>=', $request->min);
    }

    if ($request->max) {
        $query->where('price', '<=', $request->max);
    }

    if ($request->sort == 'name_asc') {
        $query->orderBy('name', 'asc');
    } elseif ($request->sort == 'name_desc') {
        $query->orderBy('name', 'desc');
    } elseif ($request->sort == 'price_low') {
        $query->orderBy('price', 'asc');
    } elseif ($request->sort == 'price_high') {
        $query->orderBy('price', 'desc');
    }

    $products = $query->get();

    return view('products.index', compact('products'));
}

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created.');
    }

    public function show(Product $product)
    {
        $qr = QrCode::size(200)->generate(json_encode([
            'id'    => $product->id,
            'name'  => $product->name,
            'price' => $product->price,
        ]));

        return view('products.show', compact('product', 'qr'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted.');
    }
}