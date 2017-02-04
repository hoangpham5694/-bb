	@extends('guest.master1')
	@section('title')
	   <style>
            .carousel-inner > .item > img,
            .carousel-inner > .item > a > img {
            	max-height: 320px;
    
            }

        </style> 
    </head>
	<title>Big boom app</title>
	@endsection
@section('content')

		<div class="banner-panel" ng-controller="AppController">
				<div class="banner-img row">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
					  <div class="carousel-shadow col-sm-8">
					  	<ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class=" orange active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1" class="orange" ></li> 
					    <li data-target="#carousel-example-generic" data-slide-to="2" class="orange" ></li> 
					    <li data-target="#carousel-example-generic" data-slide-to="3" class="orange" ></li> 
					    <li data-target="#carousel-example-generic" data-slide-to="4" class="orange" ></li> 
					  </ol>
					  </div>
  

  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox" > 
					    <div class="item active" ng-repeat="app in dataLastApp" >
					    <a href="playapp/{% app.id %}/{% app.slug %}.html" target="_blank">
					    	<img  class="banner-img col-md-8 img-responsive" src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="...">
					    </a>	      
					      <a href="playapp/{% app.id %}/{% app.slug %}.html" target="_blank">
					      <div class="banner-text col-md-4 hidden-xs hidden-sm">
					      	<div class="title">
					      		{% app.title %}
					      	</div>
					      	<hr></hr>
					      	<div class="content">
					      		{% app.description %}
					      		
					      	</div>
					      	<hr>
					      	<div class="stat orange-text">
					      		<div class="pull-left">
					      		<i class="glyphicon glyphicon-eye-open"></i> {%app.view%}  

					      		</div>
					      		<div class="pull-right">
					      			<i class ="glyphicon glyphicon-calendar"></i> 
					      			{% app.created_at | dateFilter | date:"dd-MM-yyyy" %}
					      		</div>
					      	</div>
					      </div>
					      </a>
					    </div>
			     <div class="item"  ng-repeat="app in data5New">
					    <a href="playapp/{% app.id %}/{% app.slug %}.html" target="_blank">
					    	<img  class="banner-img col-md-8 img-responsive" src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="...">
					    </a>	      
					      <a href="playapp/{% app.id %}/{% app.slug %}.html" target="_blank">
					      <div class="banner-text col-md-4 hidden-xs hidden-sm">
					      	<div class="title">
					      		{% app.title %}
					      	</div>
					      	<hr></hr>
					      	<div class="content">
					      		{% app.description %}
					      	</div>
					      	<hr>
					      	<div class="stat orange-text">
					      		<div class="pull-left">
					      	<i class="glyphicon glyphicon-eye-open"></i> {%app.view%}   

					      		</div>
					      		<div class="pull-right">
					      			<i class ="glyphicon glyphicon-calendar"></i> 
					      			{% app.created_at | dateFilter | date:"dd-MM-yyyy" %}
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
					<div class ="col-lg-3 col-md-4 col-sm-6 col-xs-12" ng-repeat="app in data" >
						<a href="#" target="_blank"></a>
						<div class="ui special cardsui special cards">
							<a href="#" target="_blank"></a>
							<div class="card">
								<a href="playapp/{% app.id %}/{% app.slug %}.html" >								
									<div class="center">
									<img src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="">
								</div>
								</a>

								<div class="content setMaxHeight">
									<a href="#" target="_blank"></a>
									<div class="header">
										<a href="#" target="_blank"></a>
										<a href="playapp/{% app.id %}/{% app.slug %}.html">{% app.title | cut:true:30:' ...' %}</a>
									</div>
									
								</div>
								<div class="extra content small-text orange-text">
									<hr>
									<div class="pull-left">
					      			<i class="glyphicon glyphicon-eye-open"></i> {%app.view%}    

					      		</div>
					      		<div class="pull-right">
					      			<i class ="glyphicon glyphicon-calendar"></i> 
					      		
					      			{% app.created_at | dateFilter | date:"dd-MM-yyyy" %}
					      		</div>
								</div>
							</div>
						</div>
					</div>
			<div class="clear-fix"></div>
			</div>
			<button ng-click = "viewmore('new')">Xem thêm</button>
    </div>
    <div id="hot" class="tab-pane fade">
           		<div class="row game-grid mainContent" >
					<div class ="col-md-3 col-sm-4 col-xs-6" ng-repeat="app in datahot" >
						<a href="#" target="_blank"></a>
						<div class="ui special cardsui special cards">
							<a href="#" target="_blank"></a>
							<div class="card">
								<a href="playapp/{% app.id %}/{% app.slug %}.html">								
									<div class="center">
									<img src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="">
								</div>
								</a>

								<div class="content setMaxHeight">
									<a href="#" target="_blank"></a>
									<div class="header">
										<a href="#" target="_blank"></a>
										<a href="playapp/{% app.id %}/{% app.slug %}.html">{% app.title | cut:true:30:' ...' %}</a>
									</div>
									
								</div>
								<div class="extra content small-text orange-text">
									<hr>
									<div class="pull-left">
					      		<i class="glyphicon glyphicon-eye-open"></i> {%app.view%}  

					      		</div>
					      		<div class="pull-right">
					      			<i class ="glyphicon glyphicon-calendar"></i> 
					      			{% app.created_at | dateFilter | date:"dd-MM-yyyy" %}
					      		</div>
								</div>
							</div>
						</div>
					</div>
			<div class="clear-fix"></div>
			</div>
			<button ng-click = "viewmore('hot')">Xem thêm</button>
    </div>
    <div id="rand" class="tab-pane fade">
   
     		<div class="row game-grid mainContent" >
					<div class ="col-md-3 col-sm-4 col-xs-6" ng-repeat="app in dataRandom" >
						<a href="#" target="_blank"></a>
						<div class="ui special cardsui special cards">
							<a href="#" target="_blank"></a>
							<div class="card">
								<a href="playapp/{% app.id %}/{% app.slug %}.html">								
									<div class="center">
									<img src="{!! asset('public/mh94_upload/appimages')!!}/{% app.image %}" alt="">
								</div>
								</a>

								<div class="content setMaxHeight">
									<a href="#" target="_blank"></a>
									<div class="header">
										<a href="#" target="_blank"></a>
										<a href="playapp/{% app.id %}/{% app.slug %}.html">{% app.title | cut:true:30:' ...' %}</a>
									</div>
									
								</div>
								<div class="extra content small-text orange-text">
									<hr>
									<div class="pull-left">
					      		<i class="glyphicon glyphicon-eye-open"></i> {%app.view%}  

					      		</div>
					      		<div class="pull-right">
					      			<i class ="glyphicon glyphicon-calendar"></i> 
					      			{% app.created_at | dateFilter | date:"dd-MM-yyyy" %}
					      		</div>
								</div>
							</div>
						</div>
					</div>
			<div class="clear-fix"></div>
			</div>
<button ng-click = "viewmore('rand')">Xem thêm</button>
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

