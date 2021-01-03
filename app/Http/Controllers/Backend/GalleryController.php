<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\GalleryRequest;
use App\Repositories\Gallery\GalleryRepository;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller {
	/**
	 * @var GalleryRepository
	 */
	private $gallery;

	public function __construct( GalleryRepository $gallery ) {
		$this->gallery = $gallery;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$gallerysCount = $this->gallery->getAll()->count();

		return view( 'backend.gallerys.index', compact( 'gallerysCount' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'backend.gallerys.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param GalleryRequest|Request $request
	 *
	 * @return \Illuminate\Http\Response
	 * @throws Exception
	 */
	public function store( GalleryRequest $request ) {

		try {

			$this->gallery->create( $request->all() );

		} catch ( Exception $e ) {

			throw new Exception( 'Error in saving gallery: ' . $e->getMessage() );
		}

		return redirect()->back()->with( 'success', 'Gallery successfully created!' );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$gallery = $this->gallery->getById( $id );

		return view( 'backend.gallerys.edit', compact( 'gallery' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 * @throws Exception
	 */
	public function update( Request $request, $id ) {
		//try {

			$this->gallery->update( $id, $request->all() );

//		} catch ( Exception $e ) {
//
//			throw new Exception( 'Error in updating gallery: ' . $e->getMessage() );
//		}

		return redirect()->back()->with( 'success', 'Gallery successfully updated!!' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		$this->gallery->delete( $id );

		return redirect()->back()->with( 'success', 'Gallery successfully deleted!!' );
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getGalleriesJson( Request $request ) {
		$gallerys = $this->gallery->getAll();

		foreach ( $gallerys as $gallery ) {
			$gallery->author         = $gallery->user->full_name;
			$image                = null !== $gallery->getImage() ? $gallery->getImage()->smallUrl : $gallery->getDefaultImage()->smallUrl;
			$gallery->featured_image = $image;
			if(!isset($gallery->gallery_name))
			  $gallery->gallery_name = "";
		}

		return datatables( $gallerys )->toJson();
	}
}
