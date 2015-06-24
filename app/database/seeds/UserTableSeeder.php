<?php 
class UserTableseeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
						'username' => 'Ankit Shrestha',
						'password' => Hash::make('test123')));

		User::create(array(
						'username' => 'Kurt Cobain',
						'password' => Hash::make('test123')));
					
	}
	
}