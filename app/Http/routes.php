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
	return view('guest.proxy');
});

//Route::get('test',['as' => 'getTest', 'uses' => 'AdminController@getStatistics']);


Route::get('/',['as' => 'getIndex', 'uses' => 'HomeController@getIndex']);
Route::get('login',['as' => 'getLogin', 'uses' => 'LoginController@getLogin']);
Route::post('login',['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);
Route::get('logout',['as' => 'getLogout', 'uses' => 'LoginController@getLogout']);
Route::post('saveimage',['as' => 'postSaveImage', 'uses' => 'AppPlayerController@postSaveImage']);
Route::get('saveimage',['as' => 'getSaveImage', 'uses' => 'AppPlayerController@getSaveImage']);
Route::get('role-error', function(){
    		return view('admin.error.role');
    	});
Route::get('playapp/{id}/{slug}',['as' => 'getPlayApp', 'uses' => 'AppController@getPlayApp'])->where('id','[0-9]+');
Route::group(['middleware' => 'isroleadmin'], function () {
    Route::group(['prefix' => 'adminsites'], function(){
    	/*Route::get('/', function(){
    		return view('admin.dashboard.main');
    	});
    	*/
		Route::get('/',['as' => 'getStatistics', 'uses' => 'AdminController@getStatistics']);
		Route::group(['prefix' => 'user'], function(){
			Route::get('/', ['as' => 'getUserList', 'uses' => 'UserController@getUserList']);
			Route::get('list/{method?}', ['as' => 'getUserList', 'uses' => 'UserController@getUserList']);
			Route::get('changepass',['as' => 'getChangePass', 'uses' =>'UserController@getChangePass']);
			Route::post('changepass',['as' => 'postChangePass', 'uses' =>'UserController@postChangePass']);
			Route::get('edit/{id}',['as'=> 'getUserEdit', 'uses'=> 'UserController@getUserEdit'])->where('id','[0-9]+');
			Route::post('edit/{id}',['as'=> 'postUserEdit', 'uses'=> 'UserController@postUserEdit'])->where('id','[0-9]+');
			Route::get('add',['as'=> 'getUserAdd', 'uses' => 'UserController@getUserAdd']);
			Route::post('add',['as'=> 'postUserAdd', 'uses' => 'UserController@postUserAdd']);
		});
		Route::group(['prefix' => 'history'], function(){
			Route::get('list/{key?}/{page?}',['as' => 'getHistoryList','uses'=>'LoginHistoryController@getListLoginHistory'])->where('page','[0-9]+');
			Route::get('detail/{id}',['as' => 'getHistoryDetail','uses'=>'LoginHistoryController@getDetailLoginHistory']);

		});
		Route::group(['prefix' => 'app'], function(){

			Route::get('list/{method?}/{page?}',['as'=>'getAppListAdmin', 'uses' => 'AppController@getAppListAdmin'])->where('page','[0-9]+');
			Route::get('edit/{id}',['as'=>'getAppEditAdmin', 'uses' => 'AppController@getAppEditAdmin'])->where('id','[0-9]+');
			Route::post('edit/{id}',['as' => 'postAddEditAdmin', 'uses' => 'AppController@postAppEditAdmin'])->where('id','[0-9]+');
		//	Route::get('delete/{id}',['as'=>'getAppDel', 'uses' => 'AppController@getAppDel'])->where('id','[0-9]+');
		//	Route::post('testapp',['as'=>'postTestApp', 'uses' => 'AppController@postTestApp']);
		//	Route::get('testapp',['as'=>'getTestApp', 'uses' => 'AppController@getTestApp']);
			Route::group(['prefix' => 'set'], function(){
				Route::get('accept/{id}',['as' => 'getAppSetAccept', 'uses'=> 'AppController@getAppSetAccept']);
				Route::get('decide/{id}',['as' => 'getAppSetDecide', 'uses'=> 'AppController@getAppSetDecide']);
				Route::get('waiting/{id}',['as' => 'getAppSetWaiting', 'uses'=> 'AppController@getAppSetWaiting']);
						
			});
		});
		Route::group(['prefix' => 'ads'], function(){
			Route::get('list',['as'=>'getAdsList', 'uses' => 'AdsController@getAdsList']);
			Route::get('add',['as'=>'getAdsAdd','uses'=> 'AdsController@getAdsAdd']);
			Route::post('add',['as'=>'postAdsAdd','uses'=> 'AdsController@postAdsAdd']);
			Route::get('edit/{id}',['as'=>'getAdsEdit','uses'=> 'AdsController@getAdsEdit']);
			Route::post('edit/{id}',['as'=>'postAdsEdit','uses'=> 'AdsController@postAdsEdit']);
			Route::get('delete/{id}',['as'=>'getAdsDelete', 'uses' =>'AdsController@getAdsDelete'])->where('id','[0-9]+');

		});

    });
   
});
Route::group(['middleware'=>'isroledev'], function(){
	Route::group(['prefix' => 'devsites'], function(){
		//Route::get('/',['as' => 'getStatistics', 'uses' => 'AdminController@getStatistics']);
		Route::get('/', function(){
    		return view('dev.dashboard.main');
    	});
    	Route::group(['prefix' => 'app'], function(){
			Route::get('add',['as' => 'getAddApp', 'uses' => 'AppController@getAppAdd']);
			Route::post('add',['as' => 'postAddApp', 'uses' => 'AppController@postAppAdd']);
			Route::get('list/{method?}/{page?}',['as'=>'getAppListDev', 'uses' => 'AppController@getAppListDev'])->where('page','[0-9]+');;
			Route::get('edit/{id}',['as'=>'getAppEditDev', 'uses' => 'AppController@getAppEditDev'])->where('id','[0-9]+');
			Route::post('edit/{id}',['as' => 'postAddEditDev', 'uses' => 'AppController@postAppEditDev'])->where('id','[0-9]+');
			Route::get('delete/{id}',['as'=>'getAppDel', 'uses' => 'AppController@getAppDel'])->where('id','[0-9]+');
			Route::post('testapp',['as'=>'postTestApp', 'uses' => 'AppController@postTestApp']);
			Route::get('testapp',['as'=>'getTestApp', 'uses' => 'AppController@getTestApp']);
			Route::get('testappid/{id}',['as' => 'getTestAppId', 'uses'=>'AppController@getTestAppId']);
			
			
			
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
Route::get('listhot/{page}',['as'=> 'getListHot', 'uses'=> 'AppController@getListHot'])->where('page','[0-9]+');
Route::get('listsearch/{keyword}', ['as' => 'getlistSearch', 'uses' => "AppController@getSearchApp"]);
Route::get('list5new',['as'=>'getList5New', 'uses'=> 'AppController@getList5New']);
Route::get('lastapp',['as'=>'getLastApp', 'uses'=> 'AppController@getLastApp']);
