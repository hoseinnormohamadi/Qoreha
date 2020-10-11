<?php

namespace App\Http\Controllers;

use App\LotteryCat;
use App\SubCategory;
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
        $Tags = LotteryCat::all();
        $SubCategory = SubCategory::all();
        return view('Panel.Wwal.Create')->with(['Tags' => $Tags , 'SubCategory' => $SubCategory]);
    }

    public function Create(Request $request){
        $request->validate([
            'Name' => 'required|string',
            'Content' => 'required|string',
            'Image' => 'required|image',
            'ExpireDate' => 'required|date',
            'Category' => 'required|integer',
            'SubCategory' => 'required|integer'
        ]);
        try {
            $Wwal = wwal::create([
                'Name' => $request->Name,
                'Content' => $request->Content,
                'Image' => $this->UploadPic($request,'Image','WinWithoutALottery'),
                'ExpireDate' => $request->ExpireDate,
                'Worker' => \Auth::id(),
                'Category' => $request->LotteryTags,
                'SubCategory' => $request->LotterySubTags,
            ]);
            return RedirectController::Redirect('/panel/WinWithOutLottery/Edit/'.$Wwal->id,'قرعه کشی با موفقیت ایجاد شد.');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/WinWithOutLottery/All',$exception->getMessage());
        }
    }

    public function Edit($id){
        $Wwal = wwal::find($id);
        $Tags = LotteryCat::all();
        $SubCategory = SubCategory::all();
        if ($Wwal == '' || empty($Wwal)){
            return  RedirectController::Redirect('/panel/WinWithOutLottery/All','قرعه کشی مورد نظر شما یافت نشد.مجدداً تلاش کنید');
        }
        return view('Panel.Wwal.Edit')->with(['Wwal' => $Wwal ,'Tags' => $Tags , 'SubCategory' => $SubCategory]);
    }

    public function Update($id , Request $request){
        $Wwal = wwal::find($id);
        $request->validate([
            'Name' => 'required|string',
            'Content' => 'required|string',
            'Image' => 'required|image',
            'ExpireDate' => 'required|date',
            'Category' => 'required|integer',
            'SubCategory' => 'required|integer'
        ]);

        $Wwal->Name = $request->Name;
        $Wwal->Content = $request->Content;
        $Wwal->Image = $this->UploadPic($request,'Image','WinWithoutALottery');
        $Wwal->ExpireDate = $request->ExpireDate;
        $Wwal->Category = $request->Category;
        $Wwal->SubCategory = $request->SubCategory;
        $Wwal->save();
        return redirect()->back();
    }

    public function Delete($id){
        $Wwal = wwal::find($id);
        $Wwal->delete();
        return redirect()->back();
    }
}
