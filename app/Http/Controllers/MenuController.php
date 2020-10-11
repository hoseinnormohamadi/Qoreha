<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Traits\CustomAuth;
use App\Traits\Uploader;
use Illuminate\Http\Request;

class MenuController extends Controller
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
            if (\request('SearchTerm')) {
                $Ads = Menu::where('Name','LIKE', '%' . request('SearchTerm') . '%')->paginate(25);
            } else {
                $Ads = Menu::paginate(25);
            }
            $All = Menu::all()->count();

        return view('Panel.Menu.All')
            ->with('Menus', $Ads)
            ->with('All', $All);
    }

    public function Add(){
        return view('Panel.Menu.Create');
    }

    public function Create(Request $request){
        $request->validate([
            'Name' => 'required|string|max:150',
            'Link' => 'required|string'
        ]);
        try {
            $Menu = Menu::create([
                'Name' => $request->Name,
                'Link' => $request->Link
            ]);
            return RedirectController::Redirect('/panel/Menu/Edit/'.$Menu->id,'منو شما با موفقیت ثبت شد');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Menu/All',$exception->getMessage());
        }
    }

    public function Edit($id){
        $Menu = Menu::find($id);
        if ($Menu == '' || empty($Menu)){
            return  RedirectController::Redirect('/panel/Menu/All','منو مورد نظر شما یافت نشد.مجدداً تلاش کنید');
        }
        return view('Panel.Menu.Edit')->with(['Menu' => $Menu]);
    }

    public function Update($id,Request $request){
        $Menu = Menu::find($id);
        if ($Menu == '' || empty($Menu)){
            return  RedirectController::Redirect('/panel/Menu/All','منو مورد نظر شما یافت نشد.مجدداً تلاش کنید');
        }
        $request->validate([
            'Name' => 'required|string|max:150',
            'Link' => 'required|string',
        ]);
        try {
            $Menu->Name = $request->Name;
            $Menu->Link = $request->Link;
            $Menu->save();
            return RedirectController::Redirect('/panel/Menu/Edit/'.$Menu->id,'منو شما با موفقیت ویرایش شد.');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Menu/All',$exception->getMessage());
        }
    }

    public function Delete($id){
        $Menu = Menu::find($id);
        if ($Menu == '' || empty($Menu)){
            return  RedirectController::Redirect('/panel/Menu/All','منو مورد نظر شما یافت نشد.مجدداً تلاش کنید');
        }
        try {
            $Menu->delete();
            return RedirectController::Redirect('/panel/Menu/All','منو شما با موفقیت حذف شد.');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Menu/All',$exception->getMessage());
        }
    }


}
