<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Traits\CustomAuth;
use App\Traits\Uploader;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    use CustomAuth;
    use Uploader;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!$this->IsAdmin()) {
                return RedirectController::Redirect('/panel/', 'شما اجازه دسترسی به این بخش را ندارید!!!');
            }
            return $next($request);
        });
    }

    public function All(){
        if ($this->IsAdmin()) {
            if (\request('SearchTerm')) {
                $Ads = Ads::where('Name','LIKE', '%' . request('SearchTerm') . '%')->paginate(25);
            } elseif (request('Mode')) {
                $Ads = Ads::where('Status', request('Mode'))->paginate(25);
            } else {
                $Ads = Ads::paginate(25);
            }
            $All = Ads::all()->count();
            $Active = Ads::where('Status' , 'Active')->count();
            $DeActive = Ads::where('Status' , 'DeActive')->count();

        }
        return view('Panel.Ads.All')
            ->with('Ads', $Ads)
            ->with('All', $All)
            ->with('Active' , $Active)
            ->with('DeActive' , $DeActive);
    }

    public function Add(){
        return view('Panel.Ads.Create');
    }

    public function Create(Request $request){
        $request->validate([
            'Name' => 'required|string|max:150',
            'Link' => 'required|string',
            'AdsImage' => 'required|image',
            'Status' => 'required|string',
            'ExpireDate' => 'required|date'
        ]);
        try {
            $Ads = Ads::create([
                'Name' => $request->Name,
                'Link' => $request->Link,
                'Image' => $this->UploadPic($request,'AdsImage','Ads'),
                'Status' => $request->Status,
                'ExpireDate' => $request->ExpireDate
            ]);
            return RedirectController::Redirect('/panel/Ads/Edit/'.$Ads->id,'تلیغات شما با موفقیت ثبت شد');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Ads/All',$exception->getMessage());
        }
    }

    public function Edit($id){
        $Ads = Ads::find($id);
        if ($Ads == '' || empty($Ads)){
            return  RedirectController::Redirect('/panel/Ads/All','تبلیغات مورد نظر شما یافت نشد.مجدداً تلاش کنید');
        }
        return view('Panel.Ads.Edit')->with(['Ads' => $Ads]);
    }

    public function Update($id,Request $request){
        $Ads = Ads::find($id);
        if ($Ads == '' || empty($Ads)){
            return  RedirectController::Redirect('/panel/Ads/All','تبلیغات مورد نظر شما یافت نشد.مجدداً تلاش کنید');
        }
        $request->validate([
            'Name' => 'required|string|max:150',
            'Link' => 'required|string',
            'Status' => 'required|string',
            'ExpireDate' => 'required|date'
        ]);
        try {
            $Ads->Name = $request->Name;
            $Ads->Link = $request->Link;
            $Ads->Image = $request->hasFile('AdsImage') ? $this->UploadPic($request,'AdsImage','Ads') : $Ads->Image;
            $Ads->Status = $request->Status;
            $Ads->ExpireDate = $request->ExpireDate;
            $Ads->save();
            return RedirectController::Redirect('/panel/Ads/Edit/'.$Ads->id,'تبلیغات شما با موفقیت ویرایش شد.');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Ads/All',$exception->getMessage());
        }
    }

    public function Delete($id){
        $Ads = Ads::find($id);
        if ($Ads == '' || empty($Ads)){
            return  RedirectController::Redirect('/panel/Ads/All','تبلیغات مورد نظر شما یافت نشد.مجدداً تلاش کنید');
        }
        try {
            $Ads->delete();
            return RedirectController::Redirect('/panel/Ads/All','تبلیغات شما با موفقیت حذف شد.');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Ads/All',$exception->getMessage());
        }
    }


}
