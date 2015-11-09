<?php

class Categories extends Eloquent{

	protected $fillable = array('category');

    public $timestamps = false;

	protected $table = 'book_categories';
	protected $primaryKey = 'id';

	protected $hidden = array();

}
