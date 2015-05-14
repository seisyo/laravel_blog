<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Session;
class LoginController extends Controller {
	public function show(){
		return view('login');
	}
	public function login(Request $request){
		$v = $this->validate($request,
			[
				'username'=>'required',
				'password'=>'required|min:8'
			]);

		$password = DB::table('users')->where('username', $request->get('username'))->pluck('password');
		if(Hash::check($request->get('password'), $password)){
			Session::put('check', true);
			Session::put('username', $request->get('username'));
			return redirect('/index');
		}
		else{
			Session::flash('msg', 'Error!');
			return redirect('/login');
		}
	}
	public function logined(){
		return view('success');
	}
	public function logout(){
		Session::flush();
		return redirect('/login');
	}
}