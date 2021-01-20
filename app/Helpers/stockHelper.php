<?php

use App\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\StockNotificationMail;

function notifyStock( $id)
{

    $foundProduct = Product::where('id', $id)->first();
//    dd($foundProduct);
//dd($foundProduct->notify);
    if (($foundProduct->stock_quantity_xs > $foundProduct->quantity_xs) || ($foundProduct->stock_quantity_x > $foundProduct->quantity_x) || ($foundProduct->stock_quantity_m > $foundProduct->quantity_m) || ($foundProduct->stock_quantity_l > $foundProduct->quantity_l) || ($foundProduct->stock_quantity_xl > $foundProduct->quantity_xl) || ($foundProduct->stock_quantity_xxl > $foundProduct->quantity_xxl) || ($foundProduct->stock_quantity_xxxl > $foundProduct->quantity_xxxl)) {
//        dd($product->notify);
        $foundProduct->notify = 1;
        $foundProduct->save();
        Mail::to(getConfiguration('site_primary_email'))->send(new StockNotificationMail($foundProduct));
    } else {
        $foundProduct->notify = 0;
        $foundProduct->save();
    }


}