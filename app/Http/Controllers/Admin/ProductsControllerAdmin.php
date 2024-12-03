<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductsControllerAdmin extends Controller
{
    public function index()
    {
        $products = product::orderBy('name')->get();
        return view('admin.product.products', compact('products'));
    }
    public function createproduct(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products,name',
                'ar_name' => 'required|unique:products,ar_name',
                'value' => 'required|unique:products,value',
                'price_per_1000' => 'required|numeric',
            ]
        );
        $product = new Product();
        $product->name = request('name');
        $product->ar_name = request('ar_name');
        $product->value = request('value');
        $product->price_per_1000 = request('price_per_1000');
        $product->save();
        return redirect()->route('admin.products2')->with('success', 'Add Product Successfully!');
    }
    public function updateproduct(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|unique:products,name,' . $id,
                'ar_name' => 'required|unique:products,ar_name,' . $id,
                'value' => 'required|unique:products,value,' . $id,
                'price_per_1000' => 'required|numeric',

            ]
        );
        $product = Product::find($id);
        $product->name = request('name');
        $product->ar_name = request('ar_name');
        $product->value = request('value');
        $product->price_per_1000 = request('price_per_1000');
        $product->save();
        return redirect()->route('admin.products')->with('success', 'Update Product Successfully!');
    }


    public function search(Request $request)
    {

        $search = $request->input('search');
        // Perform the search query using your orders model
        $products = product::where('name', 'like', '%' . $search . '%')
            ->orWhere('ar_name', 'like', '%' . $search . '%')
            ->orWhere('value', 'like', '%' . $search . '%')
            ->get();
        return view('admin.product.products', ['products' => $products]);
    }
}
