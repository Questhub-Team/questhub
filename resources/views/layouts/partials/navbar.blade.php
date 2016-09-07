<nav class="navbar navbar-default" id="navbar">
	<div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><img src="/img/logo.png" id="logo" class="img-responsive"></a>
		</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="navbar-collapse">
		<form method="GET" class="navbar-form navbar-right" action="{{ action('EventsController@show') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<input name="search" value="{{ isset($search) ? $search : '' }}" type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>Search</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
			@if(Auth::check())
			<li><a href="{{ action('UsersController@show', Auth::id()) }}"><span class="glyphicon glyphicon-user"></span> Profile<span class="sr-only">(current)</span></a></li>
			<li><a href="{{ action('Auth\AuthController@getLogout') }}"><span class="glyphicon glyphicon-remove-circle"></span> Logout</a></li>
			<li><a href="{{ action('EventsController@showAll')}}"><span class="glyphicon glyphicon-menu-hamburger"></span> Events</a></li>
			@else
				<button type="button" class="btn btn-default btn-sm form-control navbar-form" data-toggle="modal" data-target="#login-modal">Login</button>
			@endif
		</ul>
	</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>