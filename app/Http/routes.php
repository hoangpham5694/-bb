<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    //return view('welcome');
    return view('guest.master');
});
*/

Route::get('test', function(){
	return view('admin.app.filemanager');
});


Route::get('/',['as' => 'getIndex', 'uses' => 'HomeController@getIndex']);
Route::get('login',['as' => 'getLogin', 'uses' => 'LoginController@getLogin']);
Route::post('login',['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);
Route::get('logout',['as' => 'getLogout', 'uses' => 'LoginController@getLogout']);
Route::post('saveimage',['as' => 'postSaveImage', 'uses' => 'AppPlayerController@postSaveImage']);
Route::get('saveimage',['as' => 'getSaveImage', 'uses' => 'AppPlayerController@getSaveImage']);

Route::get('playapp/{id}/{slug}',['as' => 'getPlayApp', 'uses' => 'AppController@getPlayApp'])->where('id','[0-9]+');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'adminsites'], function(){
    	Route::get('/', function(){
    		return view('admin.dashboard.main');
    	});
		Route::group(['prefix' => 'user'], function(){
			Route::get('/', ['as' => 'getUserList', 'uses' => 'UserController@getUserList']);
			Route::get('list', ['as' => 'getUserList', 'uses' => 'UserController@getUserList']);
			Route::get('changepass',['as' => 'getChangePass', 'uses' =>'UserController@getChangePass']);
			Route::post('changepass',['as' => 'postChangePass', 'uses' =>'UserController@postChangePass']);
		});
		Route::group(['prefix' => 'category'], function(){
			Route::get('add',['as' => 'getAdd','uses'=>'CateController@getAdd']);
		});
		Route::group(['prefix' => 'app'], function(){
			Route::get('add',['as' => 'getAddApp', 'uses' => 'AppController@getAppAdd']);
			Route::post('add',['as' => 'postAddApp', 'uses' => 'AppController@postAppAdd']);
			Route::get('list',['as'=>'getAppList', 'uses' => 'AppController@getAppList']);
			Route::get('edit/{id}',['as'=>'getAppEdit', 'uses' => 'AppController@getAppEdit'])->where('id','[0-9]+');
			Route::post('edit/{id}',['as' => 'postAddEdit', 'uses' => 'AppController@postAppEdit'])->where('id','[0-9]+');
			Route::get('delete/{id}',['as'=>'getAppDel', 'uses' => 'AppController@getAppDel'])->where('id','[0-9]+');
			Route::post('testapp',['as'=>'postTestApp', 'uses' => 'AppController@postTestApp']);
			Route::get('testapp',['as'=>'getTestApp', 'uses' => 'AppController@getTestApp']);
		});
    });
   
});
Route::group(['prefix' => 'apps'], function(){
    	Route::get('tencuaban',['as' => 'getResponseTenCuaBan','uses' => 'AppPlayerController@getResponseTenCuaBan']);
});
Route::get('facebook/getuser',['as'=>'getUserInfo', 'uses' => 'Auth\SocialController@getUserInfo']);
Route::get('facebook/redirect', ['as'=>'redirectToProvider', 'uses' => 'Auth\SocialController@redirectToProvider']);
Route::get('facebook/callback', ['as'=>'handleProviderCallback', 'uses' => 'Auth\SocialController@handleProviderCallback']);
Route::get('listapp/{page}',['as'=>'getListApp', 'uses' => 'AppController@getAppListWithPage'])->where('page','[0-9]+');
Route::get('listapprandom',['as'=> 'getListAppRandom', 'uses' => 'AppController@getListAppRandom']);
Route::get('listhot/{page}',['as'=> 'getListHot', 'uses'=> 'AppController@getListHot'])->where('id','[0-9]+');
Route::get('listsearch/{keyword}', ['as' => 'getlistSearch', 'uses' => "AppController@getSearchApp"]);
Route::get('list5new',['as'=>'getList5New', 'uses'=> 'AppController@getList5New']);
Route::get('lastapp',['as'=>'getLastApp', 'uses'=> 'AppController@getLastApp']);