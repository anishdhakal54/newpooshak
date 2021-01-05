<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Getquote;
use App\RequestProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequstedProductController extends Controller
{
    public function getRequestedProduct()
    {


        $quotes = RequestProduct::get();


        return view('backend.request_product', compact('quotes'));


    }

    public function delete(Request $request)
    {
//        dd($request->all());
        $quotes = RequestProduct::find($request->id);
        $quotes->delete();
        $request->session()->flash('success', 'Data Deleted Successfully');
        return back();

    }

}
