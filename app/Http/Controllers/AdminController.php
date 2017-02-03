<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\App;
class AdminController extends Controller
{
    public function getStatistics(){
    	$numrecord = App::count();
    	//echo $numrecord;
    	$totalView = APP::sum('view');
    	//echo $totalView;
    	return view('admin.dashboard.main',["numrecord"=>$numrecord, "totalView"=>$totalView]);
    }
}
