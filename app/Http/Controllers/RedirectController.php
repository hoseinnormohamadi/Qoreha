<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public static function Redirect($Path,$ErrorMessage = null){
        if ($ErrorMessage != null){
            return redirect()->to($Path)->withErrors(['msg' => $ErrorMessage]);
        }else{
            return  redirect()->to($Path);
        }
    }
}
