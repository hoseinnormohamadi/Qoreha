<?php


namespace App\Traits;


use Illuminate\Http\Request;

trait Uploader
{
    public function UploadPic(Request $request, $name, $folder, $mode = 'Post')
    {
        $request->validate([
            $name => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        if ($mode == 'Profile') {
            $orginalPath = 'Uploads/' . $folder . '/' . \Auth::user()->Username . '/';
            $path = '../../public_html/'.$orginalPath;
            if (is_file(public_path(\Auth::user()->ProfileImage))){
                unlink(public_path(\Auth::user()->ProfileImage));
            }
        } elseif ($mode == 'identityCart') {
            $orginalPath = 'Uploads/' . $folder . '/' . \Auth::user()->Username . '/CartMeli/';
            $path = '../../public_html/'.$orginalPath;
        }elseif ($mode == 'Lottery') {
            $orginalPath = 'Uploads/' . $folder . '/' . date('Y/m/d' . '/');
            $path = '../../public_html/'.$orginalPath;
        }
        elseif($mode == 'Post') {
            $orginalPath = 'Uploads/' . $folder . '/' . date('Y/m/d' . '/');
            $path = '../../public_html/'.$orginalPath;
        }
        $imageName = bin2hex(random_bytes(32)) . '.jpg';
        if (!file_exists($path)) {
            \File::makeDirectory($path, 0777, true, true);
        }
        \request($name)->move($orginalPath, $imageName);

        return '/'.$orginalPath . $imageName;
    }













    public function SiteIcon(Request $request){
        $request->validate([
            'SiteIcon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $orginalPath = '../../public_html/assets/img/';
        $path = public_path($orginalPath);
        $imageName = 'favicon.ico';
        \request('SiteIcon')->move($path, $imageName);
        return true;
    }
}
