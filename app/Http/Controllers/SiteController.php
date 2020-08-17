<?php

namespace App\Http\Controllers;

use App\Site;
use App\Traits\CustomAuth;
use App\Traits\Uploader;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    use Uploader;
    use CustomAuth;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!$this->IsAdmin()) {
                return RedirectController::Redirect('/panel/', 'شما اجازه دسترسی به این بخش را ندارید!!!');
            }
            return $next($request);
        });
    }
    public function SiteSetting(){
        $SiteConfig = Site::find(1);
        return view('Panel.Site.SiteSetting',['SiteConfig' => $SiteConfig]);
    }

    public function UpdateSiteGeneral(Request $request){
        $request->validate([
            'SiteName' => 'required|string|max:20',
            'SiteAbout' => 'required|string',
            'Address' => 'required|string',
            'PhoneNumber' => 'required|string',
            'Email' => 'required|string'
        ]);
        try {
            $SiteConfig = Site::find(1);
            $SiteConfig->SiteName = $request->SiteName;
            $SiteConfig->AboutUs = $request->SiteAbout;
            $SiteConfig->PhoneNumber = $request->PhoneNumber;
            $SiteConfig->Address = $request->Address;
            $SiteConfig->Email = $request->Email;
            $SiteConfig->save();
            return RedirectController::Redirect('/panel/Site/Setting','تنظیمات سایت با موفقیت بروزرسانی شد');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Site/Setting',$exception->getMessage());
        }
    }

    public function UpdateSiteIcon(Request $request){
        $request->validate([
            'SiteIcon' => 'required|file|max:1024',
        ]);
        try {
            $this->SiteIcon($request);
            return RedirectController::Redirect('/panel/Site/Setting','آیکون سایت با موفقیت عوض شد');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Site/Setting',$exception->getMessage());

        }
    }
    public function UpdateSiteSocial(Request $request){
        $request->validate([
            'Enamad' => 'required|string|max:255',
            'Samandehi' => 'required|string|max:255',
            'Facebook' => 'required|string|max:255',
            'twitter' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'Telegram' => 'required|string|max:255',
        ]);
        try {
            $Site = Site::find(1);
            $Site->Enamad = $request->Enamad;
            $Site->Smandehi = $request->Samandehi;
            $Site->Facebook = $request->Facebook;
            $Site->twitter = $request->twitter;
            $Site->instagram = $request->instagram;
            $Site->Telegram = $request->Telegram;
            $Site->save();
            return RedirectController::Redirect('/panel/Site/Setting','تنظیمات با موفقیت ذخیره شد.');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Site/Setting',$exception->getMessage());

        }
    }
}
