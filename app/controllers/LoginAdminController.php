<?php

class LoginAdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /loginadmin
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return View::make('admin.login');
	}

	public function adminLogin()
	{
		$rules = array(
			'name' => 'required | exists:users,first_name',
			'password' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('jumo-admin')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}else{
			$userdata = array(
				'first_name' => Input::get('name'),
				'password' => Input::get('password')
			);

			if(Auth::attempt($userdata)){
				return Redirect::to('admin/dashboard');
			}else{
				return Redirect::to('jumo-admin');
			}
		}	
	}

	public function adminLogout(){
		Auth::logout();
		return Redirect::to('jumo-admin');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /loginadmin/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /loginadmin
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /loginadmin/{id}
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
	 * GET /loginadmin/{id}/edit
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
	 * PUT /loginadmin/{id}
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
	 * DELETE /loginadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}