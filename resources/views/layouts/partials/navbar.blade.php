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
		@if (Auth::check())
		<form method="GET" class="navbar-form navbar-right" action="{{ action('EventsController@show') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<input name="search" value="{{ isset($search) ? $search : '' }}" type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
		</form>
		@endif
		<ul class="nav navbar-nav navbar-left">
			@if(Auth::check())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, {{ Auth::user()->name }} <span class="caret standout" id="standout"></span></a>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ action('UsersController@show', Auth::id()) }}"><span class="glyphicon glyphicon-user"></span> Profile</a>
						</li>
						<li>
							<a href="{{ action('EventsController@showAll')}}"><span class="glyphicon glyphicon-menu-hamburger"></span> All Events</a>
						</li>
						<li>
							<a href="{{ action('EventsController@userEvents')}}"><span class="glyphicon glyphicon-menu-hamburger"></span> My Events</a>
						</li>
						<li role="separator" class="divider"></li>
						<li>
							<a href="{{ action('Auth\AuthController@getLogout') }}"><span class="glyphicon glyphicon-remove-circle"></span> Logout</a>
						</li>
					</ul>
				</li>
			@else
				<li>
					<a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Login</a>
				</li>
			@endif
		</ul>
	</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
