<html>
	<head>
		<meta charset="utf-8">
		<title>登入</title>
	</head>
	<body>
		<center>
			<h1>部落格登入</h1>
			<a href="{{url('register')}}">註冊</a>
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
			<form method="post" action="{{url('login')}}">
				帳號：<input type="text" name="username"><br>
				密碼：<input type="password" name="password"><br>
				<hr>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="reset" value="Reset">
				<input type="submit" value="Submit">
			</form>
		</center>
	</body>
</html>