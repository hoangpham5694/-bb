app.controller('AppController', function($scope ,$http,$location, API){
	var page = 1;
	var pagehot = 1;
	var getApp = function(url){
		$http.get(url).then(function successCallback (response){
		console.log(response);
		
		$scope.data =   response.data;
		if(response.data.length < 12){
  			page--;
  			$scope.message = "Hết dữ liệu vui lòng quay lại";
  		}
		}  , function errorCallback(response) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
	}
	var getAppHot = function(url){
		$http.get(url).then(function successCallback (response){
		console.log(response);
		$scope.datahot =  response.data;
		if(response.data.length < 12){
  			pagehot--;
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
	var getList5New = function(){
		$http.get(API+'list5new').then(function successCallback (response){
		console.log(response);
		$scope.data5New =  response.data;
		
		}  , function errorCallback(response) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
	}
	var getLastApp = function(){
		$http.get(API+'lastapp').then(function successCallback (response){
		console.log(response);
		$scope.dataLastApp =  response.data;
		
		}  , function errorCallback(response) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
	}
	getLastApp();
	getList5New();
	getAppRandom();
	getAppHot(API + "listhot/"+ pagehot);
	$scope.name="hoang";
	console.log(page);
	getApp(API + "listapp/"+ page)

	$scope.viewmore = function(state){

		//console.log("click");
		$scope.state = state;
		console.log(state);
		switch (state){
			case "new":
				page++;
				getApp(API + "listapp/"+ page);	
				break;
			case "hot":
				pagehot++;
				getAppHot(API + "listhot/"+ pagehot);
				break;
			case "rand":
				getAppRandom();
				break;

		}	

		


	};
	$scope.searchfunc = function(){
		var key = $scope.keyvalue;
		var mySearchResult = angular.element( document.querySelector( '.search-result' ) );
		if(key.length >0){
			mySearchResult.css('display','block');
			$http.get(API+'listsearch/'+ key).then(function successCallback (response){
			console.log(response);
			
			if(response.data.length >0 ){
				$scope.dataSearch =  response.data;
			}
			else{
				$scope.dataSearch =  null;
				$scope.messageSearch = "Không có kết quả";
			}
			}  , function errorCallback(response) {
				// called asynchronously if an error occurs
				// or server returns response with an error status.
			}) ;
		}else{
			mySearchResult.css('display','none');
		}
		

	}

		


	
});