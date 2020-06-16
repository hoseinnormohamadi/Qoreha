<?php

namespace App\Http\Controllers;

use App\AccessLevelManager;
use App\Traits\CustomAuth;
use App\Traits\Uploader;
use Illuminate\Http\Request;

class AccessLevelManagerController extends Controller
{
    use Uploader;
    use CustomAuth;
    public function UpgradeToSupervisor(Request $request)
    {
        if ($this->IsAdminOrManager() || $this->IsSupervisor() ){
            return RedirectController::Redirect('/panel/', 'سطح دسترسی شما بالاتر از درخواست شما میباشد');
        }
                $Accesslevelmanager = AccessLevelManager::where('Userid',\Auth::id())->where('Status' , 'Waiting')->get();
        if ($Accesslevelmanager->count() > 0){
            return RedirectController::Redirect('/panel/User/Upgrade', 'درخواست شما از قبل ثبت شده بود.لطفا تا تایید صبر کنید.');
        }

        $request->validate([
            'CodeMeli' => 'required|min:8|max:10',
            'Address' => 'required|min:10|string',
            'About' => 'required|string',
            'identityCartPic' => 'required|image',
        ]);
        try {
            if ($this->CheckCodeMeli($request->CodeMeli) == true) {
                AccessLevelManager::create([
                    'CodeMeli' => $request->CodeMeli,
                    'Address' => $request->Address,
                    'About' => $request->About != null ? $request->About : null,
                    'identityCartPic' => $this->UploadPic($request, 'identityCartPic', 'identityCart', 'identityCart'),
                    'Userid' => \Auth::id(),
                    'Type' => 'Supervisor'
                ]);
                return RedirectController::Redirect('/panel/User/Upgrade', 'درخواست شما با موفقیت ارسال شد.لطفا صبور باشید');
            }
            return RedirectController::Redirect('/panel/User/Upgrade', 'لطفا دوباره تلاش کنید.');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/User/Upgrade', $exception->getMessage());
        }
    }

    public function UpgradeToManager(Request $request)
    {
        if ($this->IsAdminOrManager()){
            return RedirectController::Redirect('/panel/', 'سطح دسترسی شما بالاتر از درخواست شما میباشد');
        }
                $Accesslevelmanager = AccessLevelManager::where('Userid',\Auth::id())->where('Status' , 'Waiting')->get();
        if ($Accesslevelmanager->count() > 0){
            return RedirectController::Redirect('/panel/User/Upgrade', 'درخواست شما از قبل ثبت شده بود.لطفا تا تایید صبر کنید.');
        }
        $request->validate([
            'CodeMeli' => 'required|min:8|max:10',
            'Address' => 'required|min:10|string',
            'About' => 'string',
            'identityCartPic' => 'required|image',
        ]);
        try {
            if ($this->CheckCodeMeli($request->CodeMeli) == true) {
                AccessLevelManager::create([
                    'CodeMeli' => $request->CodeMeli,
                    'Address' => $request->Address,
                    'About' => $request->About != null ? $request->About : null,
                    'identityCartPic' => $this->UploadPic($request, 'identityCartPic', 'identityCart', 'identityCart'),
                    'Userid' => \Auth::id(),
                    'Type' => 'Manager'
                ]);
                return RedirectController::Redirect('/panel/User/Upgrade', 'درخواست شما با موفقیت ارسال شد.لطفا صبور باشید');
            }
            return RedirectController::Redirect('/panel/User/Upgrade', 'لطفا دوباره تلاش کنید.');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/User/Upgrade', $exception->getMessage());
        }
    }
    public function UpgradeToLotteryOwner(Request $request)
    {
        $Accesslevelmanager = AccessLevelManager::where('Userid',\Auth::id())->where('Status','Waiting')->get();
        if ($Accesslevelmanager->count() > 0){
            return RedirectController::Redirect('/panel/User/Upgrade', 'درخواست شما از قبل ثبت شده بود.لطفا تا تایید صبر کنید.');
        }
        $request->validate([
            'CodeMeli' => 'required|min:8|max:10',
            'Address' => 'required|min:10|string',
            'About' => 'string',
            'identityCartPic' => 'required|image',
        ]);
        try {
            if ($this->CheckCodeMeli($request->CodeMeli) == true) {
                AccessLevelManager::create([
                    'CodeMeli' => $request->CodeMeli,
                    'Address' => $request->Address,
                    'About' => $request->About != null ? $request->About : null,
                    'identityCartPic' => $this->UploadPic($request, 'identityCartPic', 'identityCart', 'identityCart'),
                    'Userid' => \Auth::id(),
                    'Type' => 'LotteryOwner'
                ]);
                return RedirectController::Redirect('/panel/User/Upgrade', 'درخواست شما با موفقیت ارسال شد.لطفا صبور باشید');
            }
            return RedirectController::Redirect('/panel/User/Upgrade', 'لطفا دوباره تلاش کنید.');

        } catch (\Exception $exception) {
            return RedirectController::Redirect('/panel/User/Upgrade', $exception->getMessage());
        }
    }

    public function CheckCodeMeli($CodeMeli)
    {
        if (!preg_match('/^[0-9]{10}$/', $CodeMeli))
            return false;
        for ($i = 0; $i < 10; $i++)
            if (preg_match('/^' . $i . '{10}$/', $CodeMeli))
                return false;
        for ($i = 0, $sum = 0; $i < 9; $i++)
            $sum += ((10 - $i) * intval(substr($CodeMeli, $i, 1)));
        $ret = $sum % 11;
        $parity = intval(substr($CodeMeli, 9, 1));
        if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity))
            return true;
        return false;
    }

}
