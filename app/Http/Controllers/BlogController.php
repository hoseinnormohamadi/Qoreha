<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Post_tag;
use App\Tags;
use App\Traits\Uploader;
use Barryvdh\Reflection\DocBlock\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    use Uploader;
    //return CreatePost View
    public function CreatePost(){
        return view('Panel.Blog.CreatePost',[
            'tags' => Tags::all()
        ]);
    }

    /* Store Post
    Param{
    PostName,
    PostContent,
    PostImage,
    PostPublisher,
    PostStatus,
    PostTag
     }*/
    public function StorePost(Request $request){
        $request->validate([
            'PostName' => 'required|string|max:150',
            'PostContent' => 'required|string',
            'PostImage' => 'required|image',
            'PostStatus' => 'required|string'
        ]);
        $Post = Blog::create([
            'PostName' => $request->PostName,
            'PostContent' => $request->PostContent,
            'PostImage' => $this->UploadPic($request,'PostImage','PostImage'),
            'PostStatus' => $request->PostStatus,
            'PostPublisher' => \Auth::id()
        ]);
            $Post->tag()->attach($request->PostTags);

        return redirect()->to('/panel/Blog/EditPost/'.$Post->id)->withErrors(['msg'=>'پست شما با موققیت ارسال شد']);
    }

    //return view ShowPosts
    public function ShowPosts(){
        $user=Auth::user();
        if($user->hasRole('admin')){
            if (request('tag')) {
                $Posts = Blog::whereHas('tag', function (Builder $query) {
                    $query->where('name', request('tag'));
                })->paginate(25);
            }elseif (request('SearchTerm')){
                $Posts = Blog::where('PostName','LIKE','%'.request('SearchTerm').'%')->paginate(25);
            }elseif (request('Mode')){
                $Posts = Blog::where('PostStatus',request('Mode'))->paginate(25);
            }else {
                $Posts = Blog::paginate(25);
            }
            $Count = Blog::where('PostStatus','Published')->count();
            $Draft = Blog::where('PostStatus','Draft')->count();
        }elseif ($user->hasRole('manager')){
            if (request('tag')) {
                $Posts = Blog::whereHas('tag', function (Builder $query) {
                    $query->where('name', request('tag'));
                })->where('PostPublisher' , $user->id)->paginate(25);
            }elseif (request('SearchTerm')){
                $Posts = Blog::where('PostName','LIKE','%'.request('SearchTerm').'%')->where('PostPublisher' , $user->id)->paginate(25);
            }elseif (request('Mode')){
                $Posts = Blog::where('PostStatus',request('Mode'))->where('PostPublisher' , $user->id)->paginate(25);
            }else {
                $Posts = Blog::where('PostPublisher' , $user->id)->paginate(25);
            }
            $Count = Blog::where('PostStatus','Published')->where('PostPublisher' , $user->id)->count();
            $Draft = Blog::where('PostStatus','Draft')->where('PostPublisher' , $user->id)->count();
        }

        return view('Panel.Blog.Posts',['Posts' => $Posts , 'Published' => $Count , 'Draft' => $Draft]);
    }
    /*Return EditPost view
      Param{
            PostID
           }*/
    public function EditPost($PostId){
        $Post = Blog::find($PostId);
        if ($Post == null || $Post == ''){
            return redirect()->to('/panel/AllPosts')->withErrors(['msg'=>'پست مورد نظر شما یافت نشد.مجدداً تلاش کنید']);
        }
        if (!Auth::user()->hasRole('admin')){
            if ($Post->PostPublisher != Auth::id()){
                return redirect()->to('/panel/Blog/AllPosts')->withErrors(['msg'=>'شما اجازه دسترسی به این بخش را ندارید!!!']);
            }
        }

        $Tag = Post_tag::where('Post_id',$PostId)->get();
        return view('Panel.Blog.EditPost',['Post' => $Post,'tags' => Tags::all(),'PostTag' => $Tag]);
    }

    /*Update Post
      Param{
    (Optical)
              PostName,
              PostContent,
              PostImage,
              PostStatus,
              PostTag
            }*/
    public function UpdatePost($id,Request $request){
        $Post = Blog::find($id);
        if (!Auth::user()->hasRole('admin')){
            if ($Post->PostPublisher != Auth::id()){
                return redirect()->to('/panel/Blog/AllPosts')->withErrors(['msg'=>'شما اجازه دسترسی به این بخش را ندارید!!!']);
            }
        }
        $request->validate([
            'PostName' => 'string|max:150',
            'PostContent' => 'string',
            'PostImage' => 'image',
            'PostStatus' => 'string'
        ]);
        $Post->PostName = $request->PostName;
        $Post->PostContent = $request->PostContent;
        $Post->PostStatus = $request->PostStatus;
        $request->PostImage != null || $request->PostImage != "" ? $Post->PostImage = $this->UploadPic($request,'PostImage','PostImage') : '';
        $Post->save();
        $Post->tag()->sync($request->PostTags);
        return redirect()->to('/panel/Blog/EditPost/'.$Post->id)->withErrors(['msg'=>'پست شما بروزرسانی شد']);
    }

    /*Delete Post
      Param{
            PostID
            }
    */
    public function DeletePost($id){
        $Post = Blog::find($id);

        $Post->delete();
        return redirect()->to('/panel/Blog/AllPosts')->withErrors(['msg'=>'پست شما با موفقیت حذف شد']);

    }




    //Return CreateTag View
    public function CreateTag(){
        return view('Panel.Blog.CreateTag');
    }

    /*Create Tag
      Param{
            TagName
            }*/
    public function StoreTag(Request $request){
        $request->validate([
            'TagName' => 'required|string|max:50'
        ]);
        $Tag = Tags::create([
            'name' => $request->TagName
        ]);
        return redirect()->to('/panel/Blog/EditTag/'.$Tag->id)->withErrors(['msg'=>'دسته بندی شما با موققیت افزوده شد']);

    }

    //return view ShowTags
    public function ShowTags(){
        $Tags = Tags::all();
        return view('Panel.Blog.Tags',['Tags' => $Tags]);
    }

    /*Return EditTag view
  Param{
        TagID
       }*/
    public function EditTag($id){
        $Tag = Tags::find($id);
        return view('Panel.Blog.EditTag',['Tag' => $Tag]);
    }

    /*Update Tag
      Param{
    (Optical)
              TagName,
            }*/
    public function UpdateTag($id,Request $request){
        $request->validate([
            'TagName' => 'required|string|max:50'
        ]);
        Tags::whereId($id)->update(['name' => $request->TagName]);

        return redirect()->to('/panel/Blog/EditTag/'.$id)->withErrors(['msg'=>'دسته بندی شما با موققیت بروزرسانی شد']);

    }

    /*Delete Post
  Param{
        PostID
        }
*/

    public function DeleteTag($id){
        $Tag = Tags::find($id);
        $Tag->delete();
        return redirect()->to('/panel/Blog/AllTags')->withErrors(['msg'=>'دسته بندی با موفقیت حذف شد']);

    }


}
