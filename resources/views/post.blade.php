<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<center>
			<h1>發布文章</h1>
			<a href="{{url('/index')}}">上一頁</a>
			@if(Session::has('errors'))
				@foreach(Session::get('errors')->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			@endif
			<form method="post" action="{{url('post')}}">
				帳號：{{Session::get('user')}}<br>
				標題：<input type="text" name="topic"><br>
				文章類別：
				<select name='category'>
					@foreach($categories as $category)
						<option value={{$category->id}}>{{$category->category_name}}</option>
					@endforeach
				</select>
				<hr>
				<h4>本文：</h4>
				<textarea rows="20" cols="50" name='content'></textarea>
	            <br>
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <input type="reset" value="Reset">
				<input type="submit" value="Submit">
			</form>
		</center>
	</body>
</html>