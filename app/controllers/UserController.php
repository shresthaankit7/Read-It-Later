<?php

class UserController extends \BaseController
{

	public function create(){
		$rules = array('name'=>'alpha|min:5',
						'password'=>'alpha_num|min:5',
						'confirm_password'=>'alpha_num|min:5');

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if( $validator->passes())
		{
			$username = Input::get('name');	
			$password = Hash::make(Input::get('password'));

			DB::table('users')->insert(array(
								array('username'=>$username,'password'=>$password)
								));

			Mail::send('emailwelcome',array('username'=> $username),function($message){
				$message->to('kurtunited69@gmail.com')->subject("WELCOME,YOU have been registered");
			});

			return "SUCCESSFULLY INSERTED"; 
			//NOW SEND A MAIL FOR REGISTRATION
			
		}else{
			return "not OK,not able to register";
		}
	}
}