<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index()
    {
        return view('frontEnd.home.home', [
            // 'products' => Product::where('status', 1)->orderBy('id', 'desc')->skip(1)->take(5)->get()
            'products' => Product::where('status', 1)->orderBy('id', 'desc')->take(5)->get()
        ]);
    }

    public function productDetails($id)
    {
        return view('frontEnd.product.product-details', [
            'product' => Product::find($id)
        ]);
    }

    public function shopPage()
    {
        return view('frontEnd.shop.shop-page');
    }

    public function cartSystem()
    {
        return view('frontEnd.cart.cart');
    }
    public function checkoutSystem()
    {
        return view('frontEnd.checkout.checkout');
    }
    public function category()
    {
        return view('frontEnd.category.category');
    }
}