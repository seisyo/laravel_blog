<?php
namespace App\Http\Controllers;
use App\Posts;
use App\Users;
use App\Comments;
use Illuminate\Http\Request;
use Session;

class CommentController extends Controller{
	public function sendid(Request $request){
		$v = $this->validate($request,
			[
				'post_id'=>'required|exists:posts,id',
				//'author_id'=>'required|exists:users,id'
			]);

		return view('/comment')->with(['post'=> Posts::find($request->get('post_id')), 'user_id'=> Users::where('username', '=', Session::get('username'))->pluck('id'), 'comments'=>Comments::where('post_id', '=', $request->get('post_id'))->get()]);
	}

	public function post(Request $request){
		$v = $this->validate($request,
			[
				'user_id' => 'required|exists:users,id',
				'post_id' => 'required|exists:posts,id',
				'content' => 'required'
			]);

		$comment = Comments::create([
			'user_id' => $request->get('user_id'),
			'post_id' => $request->get('post_id'),
			'content' => $request->get('content')
		]);
		Session::flash('msg', '回覆文章成功');
		return view('/comment')->with(['post'=> Posts::find($request->get('post_id')), 'user_id'=> Users::where('username', '=', Session::get('username'))->pluck('id'), 'comments'=>Comments::where('post_id', '=', $request->get('post_id'))->get()]);
	}
}