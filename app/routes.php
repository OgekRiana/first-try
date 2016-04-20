<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function(){
	return View::make('hello');
});*/

Route::get('/', function(){
	//return Redirect::route('create');
	return View::make('layout/master');
});

/*Route::get('/product/juice', function(){

});
Route::get('/product/smoothie', function(){
	
});
Route::get('/product/infused', function(){
	
});
Route::get('/product/mylk', function(){
	
});
Route::get('/product/rujak', function(){
	
});*/

Route::get('/product/{type?}', function($type = 'juice'){
	$data['type'] = $type;
	return View::make('layout/master',$data);
});

Route::get('file/download', function(){
	$file = 'hello.php';
	return Response::download($file);
});

Route::get('/connect', ['as'=>'connect', function(){
	return View::make('connect');
}]);

Route::get('/create', ['as'=>'create', function(){
	return View::make('create');
}]);

Route::get('/contact', ['as'=>'contact', function(){
	return View::make('contact');
}]);


/* ADMIN ROUTES */
Route::get('/jumo-admin', 'LoginAdminController@getIndex');
Route::post('/jumo-admin', 'LoginAdminController@adminLogin');

//Route::group(array('before'=>'auth'), function(){
	Route::get('/admin/dashboard', 'AdminController@getIndex');	
//});

Route::get('admin-logout', 'LoginAdminController@adminLogout');

/* USER ROUTES */
Route::resource('/admin/user', 'UserController');
Route::group(array('prefix' => 'admin/user'), function(){	
	Route::post('/find', [
		'as' => 'findarecord',
		'uses' => 'UserController@findUserById'
	]);
	Route::post('/update', 'UserController@updateUser');
	Route::get('/delete/{id}',[ 
		'as' => 'userdestroy',
		'uses' => 'UserController@destroy'
		]);
});

/* ROLES */
Route::resource('/admin/role', 'RoleController');