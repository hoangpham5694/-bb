<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\App;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function getIndex()
    {
        return view('guest.index');
    }
    public function getPlayApp(Request $request, $id){
        $app = App::findOrFail($id)->toArray();
        $backurl= 'playapp/'.$id.'?action=true';
        $request->session()->put('backurl', $backurl);
        return view('guest.playapp',["data" => $app]);
    }


}
