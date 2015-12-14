<?php

class Branch extends Eloquent{

	protected $fillable = array('id', 'branch');

    public $timestamps = false;

	protected $table = 'branches';
	protected $primaryKey = 'id';

	protected $hidden = array();

}
