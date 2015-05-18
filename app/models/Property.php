<?php

class Property extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'property';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function user(){
		return $this->belongsTo('User','users_id');
	}

}
