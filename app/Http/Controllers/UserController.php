<?php

namespace App\Http\Controllers;

use App\AccessLevelManager;
use App\Traits\CustomAuth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    use CustomAuth;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!$this->IsAdmin()) {
                return RedirectController::Redirect('/panel/', 'شما اجازه دسترسی به این بخش را ندارید!!!');
            }
            return $next($request);
        });
    }

    public function Create()
    {
        return view('Panel.Users.CreateUser');
    }

    public function All()
    {

        if (request('SearchTerm')) {
            $Users = User::where('Username', 'LIKE', '%' . request('SearchTerm') . '%')->paginate(25);
        } elseif (request('Mode')) {
            $Users = User::where('Rule', request('Mode'))->paginate(25);
        } else {
            $Users = User::paginate(25);
        }
        $All = User::all()->count();
        $Admin = User::where('Rule', 'Admin')->count();
        $Manager = User::where('Rule', 'Manager')->count();
        $LotteryOwner = User::where('Rule', 'LotteryOwner')->count();
        $Supervisor = User::where('Rule', 'Supervisor')->count();
        $NormalUser = User::where('Rule', 'User')->count();
        return view('Panel.Users.AllUsers', ['Users' => $Users])
            ->with('All', $All)
            ->with('Admin', $Admin)
            ->with('Manager', $Manager)
            ->with('LotteryOwner', $LotteryOwner)
            ->with('Supervisor', $Supervisor)
            ->with('NormalUser', $NormalUser);

    }

    public function Add(Request $request)
    {
        $request->validate([
            'Username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'PhoneNumber' => ['required', 'string', 'max:09999999999', 'unique:users'],
            'LastName' => ['required', 'string', 'max:255'],
            'FirstName' => ['required', 'string', 'max:255'],
            'Rule' => ['required', 'string'],
        ]);
        try {
            $User = User::create([
                'Username' => $request->Username,
                'email' => $request->email,
                'password' => \Hash::make($request->password),
                'Rule' => $request->Rule,
                'FirstName' => $request->FirstName,
                'LastName' => $request->LastName,
                'PhoneNumber' => $request->PhoneNumber,
                'ProfileImage' => User::NoPic(),
            ]);
            return RedirectController::Redirect('/panel/Users/Edit/' . $User->id, 'کاربر با موفقیت افزوده شد');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Users/Add', $exception->getMessage());
        }

    }

    public function Edit($id)
    {
        $User = User::find($id);
        if (empty($User) || $User == null) {
            return RedirectController::Redirect('/panel/Users/All', 'کاربر مورد نظر یافت نشد لطفا دوباره تلاش کنید');
        }
        return view('Panel.Users.EditUser', ['User' => $User]);
    }

    public function Update($id, Request $request)
    {
        $User = User::find($id);
        if ($request->password) {
            $request->validate([
                'Username' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['string', 'min:8', 'confirmed'],
                'PhoneNumber' => ['required', 'string', 'max:09999999999'],
                'LastName' => ['required', 'string', 'max:255'],
                'FirstName' => ['required', 'string', 'max:255'],
                'Rule' => ['required', 'string'],
                'Bio' => ['required', 'string'],
            ]);
        }
        $request->validate([
            'Username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'PhoneNumber' => ['required', 'string', 'max:09999999999'],
            'LastName' => ['required', 'string', 'max:255'],
            'FirstName' => ['required', 'string', 'max:255'],
            'Rule' => ['required', 'string'],
            'Bio' => ['required', 'string'],
        ]);
        try {
            $User->Username = $request->Username;
            $User->email = $request->email;
            $request->password != '' ? $User->password = \Hash::make($request->password) : null;
            $User->PhoneNumber = $request->PhoneNumber;
            $User->LastName = $request->LastName;
            $User->FirstName = $request->FirstName;
            $User->Bio = $request->Bio;
            $User->Rule = $request->Rule;
            $request->AccountStatus ? $User->AccountStatus = 'Active' : $User->AccountStatus = 'Deactive';
            $request->FaceBook ? $User->FaceBook = $request->FaceBook : null;
            $request->Twitter ? $User->Twitter = $request->Twitter : null;
            $User->save();

            return RedirectController::Redirect('/panel/Users/Edit/' . $User->id, 'کاربر با موفقیت بروزرسانی شد');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Users/All', $exception->getMessage());
        }
    }

    public function ManageRequest()
    {
        if (request('SearchTerm')) {
            $Users = AccessLevelManager::where('CodeMeli', 'LIKE', '%' . request('SearchTerm') . '%')->where('Status', 'Waiting')->paginate(25);
        } elseif (request('Mode')) {
            $Users = AccessLevelManager::where('Type', request('Mode'))->where('Status', 'Waiting')->paginate(25);
        } else {
            $Users = AccessLevelManager::where('Status', 'Waiting')->paginate(25);
        }
        $All = AccessLevelManager::where('Status', 'Waiting')->count();
        $Manager = AccessLevelManager::where('Type', 'Manager')->where('Status', 'Waiting')->count();
        $LotteryOwner = AccessLevelManager::where('Type', 'LotteryOwner')->where('Status', 'Waiting')->count();
        $Supervisor = AccessLevelManager::where('Type', 'Supervisor')->where('Status', 'Waiting')->count();
        return view('Panel.Users.ManageRequests', ['Users' => $Users])
            ->with('All', $All)
            ->with('Manager', $Manager)
            ->with('LotteryOwner', $LotteryOwner)
            ->with('Supervisor', $Supervisor);
    }

    public function DeleteUser($id)
    {
        $User = User::find($id);
        if ($User == null || empty($User)) {
            return RedirectController::Redirect('/panel/Users/All', 'درخواست مورد نظر یافت نشد.');
        }
        try {
            $User->delete();
            return RedirectController::Redirect('/panel/Users/All', 'درخواست مورد نظر با موفقیت حذف شد');
        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Users/All', $exception->getMessage());
        }


    }

    public function ShowRequest($id)
    {
        $Request = AccessLevelManager::find($id);
        if ($Request == null || empty($Request)) {
            return RedirectController::Redirect('/panel/Users/ManageRequest', 'درخواست مورد نظر یافت نشد.');
        }
        try {
            return view('Panel.Users.ShowRequest', ['Request' => $Request]);
        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Users/ManageRequest', $exception->getMessage());
        }

    }

    public function DeleteRequest($id)
    {
        $Request = AccessLevelManager::find($id);
        if ($Request == null || empty($Request)) {
            return RedirectController::Redirect('/panel/Users/ManageRequest', 'درخواست مورد نظر یافت نشد.');
        }
        try {
            $Request->Status = 'Rejected';
            $Request->save();
            return RedirectController::Redirect('/panel/Users/ManageRequest', 'درخواست مورد نظر با موفقیت حذف شد');
        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/Users/ManageRequest', $exception->getMessage());
        }
    }

    public function ProcessRequest($id, Request $request)
    {
        $Request = AccessLevelManager::find($id);
        if ($Request == null || empty($Request)) {
            return RedirectController::Redirect('/panel/Users/ManageRequest', 'درخواست شما پیدا نشد.');
        }
        if ($request->RequestAnswer == 'Agree') {
            try {
                $User = $Request->User;
                $User->Rule = $Request->Type;
                $User->save;
                $Request->Status = 'Accepted';
                $User->save();
                $Request->save();
                return RedirectController::Redirect('/panel/Users/ManageRequest', 'ارتقاء سطح دسترسی انجام شد');
            } catch (\Exception $exception) {
                return RedirectController::Redirect('/panel/Users/ManageRequest', $exception->getMessage());
            }
        } elseif ($request->RequestAnswer == 'DisAgree') {
            try {
                $Request->Status = 'Rejected';
                $Request->save();
                return RedirectController::Redirect('/panel/Users/ManageRequest', 'درخواست مورد نظر رد شد.');

            } catch (\Exception $exception) {
                return RedirectController::Redirect('/panel/Users/ManageRequest', $exception->getMessage());
            }
        }
    }


    public function ShowOne($id)
    {
        $User = User::find($id);
        if ($User == null || empty($User)){
            return RedirectController::Redirect('/panel/Users/ManageRequest', 'درخواست شما پیدا نشد.');
        }
        try {
            return view('Panel.Users.UserProfile',['User' => $User]);
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/Users/All', $exception->getMessage());
        }
    }
}
