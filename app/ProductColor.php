<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
  protected $fillable = [
    'user_id',
    'product_id',
    'color',
    'color_code',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user() {
    return $this->belongsTo( User::class );
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function product() {
    return $this->belongsTo( Product::class );
  }
}
