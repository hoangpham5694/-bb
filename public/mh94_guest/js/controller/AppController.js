app.controller('AppController', function($scope ,$http,$location, API){
	var page = 1;
	var getApp = function(url){
		$http.get(url).then(function successCallback (response){
		console.log(response);
		$scope.data =  response.data;
		if(response.data.length < 10){
  			page--;
  			$scope.message = "Hết dữ liệu vui lòng quay lại";
  		}
		}  , function errorCallback(response) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
	}
	var getAppRandom = function(){
		$http.get(API+'listapprandom').then(function successCallback (response){
		console.log(response);
		$scope.dataRandom =  response.data;
		if(response.data.length < 10){
  			
  		}
		}  , function errorCallback(response) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
	}
	getAppRandom();
	//$scope.name="hoang";
	console.log(page);
	getApp(API + "listapp/"+ page)
	$scope.listApp = function(state){

		//console.log("click");
		$scope.state = state;
		console.log(state);
		switch (state){
			case "up":
				page++;
				break;
			case "down":
				if(page > 1){
					page--;
				}
				
				break;

		}	
		var url = API + "listapp/"+ page;
		console.log(url);
		getApp(url)
	


	};

		


	
});