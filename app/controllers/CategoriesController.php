<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$category_list = Categories::select('id','category','created_at','updated_at')
			->orderBy('id');

		$this->filterQuery($category_list);

		$category_list = $category_list->get();

		for($i=0; $i<count($category_list); $i++){

	        $id = $category_list[$i]['id'];


	        // $category_list[$i]['total_categories'] = Issue::select()
	        // 	->where('id','=',$id)
	        // 	->count();

	        // $category_list[$i]['avaliable'] = Issue::select()
	        // 	->count();
		}

        return $category_list;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$categories = (array)json_decode(Input::all()['add_category_data']);

		DB::transaction( function() use($categories) {
			$db_flag = false;
			$user_id = Auth::id();
			$category_title = Categories::insertGetId(array(
				'category'			=> $categories['category']
			));
			$newId = $category_title;

			if($db_flag)
				throw new Exception('Invalid update data provided');

		});

		return "Category Added successfully to Database";
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function renderAddCategories() {
        $db_control = new HomeController();

        return View::make('panel.addcategory');
    }

    public function renderAllCategories() {
        $db_control = new HomeController();

		return View::make('panel.allcategories');
    }
}
