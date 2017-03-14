	@extends('guest.master1')
	<?php $title = $data['title'] ?>
	@section('title')
<title>{{ $title }} - BBoom App</title>
		<script type ="text/javascript" src=<?php echo asset('public/mh94_guest/js/lib/html2canvas.js') ; ?>> </script>

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
	height: 400px;	
}
.main-top .game .loading-game img{
	width:100px;

}
.begin-game{
	height:400px;
	padding-top: 150px;

	background: url("{!! asset('public/mh94_guest/images/bg1.svg')!!}");
}
.game-result{
	width:730px;
}
#canvas-img img{
	width:100%;
}
</style>
	@endsection
@section('content')


	<div class="main col-md-8 col-sm-10">
			<div class="main-top ">
	 				<div class="title">
	 					<h1>{!! $data['title']; !!}</h1>
	 				</div>
	 				<form action="" method="post">
						<input type="text" hidden value="{!! asset('public/')!!}" id="rooturl">

					</form>
					   <script type="text/javascript">
        function resize_canvas(){
            canvas = document.getElementById("canvas");
            if (canvas.width  < window.innerWidth)
            {
                canvas.width  = window.innerWidth;
            }

            if (canvas.height < window.innerHeight)
            {
                canvas.height = window.innerHeight;
            }
        }
    </script>
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
						$(".share-btn").hide();
						$("#canvas-img").hide();
						$(".viewBtn").click(function() {
							filldata();
							$(".begin-game").hide();
							$(".loading-game").show();
							 
							$(".viewBtn").hide();
							setTimeout(function(){
								$(".loading-game").hide();
								$(".game-result").show();
								$body.addClass("loading");
							
								html2canvas($(".game-result"), {
									
									
        						//	allowTaint: true,
        						//	userCORS:true,
        							logging:true,
        							proxy:"{!! asset('/') !!}/html2canvasproxy.php",
    "onrendered": function(canvas) {
       // alert(canvas);
       
        var url = canvas.toDataURL("image/png");
      //  window.open(url, "_blank");
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     	/*			$.ajax({
								url:"{!! url('saveimage')!!}",
								type:"POST",
								header:{
									'contentType': 'application/upload',
								},
								data:{ '_token': CSRF_TOKEN,
								title: "{!! $data['slug']!!}",
								canvasimg : url },
								
								
								success: function (data) {console.log(data);
								//	picname = '{!! asset('public/mh94_apps') !!}' +'/' + data;
								//	console.log(picname);
								//	sharefb(picname);

								 },
								error: function (data) {console.log(data); },

							})  
*/




    }

    							}).then(function(canvas){
    								$(".game-result").hide();
    							 var url = canvas.toDataURL("image/png");
								$("#img-result").attr({
									src: url
								});
								$("#canvas-img").show();
								$(".share-btn").show();
								$(".title").hide();
								$body.removeClass("loading");

							});

    							
							}, 3000);  

							
							
							
						});
						$(".share-btn,.share-img").click(function(){
							var picname="";
							$body.addClass("loading"); 
							var dataURL = $("#img-result").attr("src");
						//	var dataURL = url;
							//console.log(url);
							var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
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
									$body.removeClass("loading");
									sharefb(picname);

								 },
								error: function (data) {console.log(data); },

							})  


					


					/*		html2canvas($(".game-result"), {
									
								//	userCORS:true,
        							//allowTaint: true,
        							logging:true,
        							proxy:"{!! asset('/') !!}/html2canvasproxy.php",

    							}).then(function(canvas) {
            						//console.log(canvas);
            						//$("#canvas-img").html(canvas);
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
								});
						******/ //hàm này bỏ
						/*

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
									$body.removeClass("loading");
									sharefb(picname);

								 },
								error: function (data) {console.log(data); },

							})  


						});

	*/

							
						
							

						});
	function sharefb( picurl){
			console.log(picurl);
										FB.ui({
										
										method: 'share',
										display: 'iframe',
										href: window.location.href,
										mobile_iframe: true,
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
<button  class="btn share-btn clearfix">Share kết quả lên tường</Button>
	 				<div class="game">	

						<div class="game-result">
							{!! $data['html']!!}
							{!! $data['script'] !!}	
	 					</div>
	 					<div id="canvas-img" onresize="resize_canvas()" >
	 						<img id="img-result" src="" alt="">
	 					</div>
	 					<div class="loading-game">
	 						<h1>Loading......</h1>
	 						<img src="{!! asset('public/mh94_guest/images/app_load.gif')!!}" width="100px" alt="">
	 					</div>
	 					<div class="begin-game">
							<div class="view-result" crossOrigin="anonymous">
	 							@if(Session::has('user'))
	 								<button class="viewBtn" onclick="playgame();"  >Xem kết quả</button>
								@else
									<a class="btn clearfix" href="{!! url('facebook/redirect')!!}">
									<i class="fa fa-facebook-square"></i>	Đăng nhập để xem kết quả</a>
	 							@endif
	 					
	 				</div>
						</div>

	 				</div>
	 				<button  class="btn share-btn clearfix">Share kết quả lên tường</Button>
	 				<div class="ads">
	 					{!! $ads1['code'] !!}
	 				</div>
	 				<div class="view-result">
	 				@if(Session::has('user'))
	 			
						<button class="viewBtn" onclick="playgame();"  >Xem kết quả</button>
						

					@else
						<a class="btn clearfix" href="{!! url('facebook/redirect')!!}">
							<i class="fa fa-facebook-square"></i> Đăng nhập để xem kết quả</a>
	 				@endif
	 					
	 				</div>
	 					<div class="ads">
	 					{!! $ads3['code'] !!}
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
	 		<div class="ads">
	 		{!! $ads4['code'] !!}
	 		</div>
		</div>
		<div class="clear-fix"></div>
		<!--
$('body').html2canvas();
var queue = html2canvas.Parse();
var canvas = html2canvas.Renderer(queue,{elements:{length:1}});
var img = canvas.toDataURL();
window.open(img);
*/ -->

@endsection

