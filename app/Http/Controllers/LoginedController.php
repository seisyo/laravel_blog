<?php
namespace App\Http\Controllers;
use Session;
use App\Categories;
use App\Posts;
use App\Users;
class LoginedController extends Controller{

	public function show(){
		//dd(Posts::find(1)->users->username);
		//dd(Posts::find(1)->categories->category_name);
		return view('/index')->with('posts', Posts::all());
	}
	public function logout(){
		Session::flush();
		return redirect('/login');
	}
}