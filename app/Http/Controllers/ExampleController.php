<?php


namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;

class ExampleController
{

    public function All(){

    }
    public function Add(){
        return view();
    }
    public function Create(Request $request){
        $request->validate([

        ]);
        try {

        }
        catch (\Exception $exception){

        }
    }

    public function Edit($id){


        return view()->with();
    }
    public function Update($id , Request $request){


        $request->validate([

        ]);
        try {

        }

        catch (\Exception $exception){

        }
    }
    public function Delete($id){


        try {

        }

        catch (\Exception $exception){

        }
    }

}
