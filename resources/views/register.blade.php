<html>
	<head>
		<meta charset="utf-8">
		<title>註冊</title>
	</head>
	<body>
		<center>
			<h1>部落格帳號註冊</h1>
			
			@if(Session::has('errors'))
				@foreach(Session::get('errors')->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			@endif
			@if(Session::has('msg'))
				{{Session::get('msg')}}
			@endif
			<a href="{{url('login')}}">登入</a>
			<form method="post" action="{{url('register')}}">
				帳號：<input type="text" name="username"><br>
				密碼：<input type="password" name="password"><br>
                確認：<input type="password" name="password_confirmation"><br>
                信箱：<input type="text" name="mail"><br>
                生日：<input type="text" name="birthday"><br>
				<hr>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="reset" value="Reset">
				<input type="submit" value="Submit">
			</form>
		</center>
	</body>
</html>