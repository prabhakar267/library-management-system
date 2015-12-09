<?php

class LogController extends \BaseController {

	public function index()
	{

		$logs = Logs::select()
			->orderBy('time_stamp', 'DESC');
		
		$logs = $logs->get();
        return $logs;
	}

	public function create()
	{
		//
	}

	public function store()
	{
		$data = Input::all()['data'];
		$bookID = $data['bookID'];
		$studentID = $data['studentID'];
		
		$student = Student::find($studentID);
		
		if($student == NULL){
			throw new Exception('Invalid Student ID');
		} else {
			$approved = $student->approved;
			
			if($approved == 0){
				throw new Exception('Student still not approved by Admin Librarian');
			} else {
				$books_issued = $student->books_issued;
				$category = $student->category;

				$max_allowed = StudentCategories::where('cat_id', '=', $category)->firstOrFail()->max_allowed;
				
				if($books_issued >= $max_allowed){
					throw new Exception('Student cannot issue any more books');
				} else {
					$book = Issue::find($bookID);
					if($book == NULL){
						throw new Exception('Invalid Book Issue ID');
					} else {
						$book_availability = $book->available_status;
						if($book_availability != 1){
							throw new Exception('Book not available for issue');
						} else {

							// book is to be issued
							DB::transaction( function() use($bookID, $studentID) {
								$log = new Logs;

								$log->book_issue_id = $bookID;
								$log->student_id	= $studentID;
								$log->issue_by		= Auth::id();
								$log->issued_at		= time();
								$log->return_time	= 0;

								$log->save();

								// changing the availability status
								$book = Issue::find($bookID);
								$book->available_status = 0;
								$book->save();

								// increasing number of books issed by student
								$student = Student::find($studentID);
								$student->books_issued = $student->books_issued + 1;
								$student->save();
							});

							return 'Successfully Issued';
						}
					}
				}
			}
		}
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

    public function renderLogs() {
    
        // $db_control = new HomeController();

        return View::make('panel.logs');
            // ->with('categories_list', $db_control->categories_list);
    }

}
