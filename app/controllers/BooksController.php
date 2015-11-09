<?php

class BooksController extends \BaseController {


	public function __construct(){

		$this->filter_params = array('category_id');

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$book_list = Books::select('book_id','title','author','description','category_id')
			->orderBy('book_id');
		
		$this->filterQuery($book_list);
		
		$book_list = $book_list->get();

		for($i=0; $i<count($book_list); $i++){
	        
	        $id = $book_list[$i]['book_id'];
	        $conditions = array(
	        	'book_id'			=> $id,
	        	'available_status'	=> 1
        	);

	        $book_list[$i]['total_books'] = Issue::select()->where('book_id','=',$id)->count();
	        $book_list[$i]['avaliable'] = Issue::select()
	        	->where($conditions)
	        	->count();
		}

        return $book_list;
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
		$books = (array)json_decode(Input::all()['add_book_data']);

		DB::transaction( function() use($books) {
			$db_flag = false;
			$user_id = Auth::id();
			$book_title = Books::insertGetId(array(
				'title'			=> $books['title'],
				'author'		=> $books['author'],
				'description' 	=> $books['description'],
				'category_id'	=> $books['category'],
				'added_by'		=> $user_id
			));
			$newId = $book_title;

			if(!$book_title){
				$db_flag = true;
			} else {
				$number_of_issues = $books['number'];
				
				for($i=0; $i<$number_of_issues; $i++){
					
					$issues = Issue::create(array(
						'book_id'	=> $newId,
						'added_by'	=> $user_id
					));

					if(!$issues){
						$db_flag = true;
					}
				}
			}

			if($db_flag)
				throw new Exception('Invalid update data provided');

		});
	
		return "Books Added successfully to Database";

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


    public function renderAddBooks() {
    
        $db_control = new HomeController();

        return View::make('panel.addbook')
            ->with('categories_list', $db_control->categories_list);
    }

    public function renderAllBooks() {
    
        $db_control = new HomeController();

        return View::make('panel.allbook')
            ->with('categories_list', $db_control->categories_list);
    }
}
