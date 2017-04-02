<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Component\GenerateImage;
use Illuminate\Http\Response;
use DateTime,File;
use App\Login_History;
//use App\App;
class AppPlayerController extends Controller
{

    public function getSaveImage(Request $request){
        echo "get save";
    }

    public function postSaveImage(Request $request){
     //   $data = Input::all();
        //echo $request->canvasimg;
        
        $file = base64_decode( substr($request->canvasimg, strpos($request->canvasimg, ",")+1));
        $image = imagecreatefromstring($file);
            $image = resize($image, 560, 292);
        $folderName = '/mh94_apps/';
        if($request->session()->has('user')){
            $data  = $request->session()->get('user');
            $safeName = time().'_'.$data->id.'_'.$request->title.'.'.'png';
           /* if(file_exists(public_path().$folderName.$safeName)){
                File::delete(public_path().$folderName.$safeName);

            }*/
            $destinationPath = public_path() . $folderName;
            //echo $destinationPath;
            $success = file_put_contents($destinationPath.$safeName, $file);
          //  $success = file_put_contents($destinationPath.$safeName, $image);
            //$file->move($destinationPath,$safeName);
    
$imgFileName = $destinationPath.$safeName;
SaveImage($image,$imgFileName);

         $history = Login_History::where('id', $data->id)->first();

         if($history){
           // dd($history);
            
            $history->name= $data->name;
            $history->email= $data->email;
            $history->image_url = $data->avatar;
            $history->updated_at = new DateTime();
            $date = new DateTime();
            $history->history=$date->format('Y-m-d H:i:s')." - Click share - ".$request->title."<br>".$history->history;
            $history->save();

         }
        return $safeName;
           
        }
    /*    $app = App::where('id', $request->id)->first();
        if($app){
            if($app->share != null){
                $app->share +=1;
            }else{
                $app->share =1;
            }
        }
        */
    }

    public function getResponseTenCuaBan2(Request $request){
    	//echo "Đây là app tên của bạn";
    	//$request->session()->forget('user');
    	if(!$request->session()->has('user')){
        echo "Session đang không lưu user";
          //  $backurl= 'getResponseTenCuaBan';
        //    $request->session()->put('backurl', $backurl);
            return redirect()->route('redirectToProvider');

           
        }else{
        //	 echo "Session đang lưu user";
            $data  = $request->session()->get('user');
           // dd($data);
            
            //echo ;
        }
      //  echo "những thằng tên".$data->name."Thường rất ngu";
        //return  "Dừng lại";
        
        $WaterMark_Transparency = "100";

// Import the images to use...
// the watermark is a gif (transparency without the white.)
$WaterMark = loadImage($data->avatar);
$Main_Image = loadImage("mh94_apps/tencuaban/trump.jpg");

// Get the width and height of each image.
$Main_Image_width = imageSX($Main_Image);
$Main_Image_height = imageSY($Main_Image);


// calculate the position of the WaterMark


//put the watermark on top of the background image.
//imageCopyMerge($Main_Image, $WaterMark, $MaterMark_x, $MaterMark_y, 0, 0, $WaterMark_width, $WaterMark_height, $WaterMark_Transparency);
//$genImage = new genImage();
//include("/app/Http/Component/GenerateImage.php");
//$WaterMark = resizeToHeight($WaterMark, 50);
//$WaterMark = CropCricleImage($WaterMark);
$WaterMark = CropSquareImage($WaterMark, 90, 90);
$WaterMark = CropCricleImage($WaterMark);


$WaterMark_width = imageSX($WaterMark);
$WaterMark_height = imageSY($WaterMark);
$MaterMark_x = ($Main_Image_width - $WaterMark_width);
$MaterMark_y = ($Main_Image_height - $WaterMark_height);
$Main_Image = ImageOnImage($Main_Image, $WaterMark, $WaterMark_width, $WaterMark_height, 50, 30,100);
$item_text = "Những thằng tên\n".$data->name."\nthường rất thông minh";
$Main_Image = WriteOnImage($Main_Image, $item_text, 70, 160, 19, 0, "fonts/arial.ttf" );

// Let the browser know that it is an image..
//header("Content-Type: image/PNG");

// show the image in png format(sharper image) 
$path = "mh94_apps/tencuaban/";
$imgFileName = $path."tencuaban_".$data->id.".png";
SaveImage($Main_Image,$imgFileName);
imagedestroy($Main_Image);
//$file->move("img", $Main_Image);
return response()->json(['imageurl' => $imgFileName]);
//echo $imgFileName;


    }

    public function getResponseTenCuaBan(Request $request){
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
        
        $num = rand(0,10);
        $text = "";
        switch ($data->user['gender']) {
            case 'male':
                # code...
                $text .="Những thằng tên ";
                $numran = rand(0,4);
                break;
            case 'female':
                # code...
                $text .="Những bạn tên ";
                $numran = rand(5,9);
                break;
            
            default:
                # code...
                break;
        }
        $text.= $data->user['name'];
      //  $numran = rand(0,10);
        $text.=" rất ";
        switch ($numran) {
            case 0:
                $text.="sạo lol";
                break;
            case 1:
                $text.="ngu học";
                break;
            case 2:
                $text.="óc chó";
                break;
            case 3:
                $text.="trẻ trâu";
                break;
            case 4:
                $text.="quậy phá";
                break;
            case 5:
                $text.="dễ thương";
                break;
            case 6:
                $text.="hiền lành";
                break;
            case 7:
                $text.="dịu dàng";
                break;
            case 8:
                $text.="xinh đẹp";
                break;
            case 9:
                $text.="hãm lol";
                break;

            
            default:
                # code...
                break;
        }
        //$text .= 
        $backurl= '/apps/tencuaban';
        $request->session()->put('backurl', $backurl);
        /*return view('guest.app.tencuaban',['datauser'=> $data, 'bgurl'=>'mh94_apps/tencuaban/trump.jpg', 'bubbleurl'=>'mh94_apps/tencuaban/bubble.png', 'text'=> $text]);
        */
        return view('guest.app.tencuaban');
    }
}
