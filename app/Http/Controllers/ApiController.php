<?php


namespace App\Http\Controllers;

use App\Jobs\StorePostFromApi;
use App\Traits\Uploader;
use App\UncheckedLottery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiController extends Controller
{
    use Uploader;

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }


    public function StorePostWithQueue(Request $request)
    {
        $request->validate([
            'Content' => 'required|string',
            'Image' => 'required|string',
        ]);
        $Post = UncheckedLottery::where('LotteryImageLink', $request->Image)->get()[0];
        if ($Post != null && !empty($Post)) {
            return response()->json('Post Exist', 200);
        }
        $FileName = $this->ValidateImage($request->Image);
        if ($FileName === null) {
            return response()->json('Image Not Valid', 200);
        }
        $Image = $this->GetImage($request->Image, $FileName, 'Downloads/');
        if ($Image === null) {
            return response()->json('Problem to save Image', 200);
        }
        StorePostFromApi::dispatch($Image, $request->Image, $request->Content);
        return response()->json('Created', 200);
    }

    public function StorePost(Request $request)
    {
        $request->validate([
            'Content' => 'required|string',
            'Image' => 'required|string',
        ]);

        $Post = UncheckedLottery::where('LotteryImageLink', $request->Image)->get()[0];
        if ($Post != null && !empty($Post)) {
            return response()->json('Lottery Exist', 200);
        }
        $FileName = $this->ValidateImage($request->Image);
        if ($FileName === null) {
            return response()->json('Image Not Valid', 200);
        }
        $Image = $this->GetImage($request->Image, $FileName, 'Downloads/');
        if ($Image === null) {
            return response()->json('Problem to save Image', 200);
        }
        UncheckedLottery::create([
            'LotteryContent' => $request->Content,
            'LotteryImage' => $Image,
            'LotteryImageLink' => $request->Image,
            'Worker' => 1
        ]);
        return response()->json('Created', 200);
    }


    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }

    private function GetImage($Link, $Name, $Folder)
    {

        $client = new \GuzzleHttp\Client();
        $res = $client->head($Link);
        if ($res->getHeader('content-type')[0] == 'image/jpeg') {
            $myFile = fopen($Folder . $Name, 'w');
            $client->request('GET', $Link, ['save_to' => $myFile]);
            if (is_file($Folder . $Name)) {
                return $Folder . $Name;
            }
            return null;
        }
        return null;
    }

    private function ValidateImage($Link)
    {
        $name = preg_match_all('/\/[0-9].*\.jpg/', $Link, $Names);
        if ($name == 0) {
            return null;
        }
        $name = preg_replace('/\//', '', $Names[0][0]);
        $FinalName = explode('.', $name);

        if ($FinalName[1] == 'jpg' || $FinalName[1] == 'png' || $FinalName[1] == 'jpeg') {
            return $FinalName[0] . '.' . $FinalName[1];
        }
        return null;
    }
}
