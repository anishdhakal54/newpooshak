<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $fillable = [
        'id',
        'xs',
        's',
        'm',
        'xl',
        'xxl',
        'xxxl',
        'hasframe',
        'color_no',
        'front',
        'back',
        'pocket',
        'imagename',
        'price',
        'interest_logo',
        'product_id',
        'user_id',
        'color'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
   public function getProductNamebyId($id){
        $product= Product::findorfail($id);
        return isset($product->name) ? $product->name : Str::slug($product->name);

    }
}
