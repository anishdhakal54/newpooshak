<?php

namespace App\Http\Controllers;

use App\RequestProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class RequestProductController extends Controller
{
  public function getProductRequest()
  {
    return view('requestProduct');
  }

  public function storeRequestProduct(Request $request)
  {
    $fileName1 = "";
    $fileName2 = "";
    if (isset($request->attachment1)) {
      $fileName1 = time() . '.' . $request->attachment1->extension();
      $request->attachment1->move(public_path('uploads/RequestProduct'), $fileName1);

    }
    if (isset($request->attachment2)) {
      $fileName2 = time() . '.' . $request->attachment1->extension();
      $request->attachment2->move(public_path('uploads/RequestProduct'), $fileName2);

    }
//        File::move($request->attachment1, public_path('Requested_product'));
//        File::move($request->attachment2, public_path('Requested_product'));

    RequestProduct::create([
      'first_name' => $request->firstname,
      'last_name' => $request->lastname,
      'address' => $request->address,
      'phone' => $request->phone,
      'email' => $request->email,
      'company_name' => $request->company_name,
      'attachment1' => $fileName1,
      'attachment2' => $fileName2,
      'user_id' => Auth::user()->id,

    ]);
    return back()
      ->with('success', 'Product requested succesfully');


  }
}
