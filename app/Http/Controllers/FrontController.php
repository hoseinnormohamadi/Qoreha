<?php

namespace App\Http\Controllers;

use App\Lottery;
use App\LotteryCat;
use App\LotteryCategory;
use App\Site;
use App\Slider;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $LastLotterys = Lottery::orderBy('id', 'desc')->take(6)->get();
        return view('Front.index')->with(['LastLotterys' => $LastLotterys]);
    }
    public function contactus(){
        return view('Front.contact-us');
    }
    public function aboutus(){
        $About = Site::find(1);
        return view('Front.about-us')->with(['About' => $About->AboutUs]);
    }

    public function mainPage(){
        $Slider = Slider::where('Status' , 'Active')->get();
        $Category = LotteryCat::all();
        $LastLotterys = Lottery::orderBy('id', 'desc')->take(6)->get();
        return view('Front.main-page')->with([
            'Sliders' => $Slider,
            'Categorys' => $Category,
            'LastLotterys' => $LastLotterys
        ]);
    }
}
