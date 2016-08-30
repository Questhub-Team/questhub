@extends('layouts.master')
@section('content')
	<div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-modal">Edit profile</button>

		<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit profile">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" placeholder="name">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" placeholder="username">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="password">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop