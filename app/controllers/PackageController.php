<?php

class PackageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    
	public function index()
	{
		//
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

        /* 
         * Load membership package tree for a particular gym
         */

        public function packageTree($gym_id) {
            $data = array();
            $gym_package = DB::table('gym_package_plan')
                    ->select('id', 'package_plan_type')
                    ->where('package_plan_status', '=', 1)
                    ->where('gym_id', '=', $gym_id);
            $packages = $gym_package->get();
            foreach($packages as $pkg) {
                $pkg = (array)$pkg;
                $plans = DB::table('gym_package')
                        ->select('id', 'package_name', 'package_amount')
                        ->where('package_status', '=', 1)
                        ->where('package_plan_id', '=', $pkg['id'])
                        ->get();
                $pkg['plans'] = $plans;
                $data[] = $pkg;
            }
            return $data;
        }
}
