<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function(Blueprint $table){
			$table->increments('id');
			$table->string('emp_id')->unique();
			$table->string('username');
			$table->string('name');
			$table->string('mobile',11)->unique();
			$table->date('entry_into_service');
			$table->string('email');
			$table->integer('department_id');
			$table->date('superannuation_date');
			$table->enum('user_type',['superadmin','admin','employee']);
			$table->string('remember_token');
			$table->string('password');
			$table->timestamps();
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
