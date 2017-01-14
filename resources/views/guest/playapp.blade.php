	@extends('guest.master')
	<?php $title = $data['title'] ?>
	@section('title')
<title>{{ $title }} - BBoom App</title>
	@endsection
@section('content')
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
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=719228948238299";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
	
	Share = {
facebook: function(purl, ptitle, pimg, text) {
url = 'http://www.facebook.com/sharer.php?s=100';
url += '&p[title]=' + encodeURIComponent(ptitle);
url += '&p[summary]=' + encodeURIComponent(text);
url += '&p[url]=' + encodeURIComponent(purl);
url += '&p[images][0]=' + encodeURIComponent(pimg);
Share.popup(url);
},
twitter: function(purl, ptitle) {
url = 'http://twitter.com/share?';
url += 'text=' + encodeURIComponent(ptitle);
url += '&url=' + encodeURIComponent(purl);
url += '&counturl=' + encodeURIComponent(purl);
Share.popup(url);
},
popup: function(url) {
window.open(url,'','toolbar=0,status=0,width=626, height=436');
}
};
</script>

<div class="main"  >
	<div class="main-top" ng-controller="AppPlayController" >
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
	 				<div class="game" id="gameplay" style="width:660px;" >	
	 					<div class="game-result">
							{!! $data['html']!!}
							{!! $data['script'] !!}	
	 					</div>
	 					
	 						
	 					</canvas>
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
	 				<div class="likeus">
	 					Like us =>>

	 					<a href="app.html"><img src="{!! asset('public/mh94_guest')!!}/images/fb.png" alt=""></a>
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
<div class="fb-comments" data-href="http://bigboomapp.dev:8080/playapp/5" data-width="100%" data-numposts="5"></div>
			<div class="more-apps" ng-controller="AppController" >
					<div class="nc-tittle">
	 					Bạn có thể thích
	 				</div>
	 				<div class="new">
	 					<div class="row">
	 						<div class="listnew" ng-repeat="app in dataRandom">
	 						<a href="app.html">
	 							<div class="listnewpic">
	 								<img src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="">
	 							</div>
	 							<div class="listnewtitle">
	 								{% app.title %}
	 							</div>
	 						</a>
	 					</div>
	 					

	 			<script>
document.getElementById('shareBtn').onclick = function() {
	//var imgapp = document.getElementById("imgapp").getAttribute("src")
	//console.log(imgapp);
	//alert(imgapp);
	/*
  FB.ui({
 
    method: 'share',
    display: 'popup',
    href: window.location.href,
     picture: imgapp,
        title: '{{ $title }}',
        description: '{{ $title }}',
        caption: 'B-BoomApp'

  }, function(response){});
	*/
}




</script>


	 					<div class="clear"></div>
	 					</div>
	 				</div>
	 	
	 			
	 			<div class="view-more">
	 					<button type="submit">Xem thêm</button>
	 				</div>



			</div>

	

</div>

	


<!--
	 				<div id="comments"><fb:comments href="http://hqapps.net/ungdung/ban-ngay-ay-va-bay-gio-27-12" width="100%" numposts="5" colorscheme="light" fb-xfbml-state="rendered" class="fb_iframe_widget fb_iframe_widget_fluid"><span style="height: 629px;"><iframe id="fc7ef446e3d72" name="f35feb02bcd5f3" scrolling="no" title="Facebook Social Plugin" class="fb_ltr fb_iframe_widget_lift" src="https://www.facebook.com/plugins/comments.php?api_key=1565134950451411&amp;channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FiPrOY23SGAp.js%3Fversion%3D42%23cb%3Df1c21cb6127a38%26domain%3Dhqapps.net%26origin%3Dhttp%253A%252F%252Fhqapps.net%252Ff16b14df50be86%26relation%3Dparent.parent&amp;colorscheme=light&amp;href=http%3A%2F%2Fhqapps.net%2Fungdung%2Fban-ngay-ay-va-bay-gio-27-12&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;skin=light&amp;version=v2.6&amp;width=100%25" style="border: none; overflow: hidden; height: 629px; width: 100%;"></iframe></span></fb:comments>
	 				</div>
	 			-->


	 				
		



@endsection
@section('sidebar')
<div ng-controller="AppController">
	<div class="nc-tittle">
	 					Các app khác
	 			</div>
	 			<div class="nav-area">
				 			<ul class="pager">				 				
				 				<li class="previous" ><a href="" ng-click="listApp('down')">Mới hơn</a></li>
				 				<li class="next"><a href="" ng-click="listApp('up')">Cũ hơn</a></li>
				 			</ul>
				 		</div>
				 		<div class="clear"></div>
	 			<div class="hotapp" ng-repeat="app in data">
	 				<a href="{!! url('playapp') !!}/{% app.id %}/{% app.slug %}.html">
	 							<div class="listhotpic">
	 								<img src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="">
	 							</div>
	 							<div class="listhottitle">
	 								{% app.title %}
	 							</div>
	 						</a>
	 			</div>
	 			<div class="clear"></div>

</div>

@endsection