<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Traits\CustomAuth;
use App\Traits\Uploader;
use Illuminate\Http\Request;

class SliderController extends Controller
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
            $Sliders = Slider::where('Text','LIKE', '%' . request('SearchTerm') . '%')->paginate(25);
        }elseif (request('Mode')) {
            $Sliders = Slider::where('Status', request('Mode'))->paginate(25);
        }else {
            $Sliders = Slider::paginate(25);
        }
        $All = Slider::all()->count();
        $Active = Slider::where('Status' , 'Active')->count();
        $DeActive = Slider::where('Status' , 'DeActive')->count();
        return view('Panel.Slider.All')->with([
            'Sliders'=> $Sliders,
            'All'=> $All,
            'Active'=> $Active,
            'DeActive'=> $DeActive,
        ]);




    }

    public function Add()
    {
        return view('Panel.Slider.Create');
    }

    public function Create(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:150',
            'Text' => 'required|string',
            'SliderImage' => 'required|image',
            'Status' => 'required|string',
        ]);
        try {
            $Slider = Slider::create([
                'Name' => $request->Name,
                'Text' => $request->Text,
                'Image' => $this->UploadPic($request,'SliderImage','Slider'),
                'Status' => $request->Status,
            ]);
            return RedirectController::Redirect('/panel/Slider/Edit/'.$Slider->id,'اسلایدر شما با موفقیت افزوده شد.');
        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Slider/All', $exception->getMessage());
        }
    }

    public function Edit($id)
    {
        $Slider = Slider::find($id);
        if ($Slider->count() < 0 || $Slider == null || $Slider == "") {
            return RedirectController::Redirect('/panel/Slider/All', 'پیام مورد نظر شما پیدا نشد');
        }
        return view('Panel.Slider.Edit')->with('Slider', $Slider);
    }

    public function Update($id, Request $request)
    {
        $Slider = Slider::find($id);
        if ($Slider->count() < 0 || $Slider == null || $Slider == "") {
            return RedirectController::Redirect('/panel/Slider/All', 'اسلایدر مورد نظر شما پیدا نشد');
        }

        $request->validate([
            'Name' => 'required|string|max:150',
            'Text' => 'required|string',
            'SliderImage' => 'image',
            'Status' => 'required|string',
        ]);
        try {
            $Slider->Name = $request->Name;
            $Slider->Text = $request->Text;
            $Slider->Image = $request->hasFile('SliderImage') ? $this->UploadPic($request,'SliderImage','Slider') : $Slider->Image;
            $Slider->Status = $request->Status;
            $Slider->save();
            return RedirectController::Redirect('/panel/Slider/Edit/'.$Slider->id,'اسلایدر شما با موفقیت بروزرسانی شد.');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Slider/All', $exception->getMessage());

        }
    }

    public function Delete($id)
    {
        $Slider = Slider::find($id);
        if ($Slider->count() < 0 || $Slider == null || $Slider == "") {
            return RedirectController::Redirect('/panel/Slider/All', 'اسلایدر مورد نظر شما پیدا نشد');
        }

        try {
            $Slider->delete();
            return RedirectController::Redirect('/panel/Slider/All', 'اسلایدر مورد نظر شما با موفقیت حذف شد.');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Slider/All', $exception->getMessage());

        }
    }
}
