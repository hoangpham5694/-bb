<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ Session::token() }}"> 
	<title></title>

	<link rel="stylesheet" href="{!! asset('public/mh94_guest/css/bootstrap.min.css')!!}">
	<link rel="stylesheet" href="{!! asset('public/mh94_guest/css/styleappnhe.css')!!}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="<?php echo asset('public/mh94_guest/js/lib/bootstrap.min.js') ; ?>"></script>
  	<script type="text/javascript" src=<?php echo asset('public/mh94_guest/js/lib/html2canvas.js') ; ?>> </script>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
	<div id="header">
		<div class="container">
			<div class="logo col-md-2 col-sm-3 col-xs-12">
			<a href="index.html">
					<img src="{!! asset('public/mh94_guest/images')!!}/logo.png" alt="">
				</a>
			<a class="visible-xs search-panel-btn" id="search-pn-btn"><i class="glyphicon glyphicon-search"></i></a>
		</div>
		
		
			<div class="col-md-4 col-sm-4 col-xs-12 pull-right search-panel">
                <div class="ui search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Search app...">
                        <i class="glyphicon glyphicon-search"></i>
                    </div>
                    <div class="results"></div>
                </div>

            </div>
		<div class="clear-fix"></div>
		</div>
		
	</div>
	<div id="content">
		<div class="container">
	
	
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