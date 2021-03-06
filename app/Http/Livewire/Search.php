<?php

namespace App\Http\Livewire;

use App\Category;
use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{

  use WithPagination;

  public $price;
  public $options = [];
  public $productCategories;
  public $cat = [];
  public $paginate_no = 16;

  //filter attribute

  public $min = 0;
  public $max = 10000;
  public $count = 10;
  public $orderby = 1;
  public $categoryid = [];

  public $filterbyprice = false;

  public $user_query;
  public $user_category;

  protected $updatesQueryString = ['min', 'max', 'count', 'orderby'];

  public function mount()
  {
    $this->min = request()->query('min', $this->min);
    $this->max = request()->query('max', $this->max);
    $this->count = request()->query('count', $this->count);
    $this->orderby = request()->query('orderby', $this->orderby);
    $this->user_category = request()->query('poscats',$this->user_category);
    $this->user_query = request()->query('q',$this->user_query);
    $this->productCategories = $this->getCategoriesJson();
  }

  public function paginationView()
  {
    return 'partials.custom-pagination-links-view';
  }

  public function updatingMin()
  {
    $this->filterbyprice = true;
  }

  public function updatingOrderby()
  {
    $this->filterbyprice = false;
  }

  public function getCategoriesJson()
  {
    $categories = $this->getCategories(); // $this->category vaneko repo ko instance

    foreach ($categories as $category) {
      $this->cat[] = $category;
      $this->getsubcategories($category, 1);
    }

    return $this->cat;
  }

  // new function
  public function getsubcategories($category, $minus_count)
  {
    if ($category->subCategory->isNotEmpty()) {
      foreach ($category->subCategory as $child) {
        for ($i = 0; $i < $minus_count; $i++) {
          $child->name = "-" . $child->name;
        }

        $this->cat[] = $child;
        $this->getsubcategories($child, $minus_count + 1);
      }

    }
  }

  public function getCategories()
  {

    $categories = Category::where('parent_id', 0)->get();

    $categories = $this->addRelation($categories);

    return $categories;

  }

  public function selectChild($id)
  {
    $categories = Category::where('parent_id', $id)->get(); //rooney

    $categories = $this->addRelation($categories);

    return $categories;

  }

  public function addRelation($categories)
  {

    $categories->map(function ($item, $key) {

      $sub = $this->selectChild($item->id);

      return $item = array_add($item, 'subCategory', $sub);

    });

    return $categories;
  }

  public function filter()
  {
    dd($this->categoryid);

    /* $this->products = Product::orderBy('id', 'ASC')->get();*/


    /*    $lat = Product::orderBy('id', 'DESC')->get();
        $products = $this->product->getAll();

        if (request()->has('count')) {
          $count = request()->input('count');
          $products = $this->product->getAll();

        } else {
          $count = 12;
        }*/

    /*if ($this->orderby) {
      if ($this->orderby == 1 || $this->orderby == 3) {
        $this->products = $this->getAllProducts();
      } elseif ($this->orderby == 2) {
        $this->products = Product::orderBy('created_at', 'ASC')->get();
      } elseif ($this->orderby == 5) {
        $this->products = Product::leftJoin('product_prices', 'products.id', '=', 'product_prices.product_id')
          ->orderBy('regular_price', 'DESC')
          ->get();
      } elseif ($this->orderby == 4) {
        $this->products = Product::leftJoin('product_prices', 'products.id', '=', 'product_prices.product_id')
          ->orderBy('regular_price', 'ASC')
          ->get();
      }
    }*/
  }

  public function getAllProducts()
  {
    return Product::orderBy('created_at', 'DESC')->get();
  }

  public function filterbyPrice()
  {
    $this->filterbyprice = true;
    $products = Product::leftJoin('product_prices', 'products.id', '=', 'product_prices.product_id')
      ->where('regular_price', '>', $this->min)
      ->where('regular_price', '<', $this->max)
      ->get();
    return $products;
  }



  public function render()
  {
    $queryParam = $this->user_query;
    $queryCategory = $this->user_category;


    if (isset($queryCategory)) {
      $products = Product::whereHas('categories', function ($query) use ($queryParam, $queryCategory) {
        $query->where('categories.id', $queryCategory);
        $query->where('products.slug', 'like', '%' . $queryParam . '%');
        $query->where('products.name', 'like', '%' . $queryParam . '%');

        $query->where('products.status', '=', 1);
      })->paginate($this->paginate_no);

    }else{
      $products = Product::where('name', 'LIKE', '%' . $queryParam . '%')->where('status', '=', 1)->paginate($this->paginate_no);
    }

    return view('livewire.search', ['products' => $products]);
  }
}
