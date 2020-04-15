<?php


namespace App\Traits;

trait AdminAuth
{
    //Check Authed user is admin or not
    public function IsAdmin(){
       if (\Auth::user()->hasRole('admin')){
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
