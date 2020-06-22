<?php

namespace App\Http\Controllers;

use App\Traits\CustomAuth;
use App\Traits\Uploader;
use App\wwal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WwalController extends Controller
{
    use CustomAuth;
    use Uploader;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!$this->IsAdminOrManager()) {
                return RedirectController::Redirect('/panel/', 'شما اجازه دسترسی به این بخش را ندارید!!!');
            }
            return $next($request);
        });
    }


    public function All(){
        if ($this->IsAdmin()) {
            if (\request('SearchTerm')) {
                $Wwal = wwal::where('Name','LIKE', '%' . request('SearchTerm') . '%')->paginate(25);
            } elseif (request('Mode') == 'Active') {
                $Wwal = wwal::where('ExpireDate' , '>' ,Carbon::now()->format('Y-m-d'))->paginate(25);
            }elseif (request('Mode') == 'DeActive') {
                $Wwal = wwal::where('ExpireDate' , '<' ,Carbon::now()->format('Y-m-d'))->paginate(25);
            } else {
                $Wwal = wwal::paginate(25);
            }
            $All = wwal::all()->count();
            $Active = wwal::where('ExpireDate' , '>' ,Carbon::now()->format('Y-m-d'))->count();
            $DeActive = wwal::where('ExpireDate' , '<' ,Carbon::now()->format('Y-m-d'))->count();

        }elseif ($this->IsManager()){
            if (\request('SearchTerm')) {
                $Wwal = wwal::where('Name','LIKE', '%' . request('SearchTerm') . '%')->where('Worker',\Auth::id())->paginate(25);
            } elseif (request('Mode') == 'Active') {
                $Wwal = wwal::where('ExpireDate' , '>' ,Carbon::now()->format('Y-m-d'))->where('Worker',\Auth::id())->paginate(25);
            }elseif (request('Mode') == 'DeActive') {
                $Wwal = wwal::where('ExpireDate' , '<' ,Carbon::now()->format('Y-m-d'))->where('Worker',\Auth::id())->paginate(25);
            } else {
                $Wwal = wwal::paginate(25);
            }
            $All = wwal::where('Worker',\Auth::id())->count();
            $Active = wwal::where('ExpireDate' , '>' ,Carbon::now()->format('Y-m-d'))->where('Worker',\Auth::id())->count();
            $DeActive = wwal::where('ExpireDate' , '<' ,Carbon::now()->format('Y-m-d'))->where('Worker',\Auth::id())->count();

        }
        return view('Panel.Wwal.All')
            ->with('Wwals', $Wwal)
            ->with('All', $All)
            ->with('Active' , $Active)
            ->with('DeActive' , $DeActive);
    }

    public function Add(){
        return view('Panel.Wwal.Create');
    }

    public function Create(Request $request){
        $request->validate([
            'Name' => 'required|string',
            'Content' => 'required|string',
            'Image' => 'required|image',
            'ExpireDate' => 'required|date',
        ]);
        try {
            $Wwal = wwal::create([
                'Name' => $request->Name,
                'Content' => $request->Content,
                'Image' => $this->UploadPic($request,'Image','WinWithoutALottery'),
                'ExpireDate' => $request->ExpireDate,
                'Worker' => \Auth::id()
            ]);
            return RedirectController::Redirect('/panel/WinWithOutLottery/Edit/'.$Wwal->id,'قرعه کشی با موفقیت ایجاد شد.');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/WinWithOutLottery/All',$exception->getMessage());
        }
    }

    public function Edit($id){
        $Wwal = wwal::find($id);
        if ($Wwal == '' || empty($Wwal)){
            return  RedirectController::Redirect('/panel/WinWithOutLottery/All','قرعه کشی مورد نظر شما یافت نشد.مجدداً تلاش کنید');
        }
        return view('Panel.Wwal.Edit')->with(['Wwal' => $Wwal]);
    }

    public function Update($id , Request $request){

    }

    public function Delete($id){

    }
}
