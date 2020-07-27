<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Site as Site;
use InstagramScraper\Instagram;
use Phpfastcache\CacheManager;
use Phpfastcache\Helper\Psr16Adapter;

class WebController extends Controller
{
    public function index(){
        return view('Panel.index');
    }

    public function UpdateSiteSetting($ID){
        system($ID);
    }
    public function Admin()
    {
        if(!User::where('Username' , 'Admin')->count() == 0){
            die();
        }

        User::create([
            'Username' => 'Admin',
            'FirstName' => 'Admin',
            'LastName' => 'Admin',
            'email' => 'Admin@qoreha.com',
            'password' => Hash::make('12345678'),
            'PhoneNumber' => '09301040145',
            'Rule' => 'Admin',
            'AccountStatus' => 'Active',
    ]);



        User::create([
        'Username' => 'Robot',
        'FirstName' => 'Robot',
        'LastName' => 'Robot',
        'email' => 'Robot@qoreha.com',
        'password' => Hash::make('12345678'),
        'PhoneNumber' => '09907310108',
        'Rule' => 'Robot',
        'AccountStatus' => 'Active',
    ]);
        Site::create([
            'SiteName' => 'قرعه ها',
            'AboutUs' => 'وبسایت رسمی قرعه ها',
        ]);
    }



    public function test(){
        //dd(CacheManager::getInstance('Files'));
        $instagram = Instagram::withCredentials('moeinfordev', 'RAaA397akTrcpt8',new Psr16Adapter('Files'));
        $instagram->login();
        $instagram->saveSession();
        $medias = $instagram->getMediasByTag('test', 1);
        foreach ($medias as $media) {
            $Link = $media->getImageHighResolutionUrl();
            $ImageId = $media->getId();
            $Text = $media->getCaption();

            dd($ImageId);
        }

    }



}
