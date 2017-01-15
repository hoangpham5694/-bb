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
	<div id="fb-root"></div>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=719228948238299";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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

					var API = "http://bigboomapp.dev:8080/";
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
								
								
								success: function (data) {console.log(data); },
								error: function (data) {console.log(data); },

							})  


						});


							
							
							

						});
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
	 			<div class="ui segment comment-area transition animating scale in cmt_game"><div class="fb-comments fb_iframe_widget" data-href="http://www.appnhe.com/54/me-noi-gi-khi-ban-noi-tet-nay-con-khong-ve" data-width="720px" data-numposts="10" data-colorscheme="light" fb-xfbml-state="rendered"><span style="height: 252px; width: 720px;"><iframe id="f37c4da528127c" name="f6b5719b609dc" scrolling="no" title="Facebook Social Plugin" class="fb_ltr" src="https://www.facebook.com/plugins/comments.php?api_key=1729686083939946&amp;channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FD6ZfFsLEB4F.js%3Fversion%3D42%23cb%3Df318cecf515652%26domain%3Dwww.appnhe.com%26origin%3Dhttp%253A%252F%252Fwww.appnhe.com%252Ff294c8433b8e9e4%26relation%3Dparent.parent&amp;colorscheme=light&amp;href=http%3A%2F%2Fwww.appnhe.com%2F54%2Fme-noi-gi-khi-ban-noi-tet-nay-con-khong-ve&amp;locale=en_US&amp;numposts=10&amp;sdk=joey&amp;skin=light&amp;version=v2.6&amp;width=720" style="border: none; overflow: hidden; height: 252px; width: 720px;"></iframe></span></div>
	 		</div>
		</div>
		<div class="sidebar col-md-4 col-sm-2">
			<div class="nc-tittle" ng-controller="AppController">

	 					<span> Muốn chơi hông ?</span>
	 					<hr>
	 				<div class="apps">
	 			<ul class="sidebar-apps">
								<li ng-repeat="app in dataRandom" >
									<a href="{!! url('playapp') !!}/{% app.id %}/{% app.slug %}.html" >	
								<div class="img-panel">
									<img src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="">
								</div>								
										<div class="info-panel">
											<p>{% app.title %}</p>
											<hr>
										</div>
									<div class="clear-fix"></div>
									</a>
								</li>
							
					</ul>	
	 		</div>
	 		</div>
	 		
		</div>
		<div class="clear-fix"></div>
@endsection