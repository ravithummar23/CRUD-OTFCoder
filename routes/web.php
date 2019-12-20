<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
	if (!Auth::check()) {
	    return Redirect::to('login');
	} else {
	    if(Auth::user()->hasRole('admin') ){
            return redirect('admin/dashboard');
        }
        else{
            return redirect('admin/users');
        }
	}
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

	Route::get('verify/{id}','Admin\AuthController@verifyPerson');
	Route::get('thankyou','Admin\AuthController@thankyou');

Route::group(['namespace' => 'Admin'], function() 
{

	Route::get('login','AuthController@loginView')->name('login');
	Route::post('login','AuthController@doLogin');
	Route::get('register','AuthController@registerView');
	Route::post('register','AuthController@register');
	Route::group(['prefix'=>'admin','middleware'=>'authApi'], function() 
	{
		Route::get('dashboard','AuthController@dashboard'); 
		Route::resource('users','UserController');   
		Route::get('logout','AuthController@doLogout');
	});
});

