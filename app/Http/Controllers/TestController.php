<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Users;
use Hash;
use Session;
use DB;

class TestController extends Controller{

	public function getRegister(){
		
		return view('/register');
	}
	public function gostRegister(){
		
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

		return redirect('users/login');
	}
	public function getLogin(){

		return view('login');
	}
	public function postLogin(){
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
}