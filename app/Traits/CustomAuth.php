<?php


namespace App\Traits;

trait CustomAuth
{
    //Check Authed user is admin or not
    public function IsAdmin(){
        if (\Auth::user()->Rule == 'Admin'){
            return true;
        }else{
            return false;
        }
    }

    //Check Authed user is manager or not
    public function IsManager(){
        if (\Auth::user()->Rule == 'Manager'){
            return true;
        }else{
            return false;
        }
    }

    //Check Authed user is lotteryadmin or not
    public function IsLotteryOwner(){
        if (\Auth::user()->Rule == 'LotteryOwner'){
            return true;
        }else{
            return false;
        }
    }
    //Check Authed user is user or not
    public function IsSupervisor(){
        if (\Auth::user()->Rule == 'Supervisor'){
            return true;
        }else{
            return false;
        }
    }
    public function IsRobot(){
        if (\Auth::user()->Rule == 'Robot'){
            return true;
        }else{
            return false;
        }
    }
    /*Check Authed user is publisher or not
    Param{
    PublishID
    }*/
    public function CheckPublisher($Pubid){
        if ($Pubid == \Auth::id()){
            return true;
        }else{
            return  false;
        }
    }

}
