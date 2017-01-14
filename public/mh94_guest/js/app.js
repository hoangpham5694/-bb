var app= angular.module('my-app', [] ,function($interpolateProvider) {
    $interpolateProvider.startSymbol('{%');
    $interpolateProvider.endSymbol('%}');
},function($locationProvider) {
$locationProvider.html5Mode(true);
}
).constant('API', 'http://bigboomapp.dev:8080/')

;
//http://bboom.890m.com/    http://bigboomapp.dev:8080/