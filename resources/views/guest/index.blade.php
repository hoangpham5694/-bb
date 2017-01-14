	@extends('guest.master1')
	@section('title')
	<title>Big boom app</title>
	@endsection
@section('content')

		<div class="banner-panel">
				<div class="banner-img row">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
					  <div class="carousel-shadow col-sm-8">
					  	<ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class=" orange active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1" class="orange"></li> 
					  </ol>
					  </div>
  

  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
					    <div class="item active">
					    <a href="#" target="_blank">
					    	<img  class="banner-img col-md-8 img-responsive" src="images/1.jpg" alt="...">
					    </a>	      
					      <a href="#" target="_blank">
					      <div class="banner-text col-md-4 hidden-xs hidden-sm">
					      	<div class="title">
					      		Mẹ nói gì khi bạn nói "Tết này con không về"?
					      	</div>
					      	<hr></hr>
					      	<div class="content">
					      		Để coi mẹ bạn bá đạo đến mức nào :))
					      	</div>
					      	<hr>
					      	<div class="stat orange-text">
					      		<div class="pull-left">
					      			<i class="glyphicon glyphicon-thumbs-up"></i> 31,300   
					      			<i class="glyphicon glyphicon-heart"></i> 31,300  
					      			<i class="glyphicon glyphicon-comment"></i> 31,300  

					      		</div>
					      		<div class="pull-right">
					      			<i class ="glyphicon glyphicon-calendar"></i> 22 hours ago
					      		</div>
					      	</div>
					      </div>
					      </a>
					    </div>
					    <div class="item">
					       <a href="#">
					    	<img  class="banner-img col-md-8 img-responsive" src="images/1.jpg" alt="...">
					    </a>	      
					      <a href="#" target="_blank">
					      <div class="banner-text col-md-4 hidden-xs hidden-sm">
					      	<div class="title">
					      		Mẹ nói gì khi bạn nói "Tết này con không về"?
					      	</div>
					      	<hr></hr>
					      	<div class="content">
					      		Để coi mẹ bạn bá đạo đến mức nào :))
					      	</div>
					      	<hr>
					      	<div class="stat orange-text">
					      		<div class="pull-left">
					      			<i class="glyphicon glyphicon-thumbs-up"></i> 31,300    
					      			<i class="glyphicon glyphicon-heart"></i> 31,300   
					      			<i class="glyphicon glyphicon-comment"></i> 31,300  

					      		</div>
					      		<div class="pull-right">
					      			<i class ="glyphicon glyphicon-calendar"></i> 22 hours ago
					      		</div>
					      	</div>
					      </div>
					      </a>
					    </div>		    
					  	</div>
						</div>
						</div>		
		</div>




					<div class="total-panel" ng-controller="AppController" >
				<div class = "ui three item menu orange-menu ">
					<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#new">App mới</a></li>
    <li><a data-toggle="tab" href="#hot">App Hot</a></li>
    <li><a data-toggle="tab" href="#rand">App Random</a></li>
   
  </ul>
				</div>
				<div class="clear-fix"></div>


				  

  <div class="tab-content">
    <div id="new" class="tab-pane fade in active">
     		<div class="row game-grid mainContent" >
					<div class ="col-md-3 col-sm-4 col-xs-6" ng-repeat="app in data" >
						<a href="#" target="_blank"></a>
						<div class="ui special cardsui special cards">
							<a href="#" target="_blank"></a>
							<div class="card">
								<a href="playapp/{% app.id %}/{% app.slug %}.html" target="_blank">								
									<div class="center">
									<img src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="">
								</div>
								</a>

								<div class="content setMaxHeight">
									<a href="#" target="_blank"></a>
									<div class="header">
										<a href="#" target="_blank"></a>
										<a href="playapp/{% app.id %}/{% app.slug %}.html" target="_blank">{% app.title %}</a>
									</div>
									
								</div>
								<div class="extra content small-text orange-text">
									<hr>
									<div class="pull-left">
					      			<i class="glyphicon glyphicon-thumbs-up"></i> 31,300    
					      			<i class="glyphicon glyphicon-heart"></i> 31,300   
					      			<i class="glyphicon glyphicon-comment"></i> 31,300  

					      		</div>
					      		<div class="pull-right">
					      			<i class ="glyphicon glyphicon-calendar"></i> 22 hours ago
					      		</div>
								</div>
							</div>
						</div>
					</div>
			<div class="clear-fix"></div>
				
				</div>
    </div>
    <div id="hot" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="rand" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    
  </div>
				    <script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
  
        $(this).tab('show');
    });
});
</script>
		
			</div>

@endsection

