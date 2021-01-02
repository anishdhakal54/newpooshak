<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Getquote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetQuoteController extends Controller
{
    public function getQuotes()
    {


        $quotes = Getquote::get();
        $category = Category::all();
        foreach ($quotes as $quote) {
            /*foreach ($category as $cat)
//                    echo($cat->id);
//                    echo(json_decode($quote->category)[$i]);
                for ($i = 0; $i < count(json_decode($quote->category)); $i++) {

                    if ($cat->id = json_decode($quote->category)[$i]) {
                        $catname = Category::where('id', '=', json_decode($quote->category))->get();
                    }
                }*/

            //sabai quote ko category tanna lla ko hoina
            //quote table ma vako id bata category ko name tanna lako ho

        }
        return view('backend.quotes', compact('quotes', 'catname'));


    }

    public function delete(Request $request)
    {
//        dd($request->all());
        $quotes = Getquote::find($request->id);
        $quotes->delete();
        $request->session()->flash('success', 'Data Deleted Successfully');
        return back();

    }


}
