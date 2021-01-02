<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
  protected $table = "order_product";
  protected $fillable = [
    'image_name',
    'total_color_price',
    'total_frame_price',
    'front',
    'back',
    'pocket',
    'color_no',
    'quantity_xs',
    'quantity_s',
    'quantity_m',
    'quantity_xl',
    'quantity_2xl',
    'quantity_3xl',
    'interest_logo'];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
