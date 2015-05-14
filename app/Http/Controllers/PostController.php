<?php
namespace App\Http\Controllers;

use App\Posts;
use App\Users;
use App\Categories;
use Session;
use Illuminate\Http\Request;

class PostController extends Controller{
	
	public function show(){
		return view('/post')->with('categories', Categories::all());
	}

	public function post(Request $request){

		$v = $this->validate($request,
			[
				'topic' => 'required',
				'category' => 'required|exists:categories,id',
				'content' => 'required'
			]
		);
		$post = Posts::create([
			'user_id' => Users::where('username', '=',  Session::get('username'))->pluck('id'),
			'topic' => $request->get('topic'),
			'category_id' => $request->get('category'),
			'content' => $request->get('content')
		]);
		Session::flash('msg', '新增文章成功');
		return redirect('/index');
	}
}