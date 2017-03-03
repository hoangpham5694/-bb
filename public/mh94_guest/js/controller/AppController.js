app.controller('AppController', function($scope ,$http,$location, API){
	var page = 1;
	var pagehot = 1;
	var end= true;
	var getApp = function(url){
		$http.get(url).then(function successCallback (response){
		console.log(response);
		console.log(page);
		$scope.data =   response.data;
		if(response.data.length < 12){
  			//page--;
  			end= true;
  			//$scope.message = "Hết dữ liệu vui lòng quay lại";
  		}else{
  			end= false;
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

	$scope.nextpage = function(state){

		//console.log("click");
		$scope.state = state;
		console.log(state);
		switch (state){
			case "new":
				if(!end){
					page++;
					getApp(API + "listapp/"+ page);	
				}
				
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
	$scope.previouspage = function(state){
		$scope.state = state;
		console.log(state);
		console.log(page);
		if(page >1){
			page--;
			switch (state){
			case "new":
			
				
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
app.filter("dateFilter", function () {
    return function (stringDate) {
                    var dateOut = new Date(stringDate);
                    dateOut.setDate(dateOut.getDate() + 1);
                    return dateOut;
                };
});
app.filter('cut', function () {
        return function (value, wordwise, max, tail) {
            if (!value) return '';

            max = parseInt(max, 10);
            if (!max) return value;
            if (value.length <= max) return value;

            value = value.substr(0, max);
            if (wordwise) {
                var lastspace = value.lastIndexOf(' ');
                if (lastspace != -1) {
                  //Also remove . and , so its gives a cleaner result.
                  if (value.charAt(lastspace-1) == '.' || value.charAt(lastspace-1) == ',') {
                    lastspace = lastspace - 1;
                  }
                  value = value.substr(0, lastspace);
                }
            }

            return value + (tail || ' …');
        };
    });