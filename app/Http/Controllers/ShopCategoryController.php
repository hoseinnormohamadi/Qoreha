<?php

namespace App\Http\Controllers;

use App\ShopCategory;
use App\Traits\CustomAuth;
use Illuminate\Http\Request;

class ShopCategoryController extends Controller
{
    Use CustomAuth;
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
        if (\request('SearchTerm')){
            $Tags =ShopCategory::where('name','LIKE','%' . request('SearchTerm') . '%')->paginate(25);
        }else{
            $Tags = ShopCategory::paginate(25);
        }
        return view('Panel.Shop.Tags')->with('Tags',$Tags);
    }


    public function Add(){

        return  view('Panel.Shop.CreateTag');
    }

    public function Create(Request $request){

        $request->validate([
            'name' => 'required|string'
        ]);
        try {
            $Tag = ShopCategory::create([
                'name' => $request->name
            ]);
            return RedirectController::Redirect('/panel/Shop/Category/Edit/'.$Tag->id, 'دسته بندی با موفقیت افزوده شد');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Shop/Category/Add', $exception->getMessage());
        }
    }


    public function Edit($id){

        $Tag = ShopCategory::find($id);
        if ($Tag == '' || empty($Tag) || $Tag->count() == 0){
            return RedirectController::Redirect('/panel/Shop/Category/All', 'دسته بندی مورد نظر شما یافت نشد');
        }
        return view('Panel.Shop.EditTag')->with('Tag' , $Tag);
    }

    public function Update($id , Request $request){

        $Tag = ShopCategory::find($id);
        if ($Tag == '' || empty($Tag) || $Tag->count() == 0){
            return RedirectController::Redirect('/panel/Shop/Category/All', 'دسته بندی مورد نظر شما یافت نشد');
        }
        $request->validate([
            'name' => 'required|string'
        ]);
        try {
            $Tag->name = $request->name;
            $Tag->save();
            return RedirectController::Redirect('/panel/Shop/Category/Edit/'.$Tag->id, 'دسته بندی با موفقیت بروزرسانی شد');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Shop/Category/Edit/'.$Tag->id, $exception->getMessage());
        }

    }

    public function Delete($id){

        $Tag = ShopCategory::find($id);
        if ($Tag == '' || empty($Tag) || $Tag->count() == 0){
            return RedirectController::Redirect('/panel/Shop/Category/All', 'دسته بندی مورد نظر شما یافت نشد');
        }
        try {
            $Tag->delete();
            return RedirectController::Redirect('/panel/Shop/Category/All/', 'دسته بندی با موفقیت حذف شد');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Shop/Category/All', $exception->getMessage());
        }

    }

}
