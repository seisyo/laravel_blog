<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Users;
use Hash;
use Session;

class RegisterController extends Controller {

	public function show(){
		
		return view('/register');
	}

	public function register(Request $request){

		$v = $this->validate($request,
			[
				'username'=>'required|unique:users',
				'password'=>'required|min:8|confirmed',
				'password_confirmation'=>'required',
				'mail'=>'required|email|unique:users',
				'birthday'=>'required|date'
			]
		);
		
		Users::create([
			'username'=>$request->get('username'),
			'password'=>Hash::make($request->get('password')),
			'mail'=>$request->get('mail'),
			'birthday'=>$request->get('birthday')
			]);
		Session::flash('msg', 'Success!');

		return redirect('/login');
	}
} 