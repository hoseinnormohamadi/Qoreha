<?php

namespace App\Http\Controllers;

use App\LotteryCat;
use App\SubCategory;
use App\Traits\Uploader;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    use Uploader;
    public function All(){
        if (\request('SearchTerm')){
            $Tags =SubCategory::where('name','LIKE','%' . request('SearchTerm') . '%')->paginate(25);
        }else{
            $Tags = SubCategory::paginate(25);
        }
        return view('Panel.Categorys.SubCat')->with('Tags',$Tags);
    }

    public function Add(){
        $Tags = LotteryCat::all();
        return  view('Panel.Categorys.CreateSub')->with(['Tags' =>$Tags]);
    }

    public function Create(Request $request){

        $request->validate([
            'Name' => 'required|string',
            'Parent' => 'required|integer'
        ]);
        try {
            SubCategory::create([
                'name' => $request->Name,
                'Image' => $this->UploadPic($request,'Image','SubCategorys','SubCategory'),
                'Parent' => $request->Parent
            ]);
            return RedirectController::Redirect(route('SubCategory.All'), 'دسته بندی با موفقیت افزوده شد');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect(url()->previous(), $exception->getMessage());
        }
    }

    public function Edit($id){

        $SubCategory = SubCategory::find($id);
        if ($SubCategory == '' || empty($SubCategory) || $SubCategory->count() == 0){
            return RedirectController::Redirect('/panel/Lottery/Category/All', 'دسته بندی مورد نظر شما یافت نشد');
        }
        $Tags = LotteryCat::all();
        return view('Panel.Categorys.EditSub')->with(['Tags' => $Tags , 'SubCategory' => $SubCategory]);
    }

    public function Update($id , Request $request){

        $SubCategory = SubCategory::find($id);
        if ($SubCategory == '' || empty($SubCategory) || $SubCategory->count() == 0){
            return RedirectController::Redirect(route('SubCategory.All'), 'دسته بندی مورد نظر شما یافت نشد');
        }
        $request->validate([
            'Name' => 'required|string'
        ]);
        try {
            $SubCategory->name = $request->Name;
            $SubCategory->Parent = $request->Parent;
            $SubCategory->Image = $request->hasFile('Image') ? $this->UploadPic($request,'Image','SubCategorys','SubCategory') : $SubCategory->Image;
            $SubCategory->save();
            return RedirectController::Redirect(url()->previous(), 'دسته بندی با موفقیت بروزرسانی شد');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect(url()->previous(), $exception->getMessage());
        }

    }

    public function Delete($id){

        $SubCategory = SubCategory::find($id);
        if ($SubCategory == '' || empty($SubCategory) || $SubCategory->count() == 0){
            return RedirectController::Redirect(route('SubCategory.All'), 'دسته بندی مورد نظر شما یافت نشد');
        }
        try {
            $SubCategory->delete();
            return RedirectController::Redirect(url()->previous(), 'دسته بندی با موفقیت حذف شد');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect(url()->previous(), $exception->getMessage());
        }

    }
}
