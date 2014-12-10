<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Music player @yield('title')</title>
  {{ HTML::style('css/styles.css') }}
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  @yield('css')
</head>
<body>
	<nav role="navigation" class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="{{ URL::route('home') }}" class="navbar-brand"><i class="fa fa-music"></i> Music Player</a>
			</div>
			<div id="navbarCollapse" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="{{ URL::route('rooms.index') }}">Rooms</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@unless (Auth::check())
						<li><a href="{{ URL::route('login') }}">Login</a></li>
					@else
						<li><a href="{{ URL::route('profile') }}">Profile</a></li>
						<li><a href="{{ URL::route('logout') }}">Logout</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
    @yield('content') 
	
	{{ HTML::script('js/app.js') }}
    @yield('javascript')
</body>
</html>