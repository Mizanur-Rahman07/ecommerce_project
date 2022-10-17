<?php

namespace App\Http\Controllers;

use App\Models\Product;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct()
    {
        return view('admin.product.add-product');
    }
    public function saveProduct(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->description = $request->description;
        $product->image = $this->saveImage($request);
        $product->save();
        return redirect('/manage-product')->with('message', 'Update Success');
    }

    public function saveImage($request)
    {
        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'adminAsset/product_image/';
        $imgUrl = $directory . $imageName;
        $image->move($directory, $imageName);
        return $imgUrl;
    }
    public function manageProduct()
    {
        return view('admin.product.manage-product', [
            'products' => Product::all()
        ]);
    }

    public function status($id)
    {
        $products = Product::find($id);
        if ($products->status == 1) {
            $products->status = 0;
            $products->save();
            return back();
        } else {
            $products->status = 1;
            $products->save();
            return back();
        }
    }
    public function editProduct($id)
    {
        return view('admin.product.edit-product', [
            'products' => Product::find($id)
        ]);
    }

    public function updateProduct(Request $request)
    {
        $products = Product::find($request->product_id);
        $products->product_name = $request->product_name;
        $products->product_price = $request->product_price;
        $products->description = $request->description;
        if ($request->file('image')) {
            if ($products->image) {
                unlink($products->image);
            }
            $products->image = $this->saveImage($request);
        }
        $products->save();
        return redirect('/manage-product')->with('message', 'Insert Success');
    }


    public function deleteProduct(Request $request)
    {
        $products = Product::find($request->product_id);
        if ($products->image) {
            unlink($products->image);
        }
        $products->delete();
        return back()->with('message', 'Delete success');
    }
}