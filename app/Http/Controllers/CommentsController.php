<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function Store(Request $request){
        $request->validate([
            'ParentID' => 'required|integer',
            'Text' => 'required|string',
            'Type' => 'required|string',
        ]);
        Comments::create([
            'ParentID' => $request->ParentID,
            'Text' => $request->Text,
            'Type' => $request->Type,
            'UserID' => \Auth::id()
        ]);
        return redirect()->back();
    }
}
