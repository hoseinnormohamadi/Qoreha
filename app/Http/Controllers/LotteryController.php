<?php

namespace App\Http\Controllers;

use App\LotteryCat;
use App\Traits\CustomAuth;
use App\UncheckedLottery;
use App\UncheckedPost;
use App\User;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    use CustomAuth;
    public function AllLottery(){

    }
    protected function Create(){
        $Cats = LotteryCat::all();
        return view('Panel.Lottery.CreateLottery',['Cats' => $Cats]);
    }

    public function GetLottery($id,Request $request){
        $Lottery = UncheckedLottery::find($id);
        return view('Panel.Lottery.ImportLottery',['Lottery' => $Lottery]);
    }

    public function UnChecked(){
        if ($this->IsAdmin()){
            if (\request('SearchTerm')){
                $Lotterys = UncheckedLottery::where('LotteryContent',\request('SearchTerm'));
            }else{
                $Lotterys = UncheckedLottery::all()->paginate(25);
            }

        }
        elseif ($this->IsManager()){
            if (\request('GetLottery') == true){
                if (UncheckedLottery::where('Worker',\Auth::id())->count() == 0){
                    UncheckedLottery::where('Worker' , 1)->limit(10)->update(['Worker' => \Auth::id()]);
                }
                $Lotterys = UncheckedLottery::where('Worker',\Auth::id())->get();
            }
            elseif (\request('SearchTerm')){
                $Lotterys = UncheckedLottery::where('Worker' , \Auth::id())->where('LotteryContent' ,'LIKE', '%'.request('SearchTerm').'%')->get();
            }else{
                $Lotterys = UncheckedLottery::where('Worker',\Auth::id())->get();
            }


        }
        elseif ($this->IsLotteryAdmin()){

        }
        //$Lotterys = UncheckedLottery::all();
        return view('Panel.Lottery.UnCheckedLottery',['Lotterys' => $Lotterys]);
    }
}
