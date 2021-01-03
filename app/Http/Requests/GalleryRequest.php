<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this Request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the Request.
   *
   * @return array
   */
  public function rules()
  {
    $rules = [
      /*'gallery_name' => 'required',
      'gallery_description' => 'required',*/
    ];

    if (!$this->has('id')) {
      $rules += ['featured_image' => 'required|image'];
    }

    return $rules;

  }
}
