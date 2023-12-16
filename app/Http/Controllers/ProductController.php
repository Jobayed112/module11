<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        $products= Product::all();
        return view('layouts.products',compact('products'));
    }
    function create(){
        return view('products.create');
    }
    function stroe(Request $request){
        $request->validate([
            'name' => 'required',
            'quantity'=>'requied',
            'price'=>'requied',
            'Remark'=>'requied',

        ]);
        Product::created($request->all());
        return redirect()->route('layouts.index')->with('Success', 'Product Created Successfully.');
        // return view('products.store');
    }
    function show(Product $product){
        return view('products.show',compact('product'));

    }
    function edit(Product $product){

        return view('products.edit',compact('product'));
    }
    function update(Request $request , Product $product){
        $request->validate([
            'name' => 'required',
            'quantity'=>'requied',
            'price'=>'requied',
            'Remark'=>'requied',
        ]);
        $product->update($request->all());

        return redirect()->route('layouts.index')->with('success', 'Product updated successfully.');
    }
    function delete(Product $product){
        return redirect()->route('layouts.index')->with( 'success', 'Product deleted successfully.');
    }
}
