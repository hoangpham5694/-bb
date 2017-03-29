<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Login_History;
class LoginHistoryController extends Controller
{
    public function getListLoginHistory($key= "all",$page=1){
    	
    	$numberRecord= 40;
        $vitri =($page -1 ) * $numberRecord;
        $totalHistory = Login_History::count();
        $numPages = $totalHistory / $numberRecord +1;
        switch($key){
            case 'all':
                 $data= Login_History::select('id','image_url','email','created_at','updated_at','name')->orderBy('updated_at','DESC')->limit($numberRecord)->offset($vitri)->get()->toArray();

            break;
            default:
            		$key1 = "%".$key."%";
                   $data= Login_History::select('id','image_url','email','created_at','updated_at','name')->where('name','LIKE',$key1)->orWhere('email','LIKE',$key1)->orderBy('updated_at','DESC')->limit($numberRecord)->offset($vitri)->get()->toArray();

            break;
        }

            //  dd($data);
   
        return view('admin.history.login_history_list',['data'=>$data,'numPages' => $numPages, 'page'=> $page, 'key'=>$key]);
    }
    public function getDetailLoginHistory($id){
    	$data = Login_History::select('id','image_url','email','created_at','updated_at','name','history')->where('id','=',$id)->first()->toArray();
    	//dd($data);
    	return view('admin.history.login_history_detail',['data'=>$data]);
    }
}
