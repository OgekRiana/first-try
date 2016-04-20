<?php

/**
 * @Author: ogekriana
 * @Date:   2016-04-02 15:50:47
 * @Last Modified by:   ogekriana
 * @Last Modified time: 2016-04-05 11:14:11
 */

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		$users = User::with(['roles','email'])->get();
		return View::make('admin.user.user')
			->with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return View::make('admin.user.user_modal');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required | email',
			'password' => 'required',
			'password_confirmation' => 'required | same:password',
		);
		$validator = Validator::make(Input::all(), $rules);
		
		$input = Input::all();
		if ($validator->fails()) {
			$input['autoOpenModal'] = true;
			//var_dump($input);die;
            return Redirect::back()
                ->withErrors($validator)
                ->withInput($input);
        }else{
        	$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->password = Hash::make(Input::get('password'));
			$user->status = 3;			
        	$user->save();

        	$userEmail = new UserEmail;
        	$userEmail->address = Input::get('email');
        	$userEmail->token = $userEmail->createToken();
        	$userEmail->confirmed = true;
        	$user->email()->save($userEmail);

        	$user->roles()->attach(3);
        	$users = User::with(['roles','email'])->get();
        	//Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin/user')
            ->with('users', $users);
        }
		//return "hello";
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
		return "hello";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function findUserById()
	{
		$id = Input::get('id');
		/*$user = User::find(1);
				return $user;*/
		if(Request::ajax()){
			$user = User::find($id);
		//var_dump($user);die;
		return Response::json($user);	
		}
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateUser()
	{
		$user = User::find(Input::get('user_id'));

		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->phone = Input::get('phone');
		$user->gender = Input::get('gender');

		$user->save();
		$users = User::with(['roles','email'])->get();
        return Redirect::to('admin/user')
	        ->with('users', $users);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();

		$users = User::with(['roles','email'])->get();
        return Redirect::to('admin/user')
	        ->with('users', $users);
	}


}
