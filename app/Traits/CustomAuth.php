<?php


namespace App\Traits;

trait CustomAuth
{
    //Check Authed user is admin or not
    public function IsAdmin(){
       if (\Auth::user()->hasRole('admin')){
           return true;
       }else{
           return  false;
       }
    }

    //Check Authed user is manager or not
    public function IsManager(){
        if (\Auth::user()->hasRole('manager')){
            return true;
        }else{
            return  false;
        }
    }

    //Check Authed user is lotteryadmin or not
    public function IsLotteryAdmin(){
        if (\Auth::user()->hasRole('lotteryadmin')){
            return true;
        }else{
            return  false;
        }
    }
    //Check Authed user is user or not
    public function IsUser(){
        if (\Auth::user()->hasRole('user')){
            return true;
        }else{
            return  false;
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
