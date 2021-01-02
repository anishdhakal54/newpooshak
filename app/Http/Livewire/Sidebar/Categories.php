<?php

namespace App\Http\Livewire\Sidebar;

use App\Category;
use Livewire\Component;

class Categories extends Component
{
  public $productCategories;
  public $options = [];

  public function mount()
  {
    $this->productCategories = $this->getCategories();
  }

  public function render()
  {
    return view('livewire.sidebar.categories');
  }

  public function updated(){
    dd($this->options);
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

  public function categoryChecked($category_id)
  {
    dd($category_id);
  }

  public function test()
  {
    dd($this->options);
  }


}
