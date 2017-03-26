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

	



					<div class="total-panel" ng-controller="AppController" >
	
				<div class="ads">
					
					{!! $ads2['code'] !!}
				</div>


				  

  <div class="tab-content">
  	<div class="group-btn">
				<button class="btn-previous" ng-click = "previouspage('new')"><span class="glyphicon glyphicon-chevron-left"></span>Trang trước</button>
			<button class="btn-next"  ng-click = "nextpage('new')">Trang sau <span class="glyphicon glyphicon-chevron-right"></span></button>
			<div class="clear-fix"></div>
			</div>
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
										<a href="playapp/{% app.id %}/{% app.slug %}.html">{% app.title | cut:true:50:' ...' %}</a>
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
			<div class="group-btn">
				<button class="btn-previous" ng-click = "previouspage('new')"><span class="glyphicon glyphicon-chevron-left"></span>Trang trước</button>
			<button class="btn-next"  ng-click = "nextpage('new')">Trang sau <span class="glyphicon glyphicon-chevron-right"></span></button>
			<div class="clear-fix"></div>
			</div>
			
    </div>

    
  </div>

			</div>


@endsection

