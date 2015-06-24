<?php

/*  This is the first version of the UrlController
/*  Version for the functionality of the display and show and store only.
/*  The update and destroy functionality will be provided in the next version UrlControllerV2 controller.
*/

class UrlController extends \BaseController {



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$urls = Url::where('user_id',Auth::user()->id)->get();

		return Response::json(array(
							'error'=> false,
							'urls'=> $urls->toArray())
						);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return "CREATE CALLED";//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$url = new Url;
		$url->url = Request::get('url');
		$url->description = Request::get('description');
		$url->user_id = Auth::user()->id;

		$inputURL['url'] = $url->url;
		$inputDES['description'] = $url->description;

		//Check for the validation
		//$rules = array('url'=>'active_url');  //url must be active and within your domai

		$validator = Validator::make($inputDES,array(
											'description'=>'alpha'));
		
		if( $validator->passes() )
		{
			
			$url->save();
			return Response::json(array(
								'error'=> false,
								'urls'=> $url->toarray())
					);
		}else{
			return Response::json(array(
								'error' => true,
								'message' => 'INVALID description TYPE'
								));

		}	
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$url = Url::where('user_id',Auth::user()->id)
					->where('id',$id)
					->take(1)
					->get();

		return Response::json(array(
							'error'=>false,
							'urls'=> $url->toArray()),
							200
							);
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
