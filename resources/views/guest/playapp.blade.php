	@extends('guest.master1')
	<?php $title = $data['title'] ?>
	@section('title')
<title>{{ $title }} - BBoom App</title>

<style>
	
	
.ng-hide {
  height: 0;
  width: 0;
  background-color: transparent;
  top:-200px;
  left: 200px;
}
.main-top .game .loading-game{
	text-align: center;
}
.main-top .game .loading-game img{
	width:100px;

}
.begin-game{
	height:400px;
	background: url("{!! asset('public/mh94_guest/images/bg1.svg')!!}");
}
</style>
	@endsection
@section('content')


	<div class="main col-md-8 col-sm-10 col-xs-12">
			<div class="main-top">
	 				<div class="title">
	 					<h1>{!! $data['title']; !!}</h1>
	 				</div>
	 				<form action="" method="post">
						<input type="text" hidden value="{!! asset('public/')!!}" id="rooturl">

					</form>
										<script>
					function sleep(milliseconds) {
						var start = new Date().getTime();
						for (var i = 0; i < 1e7; i++) {
							if ((new Date().getTime() - start) > milliseconds){
								break;
							}
						}
					}
					var appurl = "{!! $data['appurl'] !!}"
					var API = "{!! asset('/')!!}";
					$(document).ready(function(){
						$(".game-result").hide();
						$(".begin-game").show();
						$(".loading-game").hide();
						$(".viewBtn").click(function() {
							filldata();
							$(".begin-game").hide();
							$(".loading-game").show();
							setTimeout(function(){
								$(".loading-game").hide();
								$(".game-result").show();
								$(".viewBtn").hide();
								$("#shareBtn").show();
							}, 1000);
							
							
							
							
						});
						$("#shareBtn").click(function(){
							var picname="";
							html2canvas($(".game-result")).then(function(canvas) {
            						//console.log(canvas);
            						//$("#canvas").html(canvas);
            						//$(".canvas").hide();
            						var dataURL = canvas.toDataURL("image/png");
									//console.log(dataURL);
									var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
									console.log(CSRF_TOKEN);
								/*	$.post("{!! url('saveimage')!!}",
									{
									'_token': CSRF_TOKEN,
									title : '{!! $data['slug']!!}' ,
									canvasimg : dataURL
									
									}, function(data) {
									console.log(data);
								});*/
							$.ajax({
								url:"{!! url('saveimage')!!}",
								type:"POST",
								header:{
									'contentType': 'application/upload',
								},
								data:{ '_token': CSRF_TOKEN,
								title: "{!! $data['slug']!!}",
								canvasimg : dataURL },
								
								
								success: function (data) {console.log(data);
									picname = '{!! asset('public/mh94_apps') !!}' +'/' + data;
									console.log(picname);
									sharefb(picname);

								 },
								error: function (data) {console.log(data); },

							})  


						});

							
						
							

						});
	function sharefb( picurl){
			console.log(picurl);
										FB.ui({
										
										method: 'share',
										display: 'popup',
										href: window.location.href,
										picture: picurl,
										title: '{!! $data['title'] !!}',
										description: '{!! $data['description'] !!}',
										caption: 'B-BoomApp'
										
										}, function(response){});
	}
});
	
	function playgame(){
		

	}

	</script>
	 				<div class="game">	
						<div class="game-result">
							{!! $data['html']!!}
							{!! $data['script'] !!}	
	 					</div>
	 					<div id="canvas-img"></div>
	 					<div class="loading-game">
	 						<h1>Loading......</h1>
	 						<img src="{!! asset('public/mh94_guest/images/app_load.gif')!!}" width="100px" alt="">
	 					</div>
	 					<div class="begin-game">
							<div class="view-result">
	 							@if(Session::has('user'))
	 								<button class="viewBtn" onclick="playgame();"  >Xem kết quả</button>
								@else
									<a class="btn clearfix" href="{!! url('facebook/redirect')!!}">Đăng nhập để xem kết quả</a>
	 							@endif
	 					
	 				</div>
						</div>
	 				</div>
	 					 				<div class="view-result">
	 				@if(Session::has('user'))
	 			
						<button class="viewBtn" onclick="playgame();"  >Xem kết quả</button>
						<button id="shareBtn" class="btn btn-success clearfix">Share kết quả lên tường</Button>

					@else
						<a class="btn clearfix" href="{!! url('facebook/redirect')!!}">Đăng nhập để xem kết quả</a>
	 				@endif
	 					
	 				</div>
	 			</div>
	 			<div class="nc-title">
	 				<p>Nhận xét</p>
	 			</div>
	 			<div class="fb-comments" data-href="{!! url('playapp') !!}/{!! $data['id']; !!}/{!! $data['slug']; !!}.html" data-width="100%" data-numposts="5"></div>


		</div>
		<div class="sidebar col-md-4 col-sm-2">
			<div class="nc-tittle" ng-controller="AppController">

	 					<span> Muốn chơi hông ?</span>
	 					<hr>
	 				<div class="apps">
	 			<ul class="sidebar-apps">
								<li ng-repeat="app in dataRandom" >
									<a href="{!! url('playapp') !!}/{% app.id %}/{% app.slug %}.html" >	
								<div class="img-panel col-sm-5 ">
									<img src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="">
								</div>								
										<div class="info-panel col-sm-7">
											<p>{% app.title %}</p>
											
										</div>
									<div class="clearfix"></div>
									</a>
									<hr>
								</li>
							
					</ul>	
	 		</div>
	 		</div>
	 		
		</div>
		<div class="clear-fix"></div>
@endsection