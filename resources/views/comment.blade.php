<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<a href="{{url('/index')}}">上一頁</a>
		<h1>{{$post->topic}}</h1>
		作者：{{$post->users->username}}
		<h4>本文:</h4>
		<p>{{$post->content}}</p>
		<hr>
		<h3>回覆：</h3>
		<hr>
		@if(Session::has('errors'))
				@foreach(Session::get('errors')->all() as $error)
					<li>{{$error}}</li>
				@endforeach
		@endif
		@if(Session::has('msg'))
				{{Session::get('msg')}}
		@endif
		<hr>
			@foreach($comments as $comment)
				<p>帳號：{{$comment->users->username}}</p>
				<p>{{$comment->content}}</p>
				<hr>
			@endforeach
		<hr>
		<form method="post" action="{{url('/comment/post')}}">
			帳號：{{Session::get('username')}}<br>
			<input type="hidden" name="user_id" value="{{$user_id}}">
			<input type="hidden" name="post_id" value="{{$post->id}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<textarea rows="20" cols="50" name='content'></textarea>
			<br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>