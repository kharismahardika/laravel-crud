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
        //menginput product ke database
        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        
        //me return ke halaman yang sama
        return redirect('products');
    }

    public function viewProducts()
    {   
        //all berfungsi untuk mengambil semua data yang ada di table product
        $products = Product::all();

    
        //compact berfungsi untuk melempar variable dan isinya ke view
        return view('products', compact('products'));
    }

    public function edit($id)
    {   
        //parameter id digunakan untuk menentukan product mana yang akan di edit
        $product = Product::findOrFail($id);

        return view('edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        Product::where('id', $id)->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return redirect('products');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }
}
