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
<form class="form-horizontal" role="form" method="POST" action="/auth/register">
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
    <div class='container-fluid interest-buttons center-block'>
        <h3>Please select some interests</h3>
            
            <div class="btn-group col-lg-12 form-group" data-toggle="buttons">          
            
                <div class="row">
                    <label class="btn btn-default">
                        <input data-value="1" name="Board Games" type="checkbox" autocomplete="off">
                        <span>Board Games</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                    <label class="btn btn-default">
                        <input data-value="1" name="Nightlife" type="checkbox" autocomplete="off">
                        <span>Nightlife</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="New in Town" type="checkbox" autocomplete="off">
                        <span>New in Town</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="Software Development" type="checkbox" autocomplete="off">
                        <span>Software Development</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="Linux" type="checkbox" autocomplete="off">
                        <span>Linux</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                </div>
                <div class="row">
                    <label class="btn btn-default">
                        <input data-value="1" name="Robotics" type="checkbox" autocomplete="off">
                        <span>Robotics</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                    <label class="btn btn-default">
                        <input data-value="1" name="Photography" type="checkbox" autocomplete="off">
                        <span>Photography</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="Internet Startups" type="checkbox" autocomplete="off">
                        <span>Internet Startups</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="Javascript" type="checkbox" autocomplete="off">
                        <span>Javascript</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="Film" type="checkbox" autocomplete="off">
                        <span>Film</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                </div>
                <div class="row">
                    <label class="btn btn-default">
                        <input data-value="1" name="Beer" type="checkbox" autocomplete="off">
                        <span>Beer</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                    <label class="btn btn-default">
                        <input data-value="1" name="HTML5" type="checkbox" autocomplete="off">
                        <span>HTML5</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="Sci-Fi" type="checkbox" autocomplete="off">
                        <span>Sci-Fi</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="Python" type="checkbox" autocomplete="off">
                        <span>Python</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="Java" type="checkbox" autocomplete="off">
                        <span>Java</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                </div>
                <div class="row">
                    <label class="btn btn-default">
                        <input data-value="1" name="Investing" type="checkbox" autocomplete="off">
                        <span>Investing</span><span class="glyphicon glyphicon-ok"></span>
                    </label>
                    <label class="btn btn-default">
                        <input data-value="1" name="Hacking" type="checkbox" autocomplete="off">
                        <span>Hacking</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="Mobile Development" type="checkbox" autocomplete="off">
                        <span>Mobile Development</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="Pets" type="checkbox" autocomplete="off">
                        <span>Pets</span><span class="glyphicon glyphicon-ok"></span>
                    </label>  
                    <label class="btn btn-default">
                        <input data-value="1" name="Tabletop Games" type="checkbox" autocomplete="off">
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