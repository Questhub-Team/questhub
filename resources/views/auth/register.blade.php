@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
				
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<style>
.btn span.glyphicon {               
    opacity: 0;             
}
.btn.active span.glyphicon {                
    opacity: 1;             
}
.interest-buttons {
    padding: 2px;
}
.glyphicon {
    color: red;
}
</style>
<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ action('UsersController@store') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-4 control-label">Username</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">E-Mail Address</label>
        <div class="col-md-6">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Confirm Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="fileToUpload">Select profile image:</label>
        <div class="col-md-6">
            <input type="file" name="fileToUpload" class="form-control" id="fileToUpload">
        </div>
    </div>
    <div class='container-fluid interest-buttons center-block'>
        <h3>Please select some interests</h3>
            
            <div class="btn-group col-lg-12 form-group" data-toggle="buttons">          
            
                <div class="row">
                    <label class="btn btn-default">
                        <input value="1" name="value[]" type="checkbox" autocomplete="off">
                        <span>Board Games</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                    <label class="btn btn-default">
                        <input value="2" name="value[]" type="checkbox" autocomplete="off">
                        <span>Nightlife</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="3" name="value[]" type="checkbox" autocomplete="off">
                        <span>New in Town</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="4" name="value[]" type="checkbox" autocomplete="off">
                        <span>Software Development</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="5" name="value[]" type="checkbox" autocomplete="off">
                        <span>Linux</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                </div>
                <div class="row">
                    <label class="btn btn-default">
                        <input value="6" name="value[]" type="checkbox" autocomplete="off">
                        <span>Robotics</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                    <label class="btn btn-default">
                        <input value="7" name="value[]" type="checkbox" autocomplete="off">
                        <span>Photography</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="8" name="value[]" type="checkbox" autocomplete="off">
                        <span>Internet Startups</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="9" name="value[]" type="checkbox" autocomplete="off">
                        <span>Javascript</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="10" name="value[]" type="checkbox" autocomplete="off">
                        <span>Film</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                </div>
                <div class="row">
                    <label class="btn btn-default">
                        <input value="11" name="value[]" type="checkbox" autocomplete="off">
                        <span>Beer</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                    <label class="btn btn-default">
                        <input value="12" name="value[]" type="checkbox" autocomplete="off">
                        <span>HTML5</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="13" name="value[]" type="checkbox" autocomplete="off">
                        <span>Sci-Fi</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="14" name="value[]" type="checkbox" autocomplete="off">
                        <span>Python</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="15" name="value[]" type="checkbox" autocomplete="off">
                        <span>Java</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                </div>
                <div class="row">
                    <label class="btn btn-default">
                        <input value="16" name="value[]" type="checkbox" autocomplete="off">
                        <span>Investing</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                    <label class="btn btn-default">
                        <input value="17" name="value[]" type="checkbox" autocomplete="off">
                        <span>Hacking</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="18" name="value[]" type="checkbox" autocomplete="off">
                        <span>Mobile Development</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="19" name="value[]" type="checkbox" autocomplete="off">
                        <span>Pets</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input value="20" name="value[]" type="checkbox" autocomplete="off">
                        <span>Tabletop Games</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                </div>
            
            </div> <!--btn-group close -->

        </div> <!-- container close  -->

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
        	Register
        </button>
        </div>
    </div>
</form>
@stop