<?php 
	class UserTableSeeder extends Seeder {
		public function run(){
			DB::table('users')->delete();

			User::create(array(
					'username' => 'admin',
					'remember_token' => '',
					'password' => Hash::make('pass')
				));
		}
	}
 ?>