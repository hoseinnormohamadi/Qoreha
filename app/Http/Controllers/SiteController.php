<?php

namespace App\Http\Controllers;

use App\Site;
use App\Traits\Uploader;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    use Uploader;
    public function SiteSetting(){
        $SiteConfig = Site::find(1);
        return view('Panel.Site.SiteSetting',['SiteConfig' => $SiteConfig]);
    }

    public function UpdateSiteGeneral(Request $request){
        $request->validate([
            'SiteName' => 'required|string|max:20',
            'SiteAbout' => 'required|string'
        ]);
        try {
            $SiteConfig = Site::find(1);
            $SiteConfig->SiteName = $request->SiteName;
            $SiteConfig->AboutUs = $request->SiteAbout;
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
}
