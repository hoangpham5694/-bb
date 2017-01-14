<!DOCTYPE html>
<html >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ Session::token() }}"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@yield('title')
	<link rel="stylesheet" href="{!! asset('public/mh94_guest/css/style.css')!!}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src=<?php echo asset('public/mh94_guest/js/lib/html2canvas.js') ; ?>> </script>
</head>
<body ng-app="my-app" >
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=719228948238299";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div id ="header">
		<div class="container">
			<div class="logo">
				<a href="index.html">
					<img src="{!! asset('public/mh94_guest/images')!!}/logo.png" alt="">
				</a>
			</div>
		</div>
	</div>
		
	<div id ="body" >
		<div class="container">
			<div class="main-content">
			@yield('content')
			</div>
			<div class="sidebar">
			@yield('sidebar')
			</div>
			<div class="clear"></div>
		</div>
	</div>


<script type="text/javascript" src=<?php echo asset('public/mh94_guest/js/lib/angular.min.js') ; ?> > </script>
	<script type="text/javascript" src=<?php echo asset('public/mh94_guest/js/app.js') ; ?> > </script>
<script type="text/javascript" src=<?php echo asset('public/mh94_guest/js/controller/AppPlayController.js') ; ?>> </script>
	<script type="text/javascript" src=<?php echo asset('public/mh94_guest/js/controller/AppController.js') ; ?>> </script>
	<script type="text/javascript" src=<?php echo asset('public/mh94_guest/js/myscript.js') ; ?>> </script>
<script>

	
</script>
</body>
</html>