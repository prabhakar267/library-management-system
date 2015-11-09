<?php

class HomeController extends BaseController {

    public $categories_list = array();
    public $branch_list = array();
    public $student_categories_list = array();

    public function __construct() {
        $this->categories_list = Categories::select()->orderBy('category')->get();
        $this->branch_list = Branch::select()->orderBy('id')->get();
        $this->student_categories_list = StudentCategories::select()->orderBy('cat_id')->get();
    }

	public function home()
	{	
		return View::make('panel.index');
	}
}
