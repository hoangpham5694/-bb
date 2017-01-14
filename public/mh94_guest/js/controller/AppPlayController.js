app.controller('AppPlayController', function($scope ,$http,$location, API){

		var myBtnShare = angular.element( document.querySelector( '#shareBtn' ) );
     	myBtnShare.css('display','none');     	
	var requestAppPlayer = function(state){
		var appurl = state;
		console.log(appurl);
		$http.get(API +appurl).then(function successCallback (response){
		console.log(response);
		$scope.data =  API+ response.data.imageurl;

		var myBtnView = angular.element( document.querySelector( '#viewBtn' ) );
     	myBtnView.css('display','none');     
     	myBtnShare.css('display','block');

		}  , function errorCallback(response) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
	}
	//console.log($routeParams.action);
	var paramValue = $location.search().action; 
	console.log(paramValue)
	if(paramValue == true){
		console.log("true");
		//requestAppPlayer(state);
	}
	$scope.viewapp = function(state) {
		//$scope.state = state;
		
		//alert(state);
		//location.reload();
		//console.log($scope.appurl);
		requestAppPlayer(state);
		
	};

	
});