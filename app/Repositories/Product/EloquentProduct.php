<?php

namespace App\Repositories\Product;

use App\Product;
use App\ProductColor;
use App\ProductFaq;
use App\ProductSpecification;
use App\ProductDownload;
use App\ProductImage;

class EloquentProduct implements ProductRepository
{

  /**
   * @var Product
   */
  private $model;

  public function __construct(Product $model)
  {
    $this->model = $model;
  }

  public function getAll()
  {
    return $this->model->all();
  }


  public function getById($id)
  {
    return $this->model->find($id);
  }

  public function create(array $attributes)
  {
    // sizes
    $attributes['size'] = json_encode($attributes['size']);

    $product = $this->model->create($attributes);
    // Product price
    $product->prices()->create([
      'regular_price' => $attributes['regular_price'],
      'sale_price' => $attributes['sale_price']
    ]);

    // Product categories
    if (isset($attributes['category'])) {
      $product->categories()->attach($attributes['category']);
    }

    // Product Images
    if (isset($attributes['image']) && null !== $attributes['image']) {
      foreach ($attributes['image'] as $key => $data) {
        ProductImage::create($data + ['product_id' => $product->id]);
      }
    }

    // Product Specifications
    if (isset($attributes['specifications'])) {
      $titles = $attributes['specifications']['title'];
      $descriptions = $attributes['specifications']['description'];

      $specificationsKeys = array_keys($titles);

      foreach ($specificationsKeys as $specification) {
        // Create specification
        $this->createSpecification([
          'user_id' => auth()->id(),
          'product_id' => $product->id,
          'title' => $titles[$specification],
          'description' => $descriptions[$specification],
        ]);
      }
    }

    // Product Colors
    if (isset($attributes['colors'])) {
      $titles = $attributes['colors']['color'];
      $descriptions = $attributes['colors']['color_code'];

      $colorsKeys = array_keys($titles);

      foreach ($colorsKeys as $color) {
        // Create color
        $this->createColor([
          'user_id' => auth()->id(),
          'product_id' => $product->id,
          'color' => $titles[$color],
          'color_code' => $descriptions[$color],
        ]);
      }
    }

    // Product Faqs
    if (isset($attributes['faqs'])) {
      $questions = $attributes['faqs']['question'];
      $answers = $attributes['faqs']['answer'];

      $faqKeys = array_keys($questions);

      foreach ($faqKeys as $faq) {
        // Create faq
        $this->createFaq([
          'user_id' => auth()->id(),
          'product_id' => $product->id,
          'question' => $questions[$faq],
          'answer' => $answers[$faq],
        ]);
      }
    }

    // Product Downloads
    if (isset($attributes['downloads'])) {
      $titles = $attributes['downloads']['title'];
      $links = $attributes['downloads']['link'];

      $downloadKeys = array_keys($titles);

      foreach ($downloadKeys as $download) {
        // Create download
        $this->createDownload([
          'user_id' => auth()->id(),
          'product_id' => $product->id,
          'title' => $titles[$download],
          'link' => $links[$download],
        ]);
      }
    }

    return $product;
  }

  public function update($id, array $attributes)
  {

    $product = $this->model->findOrFail($id);
    // sizes
    $attributes['size'] = isset($attributes['size']) ? json_encode($attributes['size']):'';
    $attributes['is_trending'] = !isset($attributes['is_trending']) ? 0 : 1;
    $attributes['is_featured'] = !isset($attributes['is_featured']) ? 0 : 1;
    $attributes['disable_size'] = !isset($attributes['disable_size']) ? 0 : 1;
    $attributes['disable_price'] = !isset($attributes['disable_price']) ? 0 : 1;
    $attributes['show_available_size'] = !isset($attributes['show_available_size']) ? 0 : 1;

    $product->update($attributes);

    // Product price
    $product->prices()->update([
      'regular_price' => $attributes['regular_price'],
      'sale_price' => $attributes['sale_price']
    ]);

    // Product categories
    if (isset($attributes['category'])) {
      $product->categories()->sync($attributes['category']);
    }

    // Product Images
    if (isset($attributes['image']) && null !== $attributes['image']) {
      $exitingIds = $product->images()->get()->pluck('id')->toArray();
      foreach ($attributes['image'] as $key => $data) {
        if (is_int($key)) {
          if (($findKey = array_search($key, $exitingIds)) !== false) {
            $productImage = ProductImage::findOrFail($key);
            $productImage->update($data);
            unset($exitingIds[$findKey]);
          }
          continue;
        }
        ProductImage::create($data + ['product_id' => $product->id]);
      }
      if (count($exitingIds) > 0) {
        ProductImage::destroy($exitingIds);
      }

    }

    // Product Specifications
    if (isset($attributes['specifications'])) {
      $titles = $attributes['specifications']['title'];
      $descriptions = $attributes['specifications']['description'];

      $specificationKeys = array_keys($titles);

      foreach ($specificationKeys as $specification) {
        if ($this->specificationExists($specification)) {
          // Update specification
          $this->updateSpecification([
            'id' => $specification,
            'title' => $titles[$specification],
            'description' => $descriptions[$specification],
          ]);
        } else {
          // Create specification
          $this->createSpecification([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'title' => $titles[$specification],
            'description' => $descriptions[$specification],
          ]);
        }
      }
    }

    // Product Colors
    if (isset($attributes['colors'])) {
      $titles = $attributes['colors']['color'];
      $descriptions = $attributes['colors']['color_code'];

      $colorKeys = array_keys($titles);

      foreach ($colorKeys as $color) {
        if ($this->colorExists($color)) {
          // Update color
          $this->updateColor([
            'id' => $color,
            'color' => $titles[$color],
            'color_code' => $descriptions[$color],
          ]);
        } else {
          // Create color
          $this->createColor([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'color' => $titles[$color],
            'color_code' => $descriptions[$color],
          ]);
        }
      }
    }

    // Product Faqs
    if (isset($attributes['faqs'])) {
      $questions = $attributes['faqs']['question'];
      $answers = $attributes['faqs']['answer'];

      $faqKeys = array_keys($questions);

      foreach ($faqKeys as $faq) {
        if ($this->faqExists($faq)) {
          // Update faq
          $this->updateFaq([
            'id' => $faq,
            'question' => $questions[$faq],
            'answer' => $answers[$faq],
          ]);
        } else {
          // Create faq
          $this->createFaq([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'question' => $questions[$faq],
            'answer' => $answers[$faq],
          ]);
        }
      }
    }

    // Product Downloads
    if (isset($attributes['downloads'])) {
      $titles = $attributes['downloads']['title'];
      $links = $attributes['downloads']['link'];

      $downloadKeys = array_keys($titles);

      foreach ($downloadKeys as $download) {
        if ($this->downloadExists($download)) {
          // Update download
          $this->updateDownload([
            'id' => $download,
            'title' => $titles[$download],
            'link' => $links[$download],
          ]);
        } else {
          // Create download
          $this->createDownload([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'title' => $titles[$download],
            'link' => $links[$download],
          ]);
        }
      }
    }

    return $product;

  }

  /**
   * Check if Specification already exists
   *
   * @param $specification
   *
   * @return mixed
   */
  protected function specificationExists($specification)
  {
    return ProductSpecification::where('id', '=', $specification)->exists();
  }

  /**
   * Update Specification
   *
   * @param array $attributes
   */
  protected function createSpecification(array $attributes)
  {
    return ProductSpecification::create($attributes);
  }

  /**
   * Update Specification
   *
   * @param array $attributes
   *
   * @return bool
   */
  protected function updateSpecification(array $attributes)
  {
    $specification = ProductSpecification::findOrFail($attributes['id']);

    $specification->title = $attributes['title'];
    $specification->description = $attributes['description'];

    $specification->save();

    return $specification;
  }


  /**
   * Check if Color already exists
   *
   * @param $color
   *
   * @return mixed
   */
  protected function colorExists($color)
  {
    return ProductColor::where('id', '=', $color)->exists();
  }

  /**
   * Update Color
   *
   * @param array $attributes
   */
  protected function createColor(array $attributes)
  {
    return ProductColor::create($attributes);
  }

  /**
   * Update Color
   *
   * @param array $attributes
   *
   * @return bool
   */
  protected function updateColor(array $attributes)
  {
    $color = ProductColor::findOrFail($attributes['id']);

    $color->color = $attributes['color'];
    $color->color_code = $attributes['color_code'];

    $color->save();

    return $color;
  }

  /**
   * Check if Faq already exists
   *
   * @param $faq
   *
   * @return mixed
   */
  protected function faqExists($faq)
  {
    return ProductFaq::where('id', '=', $faq)->exists();
  }

  /**
   * Create Faq
   *
   * @param array $attributes
   */
  protected function createFaq(array $attributes)
  {
    return ProductFaq::create($attributes);
  }

  /**
   * Update Faq
   *
   * @param array $attributes
   *
   * @return bool
   */
  protected function updateFaq(array $attributes)
  {
    $faq = ProductFaq::findOrFail($attributes['id']);

    $faq->question = $attributes['question'];
    $faq->answer = $attributes['answer'];

    $faq->save();

    return $faq;
  }

  /**
   * Check if Download already exists
   *
   * @param $download
   *
   * @return mixed
   */
  protected function downloadExists($download)
  {
    return ProductDownload::where('id', '=', $download)->exists();
  }

  /**
   * Create Download
   *
   * @param array $attributes
   */
  protected function createDownload(array $attributes)
  {
    return ProductDownload::create($attributes);
  }

  /**
   * Update Download
   *
   * @param array $attributes
   *
   * @return bool
   */
  protected function updateDownload(array $attributes)
  {
    $download = ProductDownload::findOrFail($attributes['id']);

    $download->title = $attributes['title'];
    $download->link = $attributes['link'];

    $download->save();

    return $download;
  }

  public function delete($id)
  {
    $product = $this->getById($id);

    // Detach categories
    $product->categories()->detach();

    // Delete specifications
    $product->specifications()->delete();

    // Delete colors
    $product->colors()->delete();

    // Delete faqs
    $product->faqs()->delete();

    // Delete downloads
    $product->downloads()->delete();

    //view chart
    if ($product->view_chart != '' && $product->view_chart != null) {
      $path = public_path() . "/view_chart/" . $product->view_chart;
      unlink($path);
    }


    $product->delete();

    return true;
  }
}