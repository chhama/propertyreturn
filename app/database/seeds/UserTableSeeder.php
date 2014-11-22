<?php 
	class UserTableSeeder extends Seeder {
		public function run(){
			DB::table('users')->delete();

			User::create(array(
					'username' => 'admin',
					'remember_token' => '',
					'name' => 'Super Admin',
					'mobile' => 000000000,
					'password' => Hash::make('pass')
				));
		}
	}
 ?>