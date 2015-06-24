<?php

/* Version V2 for the controller of the api
/* Version controller for the update and the destroy functionality
*/

class UrlControllerV2 extends UrlController
{
	public function update($id)
	{

		$url = Url::where('user_id',Auth::user()->id)->find($id);

		if( Request::get('url'))
		{
			$url->url = Request::get('url');
		}

		if( Request::get('description'))
		{
			$url->description = Request::get('description');
		}
	
		
		//Validation
		$inputurl['url'] = $url->url;
		$inputdes['description'] = $url->description;

		$validator = Validator::make($inputdes,array(
										'description'=>'required'));

		
		if( $validator->passes() )
		{
			$url->save();

			return Response::json(array(
								'error'=> false,
								'message' => 'URL updated'
								));
		}else{
			return Response::json(array(
								'error'=> true,
								'message'=> 'ERROR IN UPDATE'));
		}
		

	} 

	public function destroy($id)
	{
		$url = Url::where('user_id',Auth::user()->id)->find($id);

		if( $url == NULL ){
				return Response::json(array(
									'error'=> 'true',
									'message' => 'No DATA TO DELETE'));
		}else{
		$url->delete();

		return Response::json(array(
							'error' => false,
							'message' => 'Url Deleted'));
		}
	}

}