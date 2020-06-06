<?php

namespace App\Http\Controllers;

use App\Traits\Uploader;
use App\User;
use Illuminate\Http\Request;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use PHPUnit\Framework\ExpectationFailedException;

class UsersController extends Controller
{
    use Uploader;

    public function Profile()
    {
        return view('Panel.User.Profile');
    }

    public function UpdatePassword(Request $request){
        $request->validate([
            'OldPassword' => 'required|min:8|string',
            'password' => 'required|confirmed|min:8|string',
        ]);
        try {
            \Auth::user()->password = \Hash::make($request->password);
            \Auth::logout();
            return RedirectController::Redirect('/login','کلمه عبور با موفقیت بروزرسانی شد');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/User/Profile',$exception->getMessage());

        }
    }

    public function UpdatePic(Request $request){
        try {
            $Pic = $this->UploadPic($request,'ProfileImage','ProfileImages','Profile');
            $User = \Auth::user();
            $User->ProfileImage = $Pic;
            $User->save();
            return RedirectController::Redirect('/panel/User/Profile','پروفایل شما با موفقیت بروزرسانی شد');

        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/User/Profile',$exception->getMessage());

        }

    }

    public function UpdateUserInfo(Request $request){
        $request->validate([
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'FaceBook' => 'string',
            'Twitter' => 'string',
            'Bio' => 'string'
        ]);
        try {
            $User = \Auth::user();
            $User->FirstName = $request->FirstName;
            $User->LastName = $request->LastName;
            $User->FaceBook = $request->FaceBook;
            $User->Twitter = $request->Twitter;
            $User->Bio = $request->Bio;
            $User->save();
            return RedirectController::Redirect('/panel/User/Profile','پروفایل شما با موفقیت بروزرسانی شد');
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/panel/User/Profile',$exception->getMessage());

        }
    }

    public function verifyAccount()
    {
        return view('auth.verify');
    }

    public function VerifyAccountByPhone(Request $request)
    {
        $request->validate([
            'PhoneNumber' => 'required|string',
            'ActivationCode' => 'required|integer|min:0|max:99999'
        ]);
        try {
            $User = User::where('PhoneNumber',$request->PhoneNumber)->firstOrFail();
            if ($User->AccountStatus == 'Deactive'){
                if ($User->PhoneActivationCode == $request->ActivationCode){

                    $User->AccountStatus = 'Active';
                    $User->PhoneActivationCode = null;

                    $User->save();
                    return RedirectController::Redirect('/panel','حساب کاربری شما با موقیت فعال شد');
                }else{
                    return RedirectController::Redirect('/Account/ActivateAccount','کد وارد شده صحیح نمیباشد');
                }
            }else{
                return RedirectController::Redirect('/panel','حساب کاربری شما فعال بود!!!');
            }
        }
        catch (\Exception $exception){
            return RedirectController::Redirect('/Account/ActivateAccount',$exception->getMessage());

        }
    }

    public function SendActivationCode(Request $request)
    {
        $request->validate([
            'PhoneNumber' => 'required|string',
        ]);

        try {
            $User = User::where('PhoneNumber' , $request->PhoneNumber)->firstOrFail();
            $digits = 5;
            $Code = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $message = "کد فعال سازی حساب کاربری شما برابر است با : $Code";
            $result = SmsController::SendSms($User->PhoneNumber,$message);
            if ($result) {
                $User->PhoneActivationCode = $Code;
                $User->save();
            }
            return RedirectController::Redirect('/Account/ActivateAccount','کد فعال سازی با موقیت ارسال شد');
        } catch (ApiException $e) {
            return RedirectController::Redirect('/Account/ActivateAccount','لطفا دوباره تلاش کنید');
        } catch (HttpException $e) {
            return RedirectController::Redirect('/Account/ActivateAccount','لطفا دوباره تلاش کنید');
        }
    }

    public function Upgrade(){
        if (\Auth::user()->Rule == 'User' ||\Auth::user()->Rule == 'Supervisor' ){
            return view('Panel.User.UpgradeAccessLevel');
        }
        return RedirectController::Redirect('/','شما دسترسی به این بخش را ندارید');
    }
}
