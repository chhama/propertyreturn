<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('property',function(Blueprint $table){
			$table->increments('id');
			$table->string('users_id');
			$table->string('service');
			$table->string('present_place_of_posting',100);
			$table->integer('basic_pay');
			$table->string('present_post');
			$table->string('pay_band_and_grade_pay',50);
			$table->string('present_enolument');
			$table->integer('returns_year')->length(4);
			$table->longtext('movable_property');
			$table->longtext('immovable_property');
			$table->string('status');
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
		Schema::drop('property');
	}

}
