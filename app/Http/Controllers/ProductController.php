<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function home()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return back();
    }

    public function viewProducts()
    {
        return view('products');
    }

    public function edit()
    {
        return view('edit');
    }
}
