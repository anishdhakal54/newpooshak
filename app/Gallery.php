<?php

namespace App;

use App\Concern\Mediable;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  use  Mediable;
    protected $fillable = [
      'gallery_name',
      'gallery_description',
      'user_id',
      'link',
      'priority',
      'active',
    ];

  /**
   * Return the post's author
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user() {
    return $this->belongsTo( User::class );
  }
}
