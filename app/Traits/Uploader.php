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
            $orginalPath = '../public_html/Uploads/' . $folder . '/' . \Auth::user()->Username . '/';
            $path = public_path('Uploads/' . $folder . '/' . \Auth::user()->Username . '/');
            if (is_file(public_path(\Auth::user()->ProfileImage))){
                unlink(public_path(\Auth::user()->ProfileImage));
            }
        } elseif ($mode == 'identityCart') {
            $orginalPath = '../public_html/Uploads/' . $folder . '/' . \Auth::user()->Username . '/CartMeli/';
            $path = public_path('Uploads/' . $folder . '/' . \Auth::user()->Username . '/CartMeli/');
        }elseif ($mode == 'Lottery') {
            $orginalPath = '../public_html/Uploads/' . $folder . '/' . date('Y/m/d' . '/');
            $path = public_path($orginalPath);
        }
        elseif($mode == 'Post') {
            $orginalPath = '../public_html/Uploads/' . $folder . '/' . date('Y/m/d' . '/');
            $path = public_path($orginalPath);
        }
        $imageName = bin2hex(random_bytes(32)) . '.jpg';
        if (!file_exists($path)) {
            \File::makeDirectory($path, 0777, true, true);
        }
        \request($name)->move($path, $imageName);

        return $orginalPath . $imageName;
    }
    public function SiteIcon(Request $request){
        $request->validate([
            'SiteIcon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $orginalPath = '../public_html/assets/img/';
        $path = public_path($orginalPath);
        $imageName = 'favicon.ico';
        \request('SiteIcon')->move($path, $imageName);
        return true;
    }
}
