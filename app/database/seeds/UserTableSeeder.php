<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'username' => 'Admin',
			'email'    => 'tylerhguitarist@gmail.com',
			'password' => Hash::make('1234')
		));
	}

}
