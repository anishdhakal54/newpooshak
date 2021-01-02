<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CollegeRequest;
use App\Repositories\College\CollegeRepository;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollegeController extends Controller
{
	/**
	 * @var CollegeRepository
	 */
	private $college;

	public function __construct(CollegeRepository $college) {
		$this->college = $college;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $colleges = $this->college->getAll();

	    return view( 'backend.colleges.index', compact( 'colleges' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view( 'backend.colleges.create' );
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CollegeRequest|Request $request
	 *
	 * @return \Illuminate\Http\Response
	 * @throws Exception
	 */
    public function store(CollegeRequest $request)
    {
	    try {
		    $this->college->create( $request->all() ); //  repository call garne kaam

	    } catch ( Exception $e ) {

		    throw new Exception( 'Error in saving college: ' . $e->getMessage() );
	    }

	    return redirect()->back()->with( 'success', 'College successfully created!' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $college = $this->college->getById( $id );

	    return view( 'backend.colleges.edit', compact( 'college' ) );
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param CollegeRequest|Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 * @throws Exception
	 */
    public function update(Request $request, $id)
    {
	    try {

		    $this->college->update( $id, $request->all() );

	    } catch ( Exception $e ) {

		    throw new Exception( 'Error in updating college: ' . $e->getMessage() );
	    }

	    return redirect()->back()->with( 'success', 'College successfully updated!!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $this->college->delete( $id );

	    return redirect()->back()->with( 'success', 'College successfully deleted!!' );
    }

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getCollegesJson( Request $request ) {
		$colleges = $this->college->getAll();

		foreach ( $colleges as $college ) {
			$college->author         = $college->user->full_name;
			$image                = null !== $college->getImage() ? $college->getImage()->smallUrl : $college->getDefaultImage()->smallUrl;
			$college->featured_image = $image;
		}

		return datatables( $colleges )->toJson();
	}
}
