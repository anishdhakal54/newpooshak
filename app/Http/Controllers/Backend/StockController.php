<?php

namespace App\Http\Controllers\Backend;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Maatwebsite\Excel\Facades\Excel;

class StockController extends Controller
{
    public function getStock()
    {
        $products = Product::all();
        return view('backend.stock', compact('products'));
    }

  public function export()
  {
    return Excel::download(new UsersExport, 'stockwe.xlsx');
  }
}
