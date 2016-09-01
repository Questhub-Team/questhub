<nav class="navbar navbar-default">
	<div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Questhub</a>
			
		</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="navbar-collapse">
		<form method="GET" class="navbar-form navbar-right">
			{{ csrf_field() }}
			<div class="form-group">
				<input name="keyword" type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Search</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="{{ action('UsersController@show', Auth::id()) }}">Profile<span class="sr-only">(current)</span></a></li>
			<li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
			<li><a href="{{ action('AppController@showAll')}}">Events</a></li>
		</ul>
	</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>