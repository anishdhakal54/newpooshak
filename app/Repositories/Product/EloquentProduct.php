<?php

namespace App\Repositories\Product;

use App\Product;
use App\ProductColor;
use App\ProductFaq;
use App\ProductSpecification;
use App\ProductDownload;
use App\ProductImage;
use App\SizeChart;

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
//        dd($attributes);
        // sizes
       if(isset($attributes['size'])) {
            $attributes['size'] = json_encode($attributes['size']);
        }

        $product = $this->model->create($attributes);
        //Notification
        notifyStock($product->id);

        // size
        SizeChart::create([
            'product_id' => $product->id,
            "v1" => isset($attributes['v1']) ? $attributes['v1'] : "",
            "v2" => isset($attributes['v2']) ? $attributes['v2'] : "",
            "v3" => isset($attributes['v3']) ? $attributes['v3'] : "",
            "v4" => isset($attributes['v4']) ? $attributes['v4'] : "",
            "v5" => isset($attributes['v5']) ? $attributes['v5'] : "",
            "v6" => isset($attributes['v6']) ? $attributes['v6'] : "",
            "v7" => isset($attributes['v7']) ? $attributes['v7'] : "",
            "w1" => isset($attributes['w1']) ? $attributes['w1'] : "",
            "w2" => isset($attributes['w2']) ? $attributes['w2'] : "",
            "w3" => isset($attributes['w3']) ? $attributes['w3'] : "",
            "w4" => isset($attributes['w4']) ? $attributes['w4'] : "",
            "w5" => isset($attributes['w5']) ? $attributes['w5'] : "",
            "w6" => isset($attributes['w6']) ? $attributes['w6'] : "",
            "w7" => isset($attributes['w7']) ? $attributes['w7'] : "",
            "x1" => isset($attributes['x1']) ? $attributes['x1'] : "",
            "x2" => isset($attributes['x2']) ? $attributes['x2'] : "",
            "x3" => isset($attributes['x3']) ? $attributes['x3'] : "",
            "x4" => isset($attributes['x4']) ? $attributes['x4'] : "",
            "x5" => isset($attributes['x5']) ? $attributes['x5'] : "",
            "x6" => isset($attributes['x6']) ? $attributes['x6'] : "",
            "x7" => isset($attributes['x7']) ? $attributes['x7'] : "",
            "y1" => isset($attributes['y1']) ? $attributes['y1'] : "",
            "y2" => isset($attributes['y2']) ? $attributes['y2'] : "",
            "y3" => isset($attributes['y3']) ? $attributes['y3'] : "",
            "y4" => isset($attributes['y4']) ? $attributes['y4'] : "",
            "y5" => isset($attributes['y5']) ? $attributes['y5'] : "",
            "y6" => isset($attributes['y6']) ? $attributes['y6'] : "",
            "y7" => isset($attributes['y7']) ? $attributes['y7'] : "",
            "z1" => isset($attributes['z1']) ? $attributes['z1'] : "",
            "z2" => isset($attributes['z2']) ? $attributes['z2'] : "",
            "z3" => isset($attributes['z3']) ? $attributes['z3'] : "",
            "z4" => isset($attributes['z4']) ? $attributes['z4'] : "",
            "z5" => isset($attributes['z5']) ? $attributes['z5'] : "",
            "z6" => isset($attributes['z6']) ? $attributes['z6'] : "",
            "z7" => isset($attributes['z7']) ? $attributes['z7'] : "",
        ]);
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
//        dd($attributes);
        $product = $this->model->findOrFail($id);

//        dd($product->quantity_xxxl);
        // sizes
        $attributes['size'] = isset($attributes['size']) ? json_encode($attributes['size']) : '';
        $attributes['is_trending'] = !isset($attributes['is_trending']) ? 0 : 1;
        $attributes['is_featured'] = !isset($attributes['is_featured']) ? 0 : 1;
        $attributes['disable_size'] = !isset($attributes['disable_size']) ? 0 : 1;
        $attributes['disable_price'] = !isset($attributes['disable_price']) ? 0 : 1;
        $attributes['show_available_size'] = !isset($attributes['show_available_size']) ? 0 : 1;

        $product->update($attributes);
        //Notification
        notifyStock($product->id);


        // Product price
        $product->prices()->update([
            'regular_price' => $attributes['regular_price'],
            'sale_price' => $attributes['sale_price']
        ]);
        $product->size_chart()->update([
            'product_id' => $product->id,
            "v1" => isset($attributes['v1']) ? $attributes['v1'] : "",
            "v2" => isset($attributes['v2']) ? $attributes['v2'] : "",
            "v3" => isset($attributes['v3']) ? $attributes['v3'] : "",
            "v4" => isset($attributes['v4']) ? $attributes['v4'] : "",
            "v5" => isset($attributes['v5']) ? $attributes['v5'] : "",
            "v6" => isset($attributes['v6']) ? $attributes['v6'] : "",
            "v7" => isset($attributes['v7']) ? $attributes['v7'] : "",
            "w1" => isset($attributes['w1']) ? $attributes['w1'] : "",
            "w2" => isset($attributes['w2']) ? $attributes['w2'] : "",
            "w3" => isset($attributes['w3']) ? $attributes['w3'] : "",
            "w4" => isset($attributes['w4']) ? $attributes['w4'] : "",
            "w5" => isset($attributes['w5']) ? $attributes['w5'] : "",
            "w6" => isset($attributes['w6']) ? $attributes['w6'] : "",
            "w7" => isset($attributes['w7']) ? $attributes['w7'] : "",
            "x1" => isset($attributes['x1']) ? $attributes['x1'] : "",
            "x2" => isset($attributes['x2']) ? $attributes['x2'] : "",
            "x3" => isset($attributes['x3']) ? $attributes['x3'] : "",
            "x4" => isset($attributes['x4']) ? $attributes['x4'] : "",
            "x5" => isset($attributes['x5']) ? $attributes['x5'] : "",
            "x6" => isset($attributes['x6']) ? $attributes['x6'] : "",
            "x7" => isset($attributes['x7']) ? $attributes['x7'] : "",
            "y1" => isset($attributes['y1']) ? $attributes['y1'] : "",
            "y2" => isset($attributes['y2']) ? $attributes['y2'] : "",
            "y3" => isset($attributes['y3']) ? $attributes['y3'] : "",
            "y4" => isset($attributes['y4']) ? $attributes['y4'] : "",
            "y5" => isset($attributes['y5']) ? $attributes['y5'] : "",
            "y6" => isset($attributes['y6']) ? $attributes['y6'] : "",
            "y7" => isset($attributes['y7']) ? $attributes['y7'] : "",
            "z1" => isset($attributes['z1']) ? $attributes['z1'] : "",
            "z2" => isset($attributes['z2']) ? $attributes['z2'] : "",
            "z3" => isset($attributes['z3']) ? $attributes['z3'] : "",
            "z4" => isset($attributes['z4']) ? $attributes['z4'] : "",
            "z5" => isset($attributes['z5']) ? $attributes['z5'] : "",
            "z6" => isset($attributes['z6']) ? $attributes['z6'] : "",
            "z7" => isset($attributes['z7']) ? $attributes['z7'] : "",
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