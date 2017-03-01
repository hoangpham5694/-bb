<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

use App\Facebook;

class LoginController extends Controller
{
     public function getLogin(){
    	if(!Auth::check()){
    		return view('admin.login.login');
    	}else{
    		return redirect('adminsites');
    	}
    	
    }
    public function postLogin(LoginRequest $request){
    	$login = ['username' => $request->txtUser,
    	 'password' => $request->txtPass,
         'role' => 2 
         ];
        if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect('adminsites');
        } else {
        	return redirect()->back();
        }
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('getLogin');
    }
    public function getLoginFacebook(){
        $fb = new Facebook\Facebook ([
        'app_id' => '719228948238299', 
        'app_secret' => '9caaadf1dce4fa3dc6eeeb8279ffe6fb',
        'default_graph_version' => 'v2.8',
        ]);
        
        /*
        $fb = new Facebook(array(
        'appId'  => '719228948238299', //App ID
        'secret' => '9caaadf1dce4fa3dc6eeeb8279ffe6fb', //App Secret
        ));
        */
        
        $helper = $fb->getRedirectLoginHelper();
        
        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('', $permissions);
     //   return echo "login fb";
    }
}
