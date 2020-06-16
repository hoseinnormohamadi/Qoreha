<?php

namespace App\Http\Controllers;

use App\HomeLotterry;
use App\Traits\CustomAuth;
use App\Traits\Uploader;
use Illuminate\Http\Request;

class HomeLotterryController extends Controller
{
    use CustomAuth;
    use Uploader;
    public function All(){
        if ($this->IsAdmin()) {
            if (\request('SearchTerm')) {
                $Wwal = HomeLotterry::where('Name','LIKE', '%' . request('SearchTerm') . '%')->paginate(25);
            }else {
                $Wwal = HomeLotterry::paginate(25);
            }
            $All = HomeLotterry::all()->count();
        }else{
            if (\request('SearchTerm')) {
                $Wwal = HomeLotterry::where('Name','LIKE', '%' . request('SearchTerm') . '%')->where('Owner' , \Auth::id())->paginate(25);
            }else {
                $Wwal = HomeLotterry::where('Owner' , \Auth::id())->paginate(25);
            }
            $All = HomeLotterry::where('Owner' , \Auth::id())->count();
        }
        return view('Panel.HomeLottery.All')
            ->with('HomeLotterys', $Wwal)
            ->with('All', $All);
    }
    public function Add(){
        return view('Panel.HomeLottery.Create');
    }
    public function Create(Request $request){
        $request->validate([
            'Name' => 'required|string',
            'Description' => 'required|string',
            'Image' => 'required|image',
            'Members' => 'required|string',
            'Amount' => 'required|integer',
            'Payment' => 'required|string',
            'StartDate' => 'required|string',
            'Type' => 'required|string',
        ]);
        try {
            $HomeLottery = HomeLotterry::create([
                'Name' => $request->Name,
                'Description' => $request->Description,
                'Image' => $this->UploadPic($request,'Image','HomeLottery'),
                'Members' => $request->Members,
                'Amount' => $request->Amount,
                'Payment' => $request->Payment,
                'StartDate' => $request->StartDate,
                'Type' => $request->Type,
                'Owner' => \Auth::id()
            ]);
            return RedirectController::Redirect('/panel/HomeLottery/Edit/'.$HomeLottery->id,'قرعه کشی خانگی با موفقیت ایجاد شد');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/HomeLottery/Add/',$exception->getMessage());

        }
    }

    public function Edit($id){
        $HomeLottery = HomeLotterry::find($id);
        if ($HomeLottery == '' || empty($HomeLottery) || $HomeLottery->count() == 0){
            return RedirectController::Redirect('/panel/HomeLottery/All/','قرعه کشی مورد نظر شما یافت نشد');
        }
        if (!$this->CheckPublisher($HomeLottery->Owner)){
            return RedirectController::Redirect('/panel/HomeLottery/All/','شما اجازه دسترسی به این بخش را ندارید');
        }

        return view('Panel.HomeLottery.Edit')->with('HomeLottery' , $HomeLottery);
    }
    public function Update($id , Request $request){
        $HomeLottery = HomeLotterry::find($id);
        if ($HomeLottery == '' || empty($HomeLottery) || $HomeLottery->count() == 0){
            return RedirectController::Redirect('/panel/HomeLottery/All/','قرعه کشی مورد نظر شما یافت نشد');
        }
        if (!$this->CheckPublisher($HomeLottery->Owner)){
            return RedirectController::Redirect('/panel/HomeLottery/All/','شما اجازه دسترسی به این بخش را ندارید');
        }

        $request->validate([
            'Name' => 'required|string',
            'Description' => 'required|string',
            'Image' => 'image',
            'Members' => 'required|string',
            'Wins' => 'string',
            'Amount' => 'required|integer',
            'Payment' => 'required|string',
            'StartDate' => 'required|string',
            'Type' => 'required|string',
        ]);
        try {
            $HomeLottery->Name = $request->Name;
            $HomeLottery->Description = $request->Description;
            $HomeLottery->Image = $request->hasFile('Image') ? $this->UploadPic($request,'Image','HomeLottery') : $HomeLottery->Image;
            $HomeLottery->Members = $request->Members;
            $HomeLottery->Wins = $request->Wins;
            $HomeLottery->Amount = $request->Amount;
            $HomeLottery->Payment = $request->Payment;
            $HomeLottery->StartDate = $request->StartDate;
            $HomeLottery->Type = $request->Type;
            $HomeLottery->save();
            return RedirectController::Redirect('/panel/HomeLottery/Edit/'.$HomeLottery->id,'قرعه کشی خانگی با موفقیت بروزرسانی شد');
        }

        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/HomeLottery/All/',$exception->getMessage());
        }
    }
    public function Delete($id){

        $HomeLottery = HomeLotterry::find($id);
        if ($HomeLottery == '' || empty($HomeLottery) || $HomeLottery->count() == 0){
            return RedirectController::Redirect('/panel/HomeLottery/All/','قرعه کشی مورد نظر شما یافت نشد');
        }
        if (!$this->CheckPublisher($HomeLottery->Owner)){
            return RedirectController::Redirect('/panel/HomeLottery/All/','شما اجازه دسترسی به این بخش را ندارید');
        }
        try {
            $HomeLottery->delete();
            return RedirectController::Redirect('/panel/HomeLottery/All/','قرعه کشی مورد نظر شما با موفقیت حذف شد');
        }

        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/HomeLottery/All/',$exception->getMessage());
        }
    }
}
