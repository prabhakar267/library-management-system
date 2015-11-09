<?php

class IssueLog extends Eloquent{

	protected $fillable = array('added_by', 'available_status', 'book_id');

    public $timestamps = false;

	protected $table = 'book_issue';
	protected $primaryKey = 'issue_id';

	protected $hidden = array();

}
