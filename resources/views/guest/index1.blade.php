	@extends('guest.master')
	@section('title')
	<title>Big boom app</title>
	@endsection
@section('content')
<div ng-controller="AppController">
	<ul id = "applist">
					 <li class ="app" ng-repeat="app in data" >
				 		<div class="cover">
				 			<a href="playapp/{% app.id %}">
				 				<img src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="">
				 			</a>
				 		</div>
				 		<div class="info">
				 			<div class="title">
				 				<a href="playapp/{% app.id %}/{% app.slug %}.html"> {% app.title %} </a>
				 			</div>
				 		</div>
				 		<div class="clear"></div>
				 	</li>


				 		<li class ="app">
				 		<div class="nav-area">
				 			<ul class="pager">				 				
				 				<li class="previous" ><a href="" ng-click="listApp('down')">Mới hơn</a></li>
				 				<li class="next"><a href="" ng-click="listApp('up')">Cũ hơn</a></li>
				 			</ul>
				 		</div>
				 	</li>
				 </ul> 
</div>


@endsection

@section('sidebar')
				<div class="fb">
		
		<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBigBoom-APP-1298926840172666%2F&tabs=timeline&width=300px&height=238&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=719228948238299" width="300px" height="238" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

				</div>
				<div class="coppyrighter">
					<p>Điện thoại: 0905 577972 <br> Email: hoangpham5694@gmail.com</p>
					© 2017 Bigboom Team.
				</div>

@endsection