<?php
/**
 * Created by PhpStorm.
 * User: Mahesh Bohara <maheshbohara0101@gmail.com>
 * Date: 10/7/2017
 * Time: 10:39 PM
 */

namespace App\Repositories\Gallery;

use App\Gallery;
use App\Helpers\Image\LocalImageFile;
use App\Media;

class EloquentGallery implements GalleryRepository {

	/**
	 * @var Gallery
	 */
	private $model;

	public function __construct( Gallery $model ) {
		$this->model = $model;
	}

	public function getAll() {
		return $this->model->all();
	}

	public function getById( $id ) {
		return $this->model->findOrFail( $id );
	}

	public function create( array $attributes ) {
		$attributes['user_id'] = auth()->id();

		$gallery = $this->model->create( $attributes );

		// Upload image
		if ( isset( $attributes['featured_image'] ) ) {
			$media = new Media();
			$media->upload( $gallery, $attributes['featured_image'], '/uploads/gallerys/' );
		}

		return $gallery;
	}

	public function update( $id, array $attributes ) {
		$gallery = $this->getById( $id );

		// Upload image
		if ( isset( $attributes['featured_image'] ) ) {
			// Delete old image from file system
			$path = optional($gallery->media()->first())->path;
			$this->deleteImage( $path );

			// Clean database links
			$gallery->media()->delete();

			// Upload new image
			$media = new Media();
			$media->upload( $gallery, $attributes['featured_image'], '/uploads/gallerys/' );
		}

		$gallery->update( $attributes );

		return $gallery;
	}

	public function delete( $id ) {
		$gallery = $this->getById( $id );

		// Delete image
		$path = optional($gallery->media()->first())->path;
		$this->deleteImage( $path );

		// Clean image database links
		$gallery->media()->delete();

		$gallery->delete();

		return true;
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