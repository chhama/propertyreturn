<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmoveablePropertyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('immovable',function(Blueprint $table){
			$table->increments('id');
			$table->string('emp_id');
			$table->string('service');
			$table->integer('basic_pay',6);
			$table->string('present_post');
			$table->string('pay_band_and_grade_pay',50);
			$table->string('present_place_of_posting',100);
			$table->longtext('property');
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
		Schema::drop('immovable');
	}

}
