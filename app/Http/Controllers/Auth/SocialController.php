<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\Login_History;
use DateTime;
class SocialController extends Controller
{
     public function redirectToProvider()
    {
      //  return Socialite::driver('facebook')->scopes(['user_friends'])->redirect();
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
      //  $user = Socialite::driver('facebook')->stateless()->user();
        //  $user = Socialite::driver('facebook')->fields(['name','first_name','last_name', 'email', 'gender', 'verified', 'taggable_friends{name,last_name,first_name,picture}'])->user();
         $user = Socialite::driver('facebook')->fields(['name','first_name','last_name', 'email', 'gender','verified'])->user();
       // dd($user);
         $history = Login_History::where('id', $user->id)->first();

         if($history){
           // dd($history);
            
            $history->name= $user->name;
            $history->email= $user->email;
            $history->image_url = $user->avatar;
            $history->updated_at = new DateTime();
            $date = new DateTime();
            $history->history=$date->format('Y-m-d H:i:s')." - Login Again"."<br>".$history->history;
            $history->save();

         }else{ 
           // return "Không tìm thấy";
            $newHistory = new Login_History();
            $newHistory->id= $user->id;
            $newHistory->name= $user->name;
            $newHistory->email= $user->email;
            $newHistory->image_url = $user->avatar;
            $newHistory->created_at = new DateTime();
            $newHistory->updated_at = new DateTime();
            $date = new DateTime();
            $newHistory->history=$date->format('Y-m-d H:i:s')." - First Login";
            $newHistory->save();
        }

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
        }else{
            return redirect()->route('getIndex');
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
    public function getUserFriends(Request $request){
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
