<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Users;
use App\Comments;

Route::get('/', 'WelcomeController@index');
Route::get('/register', 'RegisterController@show');
Route::post('/register', 'RegisterController@register');
Route::get('/login', 'LoginController@show');
Route::post('/login', 'LoginController@login');
//Route::controller('users', 'TestController');
// Route::get('/index',[
// 	'LoginedMiddleware' => 'check',
// 	'uses' => 'LoginedController@show'
// 	]);
// Route::get('/test', function(){
// 	foreach (Comments::where('post_id', '>', 0)->limit(3,2)->get() as $row) {
// 		echo $row->content;
// 		echo "<br>";
// 		# code...
// 	}
// } );

Route::group(['middleware' => 'check'], function(){
	Route::get('/index', 'LoginedController@show');
	Route::get('/logout', 'LoginedController@logout');
	Route::get('/post', 'PostController@show');
	Route::post('/post', 'PostController@post');
	Route::get('/comment', 'CommentController@sendid');
	Route::post('/comment/post', 'CommentController@post');
});
