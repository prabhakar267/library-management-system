<?php

class BaseController extends Controller {

        protected  $filter_params = array();
        
        protected  $sort_params = array();

        /**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
        
        /* 
         * Apply pagination based on Get parameters to index queries
         */
        protected function paginateQuery(&$query) {
            $start = 0;
            $limit = 30;
            if(Input::has('offset')) {
                $start = intval(Input::get('offset'));
            }
            if(Input::has('limit')) {
                $limit = intval(Input::get('limit'));
            }
            $query->skip($start)->take($limit);
        }
        
        /* 
         * Apply filters based on Get parameters to index queries
         */
        protected function filterQuery(&$query) {
            foreach($this->filter_params as $filter) {
               if(Input::has($filter)) {
                   $val = Input::get($filter);
                   $query->where($filter, '=', $val);
               }
           }
        }
         
        protected function sortQuery(&$query) {
            if(Input::has('sorts')) {
                $sorts = explode(",", Input::get('sorts'));
                foreach($sorts as $sort) {
                    $param = explode(':', $sort);
                    if(in_array($param[0], $this->sort_params)) {
                        if(isset($param[1]) && strtolower($param[1])=='desc') {
                            $query->orderBy($param[0], 'desc');
                        } else {
                            $query->orderBy($param[0], 'asc');
                        }
                    }
                }
            }
        }

}
