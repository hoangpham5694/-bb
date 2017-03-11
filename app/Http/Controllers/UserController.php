<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\User;
use App\Http\Requests\ChangePassRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserAddRequest;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function getUserList($method = 'all'){
         switch ($method){
            case 'all':
                $data = User::select('id','username','name','role')->get()->toArray();
            break;
            case 'superadmin':
                $data = User::select('id','username','name','role')->where('role',1)->get()->toArray();
            break;
            case 'admin':
                $data = User::select('id','username','name','role')->where('role',2)->get()->toArray();
            break;
            case 'dev':
                $data = User::select('id','username','name','role')->where('role',3)->get()->toArray();
            break;
         }
    	//$data = User::select('id','username','name','role')->get()->toArray();
    	//print_r($data);
    	return view('admin.users.user_list',['data'=>$data,'method'=>$method]);
    }
    public function getUserEdit($id){
        $data = User::select('id','username','name','password','role')->findOrFail($id)->toArray();
        return view('admin.users.user_edit',['data' => $data]);
    }
    public function postUserEdit(EditUserRequest $request, $id){
        $user= User::findOrFail($id);
        $this->validate($request, [
        'txtUsername' => 'unique:users,username,'.$user->id
      
        ]);
        $user->username = $request->txtUsername;
        $user->name = $request->txtName;
        if($request->txtPass != null){
           // echo "not null";
            $user->password = Hash::make($request->txtPass);
        }
        $user->role = $request->selectRole;
        $user->save();
        return redirect()->route('getUserList')->with(['flash_level'=>'result_msg','flash_message' => 'Thay đổi user thành công'] );
    }
    public function getUserAdd(){
        return view('admin.users.user_add');

    }
    public function postUserAdd(UserAddRequest $request){
        $user = new user();
        $user->username = $request->txtUsername;
        $user->name = $request->txtName;
        $user->password = $request->txtPass;
        $user->role = $request->selectRole;
        $user->save();
        return redirect()->route('getUserList')->with(['flash_level'=>'result_msg','flash_message' => 'Thêm thành viên thành công'] );

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
