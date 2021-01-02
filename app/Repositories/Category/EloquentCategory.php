<?php

namespace App\Repositories\Category;

use App\Category;
use App\Helpers\Image\LocalImageFile;
use App\Media;

class EloquentCategory implements CategoryRepository {

	/**
	 * @var Category
	 */
	private $model;

	public function __construct( Category $model ) {
		$this->model = $model;
	}

	public function getAll() {
		return $this->model->all();
	}

	public function getById( $id ) {
		return $this->model->findOrFail( $id );
	}

	public function create( array $attributes ) {

	  $category = $this->model->create( $attributes );
    // Upload image
    if ( isset( $attributes['featured_image'] ) ) {
      $media = new Media(); // Create a object of Media
      $media->upload( $category, $attributes['featured_image'], '/uploads/slideshows/' );
    }
		return $category;
	}

	public function update( $id, array $attributes ) {
		$category = $this->getById( $id );
		$category->update( $attributes );

    // Upload image
    if ( isset( $attributes['featured_image'] ) ) {
      // Delete old image from file system
      $path = optional($category->media()->first())->path;
      $this->deleteImage( $path );

      // Clean database links
      $category->media()->delete();

      // Upload new image
      $media = new Media();
      $media->upload( $category, $attributes['featured_image'], '/uploads/slideshows/' );
    }


		return $category;

	}

	public function delete( $id ) {
		$category = $this->getById( $id );
		// Delete from pivot table as well
		$category->products()->detach( $id );

		$category->delete();

		return true;
	}

	public function getCategories() {

		$categories = Category::where( 'parent_id', 0 )->get();

		$categories = $this->addRelation( $categories );

		return $categories;

	}

	public function selectChild( $id ) {
		$categories = Category::where( 'parent_id', $id )->get(); //rooney

		$categories = $this->addRelation( $categories );

		return $categories;

	}

	public function addRelation( $categories ) {

		$categories->map( function ( $item, $key ) {

			$sub = $this->selectChild( $item->id );

			return $item = array_add( $item, 'subCategory', $sub );

		} );

		return $categories;
	}
  public function deleteImage( $path ) {
    if ( null === $path ) {
      return false;
    }

    $localImageFile = new LocalImageFile( $path );
    $localImageFile->destroy();

    return true;
  }
}