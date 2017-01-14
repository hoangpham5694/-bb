<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\User;
use App\Http\Requests\ChangePassRequest;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function getUserList(){
    	$data = User::select('id','username','name')->get()->toArray();
    	//print_r($data);
    	return view('admin.users.user_list',['data'=>$data]);
    }
    public function getChangePass(){
    	return view('admin.users.changepass');
    }
    public function postChangePass(ChangePassRequest $request){
    	
    	$user = User::findOrFail(Auth::user()->id);
    	//dd($user);
    	//print_r($user);
    	
    	if(Hash::check($request->txtOldPass,  $user->password)){
    		$user->password= Hash::make($request->txtNewPass);
    		$user->save();
    		return redirect()->route('getChangePass')->with(['flash_level'=>'result_msg','flash_message' => 'Đổi mật khẩu thành công'] );
    	//	echo "Dung";
    	}else{
    		return redirect()->route('getChangePass')->with(['flash_level'=>'error_msg','flash_message' => 'Mật khẩu cũ không đúng'] );
    	//	echo "Sai";
    	}
   
    	//$user->password= bcrypt($request->txtNewPassword);
    	//$user->save();
    	//echo $request->txtNewPass;
    	//return redirect()->route('getChangePass')->with(['flash_level'=>'result_msg','flash_message' => 'Đổi mật khẩu thành công'] );

    	
    }
}
