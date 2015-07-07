<?php

class UserApi extends Eloquent {

	/* Alowing Eloquent to insert data into our database */
	protected $fillable = array('user_id', 'user_api_key');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cms_user_apis';
        
        protected $primaryKey = 'user_id';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('user_api_key');

}
