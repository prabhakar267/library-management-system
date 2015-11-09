<?php

class Logs extends Eloquent{

	protected $fillable = array('book_issue_id', 'student_id', 'issue_by', 'issued_at', 'return_time');

    public $timestamps = false;

	protected $table = 'book_issue_log';
	protected $primaryKey = 'id';

	protected $hidden = array();

}
