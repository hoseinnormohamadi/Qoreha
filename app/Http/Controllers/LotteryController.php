<?php

namespace App\Http\Controllers;

use App\Jobs\DadeKavy;
use App\Lottery;
use App\LotteryCat;
use App\SubCategory;
use App\Traits\CustomAuth;
use App\Traits\Uploader;
use App\UncheckedLottery;
use App\UncheckedPost;
use App\User;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    use Uploader;
    use CustomAuth;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!$this->IsAdminOrManager()) {
                return RedirectController::Redirect('/panel/', 'شما اجازه دسترسی به این بخش را ندارید!!!');
            }
            return $next($request);
        });
    }


    public function AllLottery()
    {
        if ($this->IsAdmin()) {
            if (\request('SearchTerm')) {
                $Lotterys = Lottery::where('LotteryTitle', 'LIKE', '%' . request('SearchTerm') . '%')->paginate(25);
            } elseif (request('Mode')) {
                $Lotterys = Lottery::where('LotteryStatus', request('Mode'))->paginate(25);
            } else {
                $Lotterys = Lottery::paginate(25);
            }
            $All = Lottery::all()->count();

        } elseif ($this->IsManager()) {
            if (\request('SearchTerm')) {
                $Lotterys = Lottery::where('LotteryTitle', 'LIKE', '%' . request('SearchTerm') . '%')->where('LotteryWorker', \Auth::id())->paginate(25);
            } elseif (request('Mode')) {
                $Lotterys = Lottery::where('LotteryStatus', request('Mode'))->where('LotteryWorker', \Auth::id())->paginate(25);
            } else {
                $Lotterys = Lottery::where('LotteryWorker', \Auth::id())->paginate(25);
            }
            $All = Lottery::where('LotteryWorker', \Auth::id())->count();

        }
        return view('Panel.Lottery.Lottery')
            ->with('Lotterys', $Lotterys)
            ->with('All', $All);


    }

    public function Add()
    {
        $Tags = LotteryCat::all();
        $SubCategory = SubCategory::all();
        return view('Panel.Lottery.CreateLottery', ['Tags' => $Tags , 'SubCategory' => $SubCategory]);
    }

    public function Create(Request $request)
    {
        $request->validate([
            'LotteryTitle' => 'required|string|max:50',
            'LotteryContent' => 'required|string',
            'LotteryFirstPrize' => 'string',
            'LotteryPrizes' => 'string',
            'LotteryType' => 'required|string',
            'LotteryDate' => 'required|date',
            'LotterySubTags' => 'required|integer',
        ]);
        try {
            $Lottery = Lottery::create([
                'LotteryTitle' => $request->LotteryTitle,
                'LotteryContent' => $request->LotteryContent,
                'LotteryFirstPrize' => $request->LotteryFirstPrize,
                'LotteryPrizes' => json_encode($request->LotteryPrizes),
                'LotteryType' => $request->LotteryType,
                'LotteryDate' => $request->LotteryDate,
                'LotteryImage' => $this->UploadPic($request, 'LotteryImage', 'Lottery', 'Lottery'),
                'LotteryWorker' => \Auth::id(),
                'LotteryMode' => 'public',
                'Category' => $request->LotteryTags,
                'SubCategory' => $request->LotterySubTags,
            ]);

            return RedirectController::Redirect('/panel/Lottery/Edit/' . $Lottery->id, 'قرعه کشی با موفقیت ایجاد شد');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Lottery/Create', $exception->getMessage());

        }
    }

    public function Edit($id)
    {
        $Lottery = Lottery::find($id);
        if ($Lottery == null || empty($Lottery)) {
            return RedirectController::Redirect('/panel/Lottery/AllLottery', 'قرعه کشی مورد نظر پیدا نشد');
        }
        if (!$this->IsAdmin()) {
            if (!$this->CheckPublisher($Lottery->LotteryWorker)) {
                return RedirectController::Redirect('/panel/Lottery/AllLottery', 'قرعه کشی مورد نظر پیدا نشد');
            }
        }
        $Tags = LotteryCat::all();
        $SubCategory = SubCategory::all();
        return view('Panel.Lottery.Edit')->with('Lottery', $Lottery)->with(['Tags' => $Tags , 'SubCategory' => $SubCategory]);
    }


    public function Update($id, Request $request)
    {
        $Lottery = Lottery::find($id);
        if ($Lottery == null || empty($Lottery)) {
            return RedirectController::Redirect('/panel/Lottery/AllLottery', 'قرعه کشی مورد نظر پیدا نشد');
        }
        if (!$this->IsAdmin()) {
            if (!$this->CheckPublisher($Lottery->LotteryWorker)) {
                return RedirectController::Redirect('/panel/Lottery/AllLottery', 'قرعه کشی مورد نظر پیدا نشد');
            }
        }
        $request->validate([
            'LotteryTitle' => 'required|string|max:50',
            'LotteryContent' => 'required|string',
            'LotteryFirstPrize' => 'string',
            'LotteryPrizes' => 'string',
            'LotteryType' => 'required|string',
            'LotteryDate' => 'required|date',

        ]);
        try {
            $Lottery->LotteryTitle = $request->LotteryTitle;
            $Lottery->LotteryContent = $request->LotteryContent;
            $Lottery->LotteryFirstPrize = $request->LotteryFirstPrize;
            $Lottery->LotteryPrizes = $request->LotteryPrizes;
            $Lottery->LotteryType = $request->LotteryType;
            $Lottery->LotteryDate = $request->LotteryDate;
            $Lottery->Category = $request->LotteryTags;
            $Lottery->SubCategory = $request->SubCategory;
            $Lottery->LotteryImage = $request->hasFile('LotteryImage') ? $this->UploadPic($request, 'LotteryImage', 'Lottery', 'Lottery') : $Lottery->LotteryImage ;
            $Lottery->save();
            return RedirectController::Redirect('/panel/Lottery/Edit/' . $Lottery->id, 'قرعه کشی با موفقیت ویرایش شد');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Lottery/Create', $exception->getMessage());
        }
    }

    public function GetLottery($id, Request $request)
    {
        $Lottery = UncheckedLottery::find($id);
        $Tags = LotteryCat::all();
        $SubCategory = SubCategory::all();

        return view('Panel.Lottery.ImportLottery', ['Lottery' => $Lottery, 'Tags' => $Tags , 'SubCategory' => $SubCategory]);
    }


    public function Import($id, Request $request)
    {
        $request->validate([
            'LotteryTitle' => 'required|string|max:50',
            'LotteryContent' => 'required|string',
            'LotteryFirstPrize' => 'string',
            'LotteryPrizes' => 'string',
            'LotteryType' => 'required|string',
            'LotteryDate' => 'required|date',
        ]);
        $UncheckedLottery = UncheckedLottery::find($id);
        if ($request->LotteryStatus == 'Published') {
            $Lottery = Lottery::create([
                'LotteryTitle' => $request->LotteryTitle,
                'LotteryContent' => $request->LotteryContent,
                'LotteryFirstPrize' => $request->LotteryFirstPrize,
                'LotteryPrizes' => json_encode($request->LotteryPrizes),
                'LotteryType' => $request->LotteryType,
                'LotteryDate' => $request->LotteryDate,
                'LotteryImage' => $request->hasFile('LotteryImage') ? $this->UploadPic($request, 'LotteryImage', 'Lottery', 'Lottery') : $UncheckedLottery->LotteryImage,
                'LotteryWorker' => \Auth::id(),
                'LotteryMode' => 'public',
                'Category' => $request->LotteryTags,
                'SubCategory' => $request->LotterySubTags,
            ]);
            $UncheckedLottery->LotteryStatus = $request->LotteryStatus;
            return RedirectController::Redirect('/panel/Lottery/UncheckedLottery', 'قرعه کشی با موفقیت ایجاد شد');
        } else {
            $UncheckedLottery->LotteryStatus = $request->LotteryStatus;
            return RedirectController::Redirect('/panel/Lottery/UncheckedLottery', 'قرعه کشی با موفقیت ویرایش شد');
        }
    }

    public function UnChecked()
    {
        if ($this->IsAdmin()) {
            if (\request('SearchTerm')) {
                $Lotterys = UncheckedLottery::where('LotteryContent', \request('SearchTerm'));
            } elseif (request('Mode')) {
                $Lotterys = UncheckedLottery::where('LotteryStatus', request('Mode'))->paginate(25);
            } else {
                $Lotterys = UncheckedLottery::paginate(25);
            }
            $All = UncheckedLottery::all()->count();
            $Published = UncheckedLottery::where('LotteryStatus', 'Published')->count();
            $Draft = UncheckedLottery::where('LotteryStatus', 'Draft')->count();
            $Waiting = UncheckedLottery::where('LotteryStatus', 'Waiting')->count();
            $Archive = UncheckedLottery::where('LotteryStatus', 'Archive')->count();

        }
        elseif ($this->IsManager()) {
            if (\request('GetLottery') == true) {
                if (UncheckedLottery::where('Worker', \Auth::id())->count() == 0) {
                    UncheckedLottery::where('Worker', 2)->limit(10)->update(['Worker' => \Auth::id()]);
                }
                $Lotterys = UncheckedLottery::where('Worker', \Auth::id())->paginate(25);
            } elseif (\request('SearchTerm')) {
                $Lotterys = UncheckedLottery::where('Worker', \Auth::id())->where('LotteryContent', 'LIKE', '%' . request('SearchTerm') . '%')->paginate(25);
                $All = $Lotterys->count();
            } else {
                $Lotterys = UncheckedLottery::where('Worker', \Auth::id())->paginate(25);
            }
            $All = UncheckedLottery::where('Worker', \Auth::id())->count();
            $Published = UncheckedLottery::where('Worker', \Auth::id())->where('LotteryStatus', 'Published')->count();
            $Draft = UncheckedLottery::where('Worker', \Auth::id())->where('LotteryStatus', 'Draft')->count();
            $Waiting = UncheckedLottery::where('Worker', \Auth::id())->where('LotteryStatus', 'Waiting')->count();
            $Archive = UncheckedLottery::where('Worker', \Auth::id())->where('LotteryStatus', 'Archive')->count();


        }

        return view('Panel.Lottery.UnCheckedLottery')
            ->with('Lotterys', $Lotterys)
            ->with('All', $All)
            ->with('Published', $Published)
            ->with('Draft', $Draft)
            ->with('Waiting', $Waiting)
            ->with('Archive', $Archive);
    }



    public function DadeKavi()
    {
        return view('Panel.Lottery.DadeKavi');
    }

    public function DadeKaviPost(Request $request)
    {
        $request->validate([
            'Text' => 'required|string',
            'Tedad' => 'required'
        ]);
        try {
            DadeKavy::dispatch($request->Text,$request->Tedad);
            return RedirectController::Redirect('/panel/Lottery/DadeKavi', 'داده کاوی شروع شد.');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Lottery/DadeKavi', $exception->getMessage());
        }
    }
}
