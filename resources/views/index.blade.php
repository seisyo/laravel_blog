<html>
	<head>
		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
			function func(sugid){
				$('.post_id').val(sugid);
				$('form').submit();
			}
		</script>
	</head>
	<body>
		<center>
			@if(Session::has('msg'))
				{{Session::get('msg')}}
			@endif
			<hr>
			<a href="{{url('/post')}}">發布文章</a>
			<a href="{{url('/edit')}}">編輯文章</a>
			<a href="{{url('/logout')}}">登出</a>
			<h1>部落格列表</h1>
			<form method="get" action="{{url('/comment')}}">
				<ol>
					@foreach($posts as $post)	
						<li>
							{{$post->topic}}
							<input type="button" value="觀看本文" onclick="func({{$post->id}})">
							<p>作者：{{$post->users->username}}</p>
							<p>類別：{{$post->categories->category_name}}</p>
						</li>
						<hr>
					@endforeach
				</ol>
				<input type="hidden" name="post_id" value="" class="post_id">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		</center>
	</body>
</html>
<!--Users::where('id', $post->user_id)->pluck('username')}}-->