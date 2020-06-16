<?php

namespace App\Http\Controllers;

use App\LinkTrade;
use App\Traits\CustomAuth;
use Illuminate\Http\Request;

class LinkTradeController extends Controller
{


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

    public function All(){

    }
    public function Add(){
        return view('Panel.LinkTrade.Create');
    }
    public function Create(Request $request){
        $request->validate([
            'Name' => 'required | string',
            'Description' => 'required | string',
            'Link' => 'required | string',
        ]);
        try {
            $Link = LinkTrade::create([
                'Name' => $request->Name,
                'Description' => $request->Description,
                'Link' => $request->Link,
            ]);
            return RedirectController::Redirect('/panel/LinkTrade/Edit/'.$Link->id,'لینک شما با موفقیت اضافه شد');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/LinkTrade/Add/',$exception->getMessage());

        }
    }

    public function Edit($id){
        $Link = LinkTrade::find($id);
        if ($Link == '' || empty($Link) || $Link->count() == 0){
            return RedirectController::Redirect('/panel/LinkTrade/All/','لینک مورد نظر شما یافت نشد');
        }

        return view('Panel.LinkTrade.Edit')->with('Link' , $Link);
    }
    public function Update($id , Request $request){

        $Link = LinkTrade::find($id);
        if ($Link == '' || empty($Link) || $Link->count() == 0){
            return RedirectController::Redirect('/panel/LinkTrade/All/','لینک مورد نظر شما یافت نشد');
        }
        $request->validate([
            'Name' => 'required | string',
            'Description' => 'required | string',
            'Link' => 'required | string',
        ]);
        try {
            $Link->Name = $request->Name;
            $Link->Description = $request->Description;
            $Link->Link = $request->Link;
            $Link->save();
            return RedirectController::Redirect('/panel/LinkTrade/Edit/'.$Link->id,'لینک شما با موفقیت بروزرسانی شد');
        }

        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/LinkTrade/Edit/'.$Link->id,$exception->getMessage());
        }
    }
    public function Delete($id){
        $Link = LinkTrade::find($id);
        if ($Link == '' || empty($Link) || $Link->count() == 0){
            return RedirectController::Redirect('/panel/LinkTrade/All/','لینک مورد نظر شما یافت نشد');
        }

        try {
            $Link->delete();
            return RedirectController::Redirect('/panel/LinkTrade/All/','لینک مورد نظر شما حذف شد');
        }

        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/LinkTrade/All/',$exception->getMessage());

        }
    }

}
