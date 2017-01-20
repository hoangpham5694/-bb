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
		<script type ="text/javascript" src=<?php echo asset('public/mh94_guest/js/lib/html2canvas.js') ; ?>> </script>
		<script type ="text/javascript" src=<?php echo asset('public/mh94_guest/js/lib/angular.min.js') ; ?> > </script>
		<script  src=<?php echo asset('public/mh94_guest/js/app.js') ; ?> > </script>
		<script  src=<?php echo asset('public/mh94_guest/js/controller/AppPlayController.js') ; ?>> </script>
		<script  src=<?php echo asset('public/mh94_guest/js/controller/AppController.js') ; ?>> </script>
		<script  src=<?php echo asset('public/mh94_guest/js/myscript.js') ; ?>> </script>

		<meta name   ="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body ng-app="my-app">
	<div id="header">
		<div class="container">
			<div class="logo col-md-2 col-sm-3 col-xs-12">
			<a href="index.html">
					<img src="{!! asset('public/mh94_guest/images')!!}/logo.png" alt="">
				</a>
			<a class="visible-xs search-panel-btn" id="search-pn-btn"><i class="glyphicon glyphicon-search"></i></a>
		</div>
		
		
			<div class="col-md-4 col-sm-4 col-xs-12 pull-right search-panel">
                <div class="ui search" ng-controller="AppController" >
                    <div class="ui icon input">
                        <input class="prompt" type="text" ng-focus="showForm=true; focusInput=true" ng-blur="showForm=false;" ng-model="keyvalue" ng-change="searchfunc()" placeholder="Search app...">
                        <i class="glyphicon glyphicon-search"></i>
                    </div>
                    <div class="search-result" ng-show="showForm">
                    	
                    	<ul>
                    		<li ng-repeat="app in dataSearch ">
                    			
                    				<img src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="">
                    				<h2><a href="">{% app.title %}</a></h2>
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
            <a href="//www.appnhe.com/about/">Về B-Boom</a>
        </div>
        <div class="footer-help pull-right">
            © Copyright by B-Boom Team
        </div>
    </div>
	</div>
	<div id="btn-goto-top" class="ui icon orange button scrollToTop " style="display: block;">
    <i class="glyphicon glyphicon-menu-up"></i>
</div>

</body>
</html>