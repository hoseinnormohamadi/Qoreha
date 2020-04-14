<?php


namespace App\Traits;


use Illuminate\Http\Request;

trait Uploader
{
    public function UploadPic(Request $request , $name, $folder)
    {
        $request->validate([
            $name => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $orginalPath = '/Uploads/'.$folder.'/'.date('Y/m/d' . '/');
        $path = public_path('Uploads/'.$folder.'/'.date('Y/m/d'));
        $imageName = bin2hex(random_bytes(32)).'.jpg';
        if (!file_exists($path)){
            \File::makeDirectory($path,0777,true,true);
        }
        \request($name)->move($path, $imageName);

        return $orginalPath.$imageName;
    }
}
