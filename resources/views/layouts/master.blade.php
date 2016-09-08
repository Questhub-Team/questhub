<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Questhub</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Balthazar" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/main.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container-fluid scroll">
		@include('layouts.partials.navbar')

		@yield('content')
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		(function(){
		$( document ).ready(function() {
			$('.remove').hover(
	        	function(){ $(this).addClass('glyphicon glyphicon-remove') },
	        	function(){ $(this).removeClass('glyphicon glyphicon-remove') 
	        	});
			});	
		})();
	</script>
	@yield('scripts')
	<script>
	var latitude = null;
	var longitude = null;
	navigator.geolocation.getCurrentPosition(function(position) {
		latitude = position.coords.latitude;
		longitude = position.coords.longitude;
  		console.log(position.coords.latitude, position.coords.longitude);
  		$('.check-in').attr('disabled', false);
	});
	$('.check-in').click(function() {
		console.log(latitude, longitude);
		var event_id = $(this).data('event-id');
		var check_in_url = $('#check-in-url').val();
		$.ajax({
	        type: 'GET',
	        url: check_in_url,
	        data: {
	        	latitude: latitude,
	        	longitude: longitude,
	        	event_id: event_id,
	        	
	        }
	    }).done(function(data) {
	    	if(data <= 2){
	    		alert("Check-in completed!");
	    	} else {
	    		alert("Check-in is too far away!");
	    	}
	    	console.log(data);
	    	// do something with the distance
	    })
	});
</script>
</body>
</html>