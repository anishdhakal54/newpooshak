<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class StockController extends Controller
{
    public function getStock()
    {
        $products = Product::all();
        return view('backend.stock', compact('products'));
    }
}
