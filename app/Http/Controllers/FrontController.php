<?php

namespace App\Http\Controllers;

use App\Blog;
use App\ContactUs;
use App\Lottery;
use App\LotteryCat;
use App\LotteryCategory;
use App\Site;
use App\Slider;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\uri_for;

class FrontController extends Controller
{
    public function index(){
        $LastLotterys = Lottery::orderBy('id', 'desc')->take(6)->get();
        return view('Front.index')->with(['LastLotterys' => $LastLotterys]);
    }
    public function contactus(){
        return view('Front.contacts');
    }
    public function aboutus(){
        $About = Site::find(1);
        return view('Front.about')->with(['About' => $About->AboutUs]);
    }
    public function Search(){
        $Lotterys = Lottery::where('LotteryTitle', 'LIKE', '%' . request('Key') . '%')->paginate(6);
        return view('Front.listing')->with(['Lotterys' => $Lotterys]);
    }
    public function Lotterys(){
        $Lotterys = Lottery::where('LotteryMode', 'Public')->paginate(6);
        return view('Front.listing')->with(['Lotterys' => $Lotterys]);
    }
    public function Blog(){
        if (\request('Key') !== null){
            $News =  Blog::where('PostName' ,'LIKE', '%' . request('Key') . '%' )->where('PostStatus', 'Published')->paginate(6);
        }else{
            $News = Blog::where('PostStatus', 'Published')->paginate(6);
        }
        return view('Front.blog')->with(['News' => $News]);
    }

    public function ContactUsPost(Request $request){
        $request->validate([
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Email' => 'string',
            'PhoneNumber' => 'required|string',
            'Text' => 'required|string',
        ]);
        try {
            $Form = ContactUs::create([
                'FirstName' => $request->FirstName,
                'LastName' => $request->LastName,
                'Email' => $request->Email != null ? $request->Email : null,
                'PhoneNumber' => $request->PhoneNumber,
                'Text' => $request->Text,
            ]);
                return RedirectController::Redirect('/contact-us','پیام شما با موفقیت برای مدیریت ارسال شد.');
        }catch (\Exception $exception){
            return RedirectController::Redirect('/contact-us','مشکلی پیش آمده.لطفامجددا تلاش کنید.');
        }
    }

    public function ShowLottery(int $id){
        if ($id < 0){
            return RedirectController:: Redirect('/');
        }
        $Lottery = Lottery::find($id);
        if ($Lottery == null || $Lottery->count() <= 0){
            return RedirectController:: Redirect('/');
        }
        if ($Lottery->LotteryMode == 'Private'){
            return RedirectController:: Redirect('/');
        }
        return view('Front.listing-single')->with(['Lottery' => $Lottery]);
    }

    public function ShowNews(int $id){
        if ($id < 0){
            return RedirectController:: Redirect('/');
        }
        $News = Blog::find($id);
        if ($News == null || $News->count() <= 0){
            return RedirectController:: Redirect('/');
        }
        if ($News->PostStatus == 'Draft'){
            return RedirectController:: Redirect('/');
        }
        return view('Front.blog-single')->with(['News' => $News]);
    }

    public static function LikeThisLottery($Category){
        $LastLotterys = Lottery::where('Category' , $Category)->orderBy('id', 'desc')->take(4)->get();
        return $LastLotterys;
    }


    public static function GetPost($ID , $rel){

        if ($rel == 'prev'){
            $ID--;
        }elseif ($rel == 'next'){
            $ID++;
        }
        $Post = Blog::find($ID);
        return $Post;
    }



    public static function LastNews($number){
        $News = Blog::where('PostStatus' , 'Published')->orderBy('id', 'desc')->take($number)->get();
        return $News;
    }

    public static function LastLottery($number){
        $LastLotterys = Lottery::orderBy('id', 'desc')->take($number)->get();
        return $LastLotterys;
    }
}
