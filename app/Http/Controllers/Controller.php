<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $product = new Product([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
        $product->save();


        return response()->json('Product Added Successfully.');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->get('title');
        $product->body = $request->get('body');
        $product->save();


        return response()->json('Product Updated Successfully.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('Product Deleted Successfully.');
    }
}
