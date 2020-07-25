<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function All()
    {
        if (\request('SearchTerm')) {
            $Contact = ContactUs::where('Text','LIKE', '%' . request('SearchTerm') . '%')->paginate(25);
        }else {
            $Contact = ContactUs::paginate(25);
        }
        $All = ContactUs::all()->count();
        return view('Panel.Contact.All')->with([
            'Contacts'=> $Contact,
            'All'=> $All,
        ]);




    }

    public function Add()
    {
        return view('Panel.Contact.Create');
    }

    public function Create(Request $request)
    {
        $request->validate([
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Email' => 'string',
            'PhoneNumber' => 'string|min:11|max:11',
            'Text' => 'required|string',
        ]);
        try {
            $Contact = ContactUs::create([
                'FirstName' => $request->FirstName,
                'LastName' => $request->LastName,
                'Email' => $request->Email != null ? $request->Email : null,
                'PhoneNumber' => $request->PhoneNumber != null ? $request->PhoneNumber : null,
                'Text' => $request->Text,
            ]);
            return RedirectController::Redirect('/panel/Contact/Edit/'.$Contact->id,'پیام شما با موفقیت افزوده شد.');
        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Contact/All', $exception->getMessage());
        }
    }

    public function Edit($id)
    {
        $Contact = ContactUs::find($id);
        if ($Contact->count() < 0 || $Contact == null || $Contact == "") {
            return RedirectController::Redirect('/panel/Contact/All', 'پیام مورد نظر شما پیدا نشد');
        }
        return view('Panel.Contact.Edit')->with('Contact', $Contact);
    }

    public function Update($id, Request $request)
    {
        $Contact = ContactUs::find($id);
        if ($Contact->count() < 0 || $Contact == null || $Contact == "") {
            return RedirectController::Redirect('/panel/Contact/All', 'پیام مورد نظر شما پیدا نشد');
        }

        $request->validate([
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Email' => 'string',
            'PhoneNumber' => 'string|min:11|max:11',
            'Text' => 'required|string',
        ]);
        try {
            $Contact->FirstName = $request->FirstName;
            $Contact->LastName = $request->LastName;
            $Contact->Email = $request->Email != null ? $request->Email : $Contact->Email;
            $Contact->PhoneNumber = $request->PhoneNumber != null ? $request->PhoneNumber : $Contact->PhoneNumber;
            $Contact->Text = $request->Text;
            $Contact->save();
            return RedirectController::Redirect('/panel/Contact/Edit/'.$Contact->id,'پیام شما با موفقیت بروزرسانی شد.');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Contact/All', $exception->getMessage());

        }
    }

    public function Delete($id)
    {
        $Contact = ContactUs::find($id);
        if ($Contact->count() < 0 || $Contact == null || $Contact == "") {
            return RedirectController::Redirect('/panel/Contact/All', 'پیام مورد نظر شما پیدا نشد');
        }

        try {
            $Contact->delete();
            return RedirectController::Redirect('/panel/Contact/All', 'پیام مورد نظر شما با موفقیت حذف شد.');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Contact/All', $exception->getMessage());

        }
    }

}
