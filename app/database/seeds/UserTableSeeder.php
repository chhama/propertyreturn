<?php 
	class UserTableSeeder extends Seeder {
		public function run(){
			DB::table('users')->delete();

			User::create(array(
					'emp_id' => '1',
					'remember_token' => '',
					'password' => Hash::make('pass')
				));
		}
	}
 ?>