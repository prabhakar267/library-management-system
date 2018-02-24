<?php

class StudentController extends \BaseController {

	public function __construct(){

		$this->filter_params = array('branch','year','category');

	}

	public function index()
	{
		$conditions = array(
			'approved'	=> 0,
			'rejected'	=> 0
		);

		$students = Student::select('student_id', 'first_name', 'last_name', 'category', 'roll_num', 'branch', 'year')
			->where($conditions)
			->orderBy('student_id');

		$this->filterQuery($students);
		$students = $students->get();

        return $students;
	}


	public function create()
	{
		$conditions = array(
			'approved'	=> 1,
			'rejected'	=> 0
		);

		$students = Student::select('student_id', 'first_name', 'last_name', 'category', 'roll_num', 'branch', 'year', 'email_id', 'books_issued')
			->where($conditions)
			->orderBy('student_id');

		$this->filterQuery($students);
		$students = $students->get();

        return $students;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$student = Student::find($id);
		if($student == NULL){
			throw new Exception('Invalid Student ID');
		}

		$student->year = (int)substr($student->year, 2, 4);

		$student_category = StudentCategories::find($student->category);
		$student->category = $student_category->category;

		$student_branch = Branch::find($student->branch);
		$student->branch = $student_branch->branch;


		if($student->rejected == 1){
			unset($student->approved);
			unset($student->books_issued);
			$student->rejected = (bool)$student->rejected;

			return $student;
		}

		if($student->approved == 0){
			unset($student->rejected);
			unset($student->books_issued);
			$student->approved = (bool)$student->approved;

			return $student;
		}

		unset($student->rejected);
		unset($student->approved);

		$student_issued_books = Logs::select('book_issue_id', 'issued_at')
			->where('student_id', '=', $id)
			->orderBy('created_at', 'desc')
			->take($student->books_issued)
			->get();

		foreach($student_issued_books as $issued_book){
			$issue = Issue::find($issued_book->book_issue_id);
			$book = Books::find($issue->book_id);
			$issued_book->name = $book->title;

			$issued_book->issued_at = date('d-M', $issued_book->issued_at);
		}

		$student->issued_books = $student_issued_books;

		return $student;
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
	public function update($id){
        $flag = (bool)Input::get('flag');

        $student = Student::findOrFail($id);

		if($flag){
			// if student is approved
	        $student->approved = 1;
		} else {
			// if student is rejected for some reason
			$student->rejected = 1;
		}

        $student->save();

        return "Student's approval/rejection status successfully changed.";
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


	public function renderStudents(){
		$db_control = new HomeController;
		return View::make('panel.students')
			->with('branch_list', $db_control->branch_list)
			->with('student_categories_list', $db_control->student_categories_list);
	}

	public function renderApprovalStudents(){
		$db_control = new HomeController;
		return View::make('panel.approval')
			->with('branch_list', $db_control->branch_list)
			->with('student_categories_list', $db_control->student_categories_list);
	}

	public function getRegistration(){
		$db_control = new HomeController;
		return View::make('public.registration')
			->with('branch_list', $db_control->branch_list)
			->with('student_categories_list', $db_control->student_categories_list);
	}

	public function postRegistration(){

		$validator = Validator::make(
			Input::all(),
			array(
				'first'			=> 'required|alpha',
				'last'			=> 'required|alpha',
				'rollnumber'	=> 'required|integer',
				'branch'		=> 'required|between:0,10',
				'year'			=> 'required|integer',
				'email'			=> 'required|email',
				'category'		=> 'required|between:0,5'
			)
		);

		if($validator->fails()) {
			return Redirect::route('student-registration')
				->withErrors($validator)
				->withInput();   // fills the field with the old inputs what were correct

		} else {
			$student = Student::create(array(
				'first_name'	=> Input::get('first'),
				'last_name'		=> Input::get('last'),
				'category'		=> Input::get('category'),
				'roll_num'		=> Input::get('rollnumber'),
				'branch'		=> Input::get('branch'),
				'year'			=> Input::get('year'),
				'email_id'		=> Input::get('email'),
			));

			if($student){
				return Redirect::route('student-registration')
					->with('global', 'Your request has been raised, you will be soon approved!');
			}
		}
	}

}
