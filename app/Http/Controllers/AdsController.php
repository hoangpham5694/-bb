<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ads_Code;
class AdsController extends Controller
{
    public function getAdsList(){
    	$ads = Ads_code::select('id','name')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.ads.ads_list',['data_ads'=> $ads]);
    }
    public function getAdsAdd(){
    	return view('admin.ads.ads_add');
    }
    public function postAdsAdd(Request $request){
    	$ads = new Ads_code();
    	$ads->id= $request->txtID;
    	$ads->name= $request->txtName;
    	$ads->code = $request->txtJs;
    	$ads->save();
    	return redirect()->route('getAdsList')->with(['flash_level'=>'result_msg','flash_message' => 'Thêm ads thành công'] );

    }
    public function getAdsEdit($id){
    	$data = Ads_Code::findOrFail($id)->toArray();
    	return view('admin.ads.ads_edit',['data'=>$data]);
    }
    public function postAdsEdit(Request $request,$id){
    	$ads = Ads_Code::findOrFail($id);
    	$ads->id = $request->txtID;
    	$ads->name= $request->txtName;
    	$ads->code = $request->txtJs;
    	$ads->save();
    	return redirect()->route('getAdsList')->with(['flash_level'=>'result_msg','flash_message' => 'Sửa Ads thành công'] );
    }
    public function getAdsDelete($id){
    	$ads = Ads_Code::findOrFail($id);
    	$ads->delete();
    	return "Xóa ads thành công";
    }
}
