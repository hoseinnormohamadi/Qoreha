<?php

namespace App\Http\Controllers;

use App\Shop;
use App\ShopCategory;
use App\Traits\CustomAuth;
use App\Traits\Uploader;
use Illuminate\Http\Request;

class ShopController extends Controller
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

    public function All()
    {
            if (\request('SearchTerm')) {
                $Items = Shop::where('Name','LIKE', '%' . request('SearchTerm') . '%')->paginate(25);
            } elseif (request('Mode')) {
                $Items = Shop::where('Category' , request('Mode'))->paginate(25);
            } else {
                $Items = Shop::paginate(25);
            }
            $All = Shop::all()->count();
            $Tags = ShopCategory::all();
        return view('Panel.Shop.All')
            ->with('Items', $Items)
            ->with('All', $All)
            ->with('Tags' , $Tags);
    }

    public function Add()
    {
        $Tags = ShopCategory::all();
        return view('Panel.Shop.Create')->with('Tags' , $Tags);
    }

    public function Create(Request $request)
    {
        $request->validate([
            'Name' => 'required|string',
            'Description' => 'required|string',
            'Image' => 'required|image',
            'Color' => 'required|string',
            'Capacity' => 'required|string',
            'Height' => 'required|string',
            'Size' => 'required|string',
            'Weight' => 'required|string',
            'Diameter' => 'required|integer',
            'Price' => 'required|string',
            'Status' => 'required|string',
            'Type' => 'required|string',
            'Category' => 'required|string',
        ]);
        try {
            $Item = Shop::create([
                'Name' => $request->Name,
                'Description' => $request->Description,
                'Image' => $this->UploadPic($request,'Image','Shop'),
                'Color' => $request->Color,
                'Capacity' => $request->Capacity,
                'Height' => $request->Height,
                'Size' => $request->Size,
                'Weight' => $request->Weight,
                'Diameter' => $request->Diameter,
                'Price' => $request->Price,
                'Status' => $request->Status,
                'Type' => $request->Type,
                'Category' => $request->Category,
            ]);
            return RedirectController::Redirect('/panel/Shop/Edit/'.$Item->id,'کالا با موفقیت اضافه شد.');
        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Shop/Add',$exception->getMessage());
        }
    }

    public function Edit($id)
    {
        $Item = Shop::find($id);
        if ($Item == '' || empty($Item) || $Item->count() == 0){
            return RedirectController::Redirect('/panel/Shop/All','کالا مورد نظر شما یافت نشد');
        }
        $Tags = ShopCategory::all();
        return view('Panel.Shop.Edit')->with([
            'Item' => $Item,
            'Tags' => $Tags
        ]);
    }

    public function Update($id, Request $request)
    {
        $Item = Shop::find($id);
        if ($Item == '' || empty($Item) || $Item->count() == 0){
            return RedirectController::Redirect('/panel/Shop/All','کالا مورد نظر شما یافت نشد');
        }
        $request->validate([
            'Name' => 'required|string',
            'Description' => 'required|string',
            'Image' => 'image',
            'Color' => 'required|string',
            'Capacity' => 'required|string',
            'Height' => 'required|string',
            'Size' => 'required|string',
            'Weight' => 'required|string',
            'Diameter' => 'required|integer',
            'Price' => 'required|string',
            'Status' => 'required|string',
            'Type' => 'required|string',
            'Category' => 'required|string',
        ]);
        try {
            $Item->Name = $request->Name;
            $Item->Description = $request->Description;
            $Item->Image = $request->hasFile('Image') ? $this->UploadPic($request,'Image','Shop') : $Item->Image;
            $Item->Color = $request->Color;
            $Item->Capacity = $request->Capacity;
            $Item->Height = $request->Height;
            $Item->Size = $request->Size;
            $Item->Weight = $request->Weight;
            $Item->Diameter = $request->Diameter;
            $Item->Price = $request->Price;
            $Item->Status = $request->Status;
            $Item->Type = $request->Type;
            $Item->Category = $request->Category;
            $Item->save();
            return RedirectController::Redirect('/panel/Shop/Edit/'.$Item->id,'کالا با موفقیت بروزرسانی شد');

        }
        catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Shop/Edit/'.$Item->id,$exception->getMessage());
        }

    }

    public function Delete($id)
    {
        $Item = Shop::find($id);
        if ($Item == '' || empty($Item) || $Item->count() == 0){
            return RedirectController::Redirect('/panel/Shop/All','کالا مورد نظر شما یافت نشد');
        }
        try {
            $Item->delete();
            return RedirectController::Redirect('/panel/Shop/All','کالا با موفقیت حذف شد');
        }
        catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Shop/All/',$exception->getMessage());
        }
    }
}
