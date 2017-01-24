<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;

class SocialController extends Controller
{
     public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        //dd($user);
        // $user->token;
       // print_r($user);

        $request->session()->put('user',$user);
       // $request->session()->forget('user');
        
        if($request->session()->has('user')){
            echo "Session đang lưu user";
           // echo $request->session()->get('user');
        }
        if($request->session()->has('backurl')){
            echo "Session đang lưu url";
           // echo $request->session()->get('user');
           $backurl= $request->session()->get('backurl');
            echo $backurl;
            return redirect($backurl);
        }
         
     //   return redirect()->route($backurl);
          //  return redirect()->back();
          
            
    }
    public function getUserInfo(Request $request){
        if(!$request->session()->has('user')){
        echo "Session đang không lưu user";
          //  $backurl= 'getResponseTenCuaBan';
        //    $request->session()->put('backurl', $backurl);
            return redirect()->route('redirectToProvider');

           
        }else{
        //   echo "Session đang lưu user";
            $data  = $request->session()->get('user');
           // dd($data);
            
           // echo $data->user['gender'] ;
        }
        return response()->json($data);
    }

    

}
