<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AddAppRequest;
use App\Http\Requests\AppEditRequest;
use App\App;
use Illuminate\Support\Facades\Auth;
use DateTime,File;
use App\Ads_Code;
class AppController extends Controller
{
    public function getAppListAdmin($method = 'all',$page = 1){
        $numberRecord= 20;
        $vitri =($page -1 ) * $numberRecord;
        $totalApp = App::count();
        $numPages = $totalApp / $numberRecord +1;
        switch($method){
            case 'all':
                $data= App::Join('users','users.id','=','apps.create_by')->select('apps.id','apps.title','apps.image','apps.appurl','apps.created_at','apps.create_by','apps.status','users.username')->orderBy('id','DESC')->limit($numberRecord)->offset($vitri)->get()->toArray();

            break;
            default:
                   $data= App::Join('users','users.id','=','apps.create_by')->select('apps.id','apps.title','apps.image','apps.appurl','apps.created_at','apps.create_by','apps.status','users.username')->where('status','=',$method)->orderBy('id','DESC')->limit($numberRecord)->offset($vitri)->get()->toArray();

            break;
        }
              return view('admin.app.app_list',['dataApp'=>$data,'method'=>$method, 'numPages' => $numPages, 'page'=> $page]);
    }
    public function getAppListDev($method = 'all', $page = 1){
        $numberRecord= 20;
        $vitri =($page -1 ) * $numberRecord;
        $totalApp = App::count();
        $numPages = $totalApp / $numberRecord +1;
        $user = Auth::user()->id;
       // echo $user;
               switch ($method) {
            case 'all':
                # code...
                $data= App::select('id','title','image','appurl','created_at','status')->where('create_by','=',$user)->orderBy('id','DESC')->limit($numberRecord)->offset($vitri)->get()->toArray();

                break;
            case 'accept':
                $data= App::select('id','title','image','appurl','created_at','status')->where('create_by','=',$user)->where('status','=','accept')->orderBy('id','DESC')->limit($numberRecord)->offset($vitri)->get()->toArray();

            break;
            case 'waiting':
                $data= App::select('id','title','image','appurl','created_at','status')->where('create_by','=',$user)->where('status','=','waiting')->orderBy('id','DESC')->limit($numberRecord)->offset($vitri)->get()->toArray();

            break;
            case 'decide':
                $data= App::select('id','title','image','appurl','created_at','status')->where('create_by','=',$user)->where('status','=','decide')->orderBy('id','DESC')->limit($numberRecord)->offset($vitri)->get()->toArray();

            break;
            case 'exceptdecide':
                $data= App::select('id','title','image','appurl','created_at','status')->where('create_by','=',$user)->where('status','!=','decide')->orderBy('id','DESC')->limit($numberRecord)->offset($vitri)->get()->toArray();

            break;
            default:
                # code...
                break;
        }
        return view('dev.app.app_list',['dataApp'=>$data,'method'=>$method ,'numPages' => $numPages, 'page'=> $page]);
    }

    public function getPlayApp(Request $request, $id){
        $app= App::find($id);
        $app->view = $app->view +1;
        $app->save();
        $app = App::findOrFail($id)->toArray();
        $ads1 = Ads_Code::findOrFail(1)->toArray();
        $ads3 = Ads_Code::findOrFail(3)->toArray();
        $ads4 = Ads_Code::findOrFail(4)->toArray();
        $backurl= 'playapp/'.$id.'/'.$app['slug'].'.html';
        $request->session()->put('backurl', $backurl);
        return view('guest.playapp',["data" => $app,"data" => $app,"ads1" => $ads1,"ads3"=> $ads3,"ads4"=> $ads4]);
    }
    public function getAppAdd(){
    	return view('dev.app.app_add');
    }
    public function getTestApp(){
        echo "get test app";
    }
    public function postTestApp(Request $request){
        //echo "post test app";
        $htmlcode = $request->htmlcode;
        $jscode = $request->jscode;
        $title = $request->title;
        $appurl = $request->appurl;
        return view('admin.app.testapp',["htmlcode"=>$htmlcode, "appurl"=>$appurl, "jscode"=> $jscode, "title"=> $title]);
    }

    public function postAppAdd(AddAppRequest $request){
    	//return "post add";
    	$app = new App();
    	$file = $request->file('inputImg');
    	if(strlen($file) >0){
    		$filename = time().'_'.$file->getClientOriginalName();
    		$destinationPath = 'mh94_upload/appimages';
    		$file->move($destinationPath,$filename);
    		$app->image= $filename;
    	}

    	$app->title = $request->txtTitle;
    	$app->appurl = $request->txtUrl;
    	$app->description = $request->txtDes;
    	$app->slug = str_slug($request->txtTitle, "-");
        $app->html = $request->txtHTML;
        $app->script = $request->txtJs;
    	$app->created_at = new DateTime();
        $app->create_by = Auth::user()->id;
        $app->status = 'waiting';
    	$app->save();
    	return redirect()->route('getAppListDev')->with(['flash_level'=>'result_msg','flash_message' => 'Thêm App thành công'] );
    }
    public function getAppEditAdmin($id){
        $data = App::findOrFail($id)->toArray();
        return view('admin.app.app_edit',["data" => $data]);
    }
    public function postAppEditAdmin(AppEditRequest $request,$id){
        $app= App::find($id);


        $file = $request->file('inputImg');
        if(strlen($file) >0){
                    if(file_exists(public_path()."/mh94_upload/appimages/".$app->image)){
            File::delete(public_path()."/mh94_upload/appimages/".$app->image);

        }
            $filename = time().'_'.$file->getClientOriginalName();
            $destinationPath = 'mh94_upload/appimages';
            $file->move($destinationPath,$filename);
            $app->image= $filename;
        }

        $app->title = $request->txtTitle;
        $app->appurl = $request->txtUrl;
        $app->description = $request->txtDes;
        $app->slug = str_slug($request->txtTitle, "-");
        $app->html = $request->txtHTML;
        $app->script = $request->txtJs;
        $app->updated_at = new DateTime();
        $app->save();
        return redirect()->route('getAppList')->with(['flash_level'=>'result_msg','flash_message' => 'Sửa App thành công'] );
    }
    public function getAppEditDev($id){
        $data = App::findOrFail($id)->toArray();
        return view('dev.app.app_edit',["data" => $data]);
    }
    public function postAppEditDev(AppEditRequest $request,$id){
        $app= App::find($id);


        $file = $request->file('inputImg');
        if(strlen($file) >0){
                    if(file_exists(public_path()."/mh94_upload/appimages/".$app->image)){
            File::delete(public_path()."/mh94_upload/appimages/".$app->image);

        }
            $filename = time().'_'.$file->getClientOriginalName();
            $destinationPath = 'mh94_upload/appimages';
            $file->move($destinationPath,$filename);
            $app->image= $filename;
        }

        $app->title = $request->txtTitle;
        $app->appurl = $request->txtUrl;
        $app->description = $request->txtDes;
        $app->slug = str_slug($request->txtTitle, "-");
        $app->html = $request->txtHTML;
        $app->script = $request->txtJs;
        $app->updated_at = new DateTime();
        $app->save();
        return redirect()->route('getAppListDev')->with(['flash_level'=>'result_msg','flash_message' => 'Sửa App thành công'] );
    }

    public function getAppDel($id){
        $app = App::findOrFail($id);
       // echo public_path()."/mh94_upload/appimages/".$app->image;
        if(file_exists(public_path()."/mh94_upload/appimages/".$app->image)){
            File::delete(public_path()."/mh94_upload/appimages/".$app->image);

        }
        $app->delete();
      //  return redirect()->route('getAppList')->with(['flash_level'=>'result_msg','flash_message' => 'Xóa App thành công'] );
        return "xóa thành công";
     }
    public function getAppListWithPage($page){
        $numberRecord= 12;
        $vitri =($page -1 ) * $numberRecord;
        $data = App::select('id','title','description','slug','view','image','appurl','created_at')->orderBy('id','DESC')->limit($numberRecord)->offset($vitri)->get();
     //  $numberRecord = $numberRecord * $page;
     //  $data = App::select('id','title','description','slug','view','image','appurl','created_at')->orderBy('id','DESC')->limit($numberRecord)->get();
        return  json_encode($data);
    }
    public function getListHot($page){
        $numberRecord= 12;
      //  $vitri =($page -1 ) * $numberRecord;
       // $data = App::select('id','title','description','slug','view','image','appurl','created_at')->orderBy('view','DESC')->limit($numberRecord)->offset($vitri)->get();
       $numberRecord = $numberRecord * $page;
       $data = App::select('id','title','description','slug','view','image','appurl','created_at')->orderBy('view','DESC')->limit($numberRecord)->get();
        return  json_encode($data);
    }
    public function getListAppRandom(){
        $numberRecord = 5;
        $app = App::select('id','title','description','slug','view','image','appurl','created_at')->inRandomOrder()->limit($numberRecord)->offset(0)->get();;
        return json_encode($app);
    }
    public function getSearchApp($keyword){
        $keyword = "%".$keyword."%";
        $numberRecord = 10;
        $app = App::select('id','title','description','slug','view','image','appurl','created_at')->where('title', 'LIKE', $keyword)->limit($numberRecord)->offset(0)->get();;
        return json_encode($app);
    }
    public function getList5New(){
        $numberRecord = 4;
        $app = App::select('id','title','description','slug','view','image','appurl','created_at')->orderBy('id','DESC')->limit($numberRecord)->offset(1)->get();;
        return json_encode($app);
    }
    public function getLastApp(){
        $numberRecord = 1;
        $app = App::select('id','title','description','slug','view','image','appurl','created_at')->orderBy('id','DESC')->limit($numberRecord)->offset(0)->get();;
        return json_encode($app);
    }


}
