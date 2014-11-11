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
			$table->string('name');
			$table->string('mobile',11)->unique();
			$table->string('service');
			$table->date('entry_into_service');
			$table->date('superannuation_date');
			$table->integer('basic_pay');
			$table->string('present_post');
			$table->string('pay_band_and_grade_pay');
			$table->string('present_place_of_posting');
			$table->enum('user_type',['superadmin','admin','employee']);
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
