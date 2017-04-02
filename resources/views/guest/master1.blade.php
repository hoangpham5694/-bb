<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ Session::token() }}"> 
	@yield('title')

		<link rel    ="stylesheet" href="{!! asset('public/mh94_guest/css/bootstrap.min.css')!!}">
		<link rel    ="stylesheet" href="{!! asset('public/mh94_guest/css/styleappnhe.css')!!}">
		<script src  ="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src  ="<?php echo asset('public/mh94_guest/js/lib/bootstrap.min.js') ; ?>"></script>

		<script type ="text/javascript" src=<?php echo asset('public/mh94_guest/js/lib/angular.min.js') ; ?> > </script>
		<script  src=<?php echo asset('public/mh94_guest/js/app.js') ; ?> > </script>
		<script  src=<?php echo asset('public/mh94_guest/js/controller/AppPlayController.js') ; ?>> </script>
		<script  src=<?php echo asset('public/mh94_guest/js/controller/AppController.js') ; ?>> </script>
		<script  src=<?php echo asset('public/mh94_guest/js/myscript.js') ; ?>> </script>

		<meta name   ="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="{{ asset('photos/icon.png') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body ng-app="my-app">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1892596964352709";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
$body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
});
$body.addClass("loading");
$(window).bind("load", function() { 
    // Your code here.
    console.log("pageload");
    $body.removeClass("loading");
});

</script>


	<div id="header">
		<div class="container">
			<div class="logo col-md-2 col-sm-3 col-xs-12">
			<a href="{!! asset('/') !!}">
					<img src="{!! asset('public/mh94_guest/images')!!}/logo.png" alt="">
				</a>
			<a class="visible-xs search-panel-btn" id="search-pn-btn"><i class="glyphicon glyphicon-search"></i></a>
		</div>

		
			<div class="col-md-4 col-sm-4 col-xs-12 pull-right search-panel">
                <div class="ui search" ng-controller="AppController" ng-init="focus=false;blur=true;active=false" >
                    <div class="ui icon input" >
                        <input class="prompt" type="text" ng-focus="focus=true;blur=false;" ng-blur="blur=true;focus=false;"  ng-model="keyvalue" ng-change="searchfunc()" placeholder="Search app...">
                        <i class="glyphicon glyphicon-search"></i>
                    </div>
                    <div class="search-result"  ng-class="{ myFocus: focus, myBlur: blur }"  >
                    	
                    	<ul>
                    		<li ng-repeat="app in dataSearch ">
                    			
                    				<img src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="">
                    				<h2><a href="{!! url('playapp') !!}/{% app.id %}/{% app.slug %}.html">{% app.title %}</a></h2>
                    		<div class="clearfix"></div>
                    			
                    		</li>
                    		<div class="clearfix"></div>
                    	</ul>
                    </div>
                    <div class="results"></div>
                </div>

            </div>
		<div class="clearfix"></div>
		</div>
		
	</div>
	<div id="content">
		<div class="container">
		@yield('content')
	
		</div>
	</div>
	<div id="footer">
		<div class="fa-footer container">
        <div class="footer-help pull-left">
            <a >Về B-Boom</a>
        </div>
        <div class="footer-help pull-right">
            © Copyright by B-Boom Team
        </div>
    </div>
	</div>
	<div id="btn-goto-top" class="ui icon orange button scrollToTop " style="display: block;">
    <i class="glyphicon glyphicon-menu-up"></i>
</div>
<div class="modal"><!-- Place at bottom of page --></div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96193349-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>