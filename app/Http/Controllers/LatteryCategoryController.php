<?php

namespace App\Http\Controllers;

use App\LotteryCat;
use App\Traits\CustomAuth;
use Illuminate\Http\Request;

class LatteryCategoryController extends Controller
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
            $Tags =LotteryCat::where('name','LIKE','%' . request('SearchTerm') . '%')->paginate(25);
        }else{
            $Tags = LotteryCat::paginate(25);
        }
        return view('Panel.Lottery.Tags')->with('Tags',$Tags);
    }


    public function Add(){

        return  view('Panel.Lottery.CreateTag');
    }

    public function Create(Request $request){

        $request->validate([
            'TagName' => 'required|string'
        ]);
        try {
            $Tag = LotteryCat::create([
                'name' => $request->TagName
            ]);
            return RedirectController::Redirect('/panel/Lottery/Category/Edit/'.$Tag->id, 'دسته بندی با موفقیت افزوده شد');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Lottery/Category/Add', $exception->getMessage());
        }
    }


    public function Edit($id){

        $Tag = LotteryCat::find($id);
        if ($Tag == '' || empty($Tag) || $Tag->count() == 0){
            return RedirectController::Redirect('/panel/Lottery/Category/All', 'دسته بندی مورد نظر شما یافت نشد');
        }
        return view('Panel.Lottery.EditTag')->with('Tag' , $Tag);
    }

    public function Update($id , Request $request){

        $Tag = LotteryCat::find($id);
        if ($Tag == '' || empty($Tag) || $Tag->count() == 0){
            return RedirectController::Redirect('/panel/Lottery/Category/All', 'دسته بندی مورد نظر شما یافت نشد');
        }
        $request->validate([
            'TagName' => 'required|string'
        ]);
        try {
            $Tag->name = $request->TagName;
            $Tag->save();
            return RedirectController::Redirect('/panel/Lottery/Category/Edit/'.$Tag->id, 'دسته بندی با موفقیت بروزرسانی شد');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Lottery/Category/Edit/'.$Tag->id, $exception->getMessage());
        }

    }

    public function Delete($id){

        $Tag = LotteryCat::find($id);
        if ($Tag == '' || empty($Tag) || $Tag->count() == 0){
            return RedirectController::Redirect('/panel/Lottery/Category/All', 'دسته بندی مورد نظر شما یافت نشد');
        }
        try {
            $Tag->delete();
            return RedirectController::Redirect('/panel/Lottery/Category/All/', 'دسته بندی با موفقیت حذف شد');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Lottery/Category/All', $exception->getMessage());
        }

    }

}
