<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Post_tag;
use App\Tags;
use App\Traits\AdminAuth;
use App\Traits\Uploader;
use Barryvdh\Reflection\DocBlock\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    use Uploader;
    use AdminAuth;
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
            return RedirectController::Redirect('/panel/Blog/EditPost/'.$Post->id,'پست شما با موققیت ارسال شد');
    }

    //return view ShowPosts
    public function ShowPosts(){
        if($this->IsAdmin()){
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
        }
        elseif (Auth::user()->hasRole('manager')){
            if (request('tag')) {
                $Posts = Blog::whereHas('tag', function (Builder $query) {
                    $query->where('name', request('tag'));
                })->where('PostPublisher' , Auth::id())->paginate(25);
            }elseif (request('SearchTerm')){
                $Posts = Blog::where('PostName','LIKE','%'.request('SearchTerm').'%')->where('PostPublisher' , Auth::id())->paginate(25);
            }elseif (request('Mode')){
                $Posts = Blog::where('PostStatus',request('Mode'))->where('PostPublisher' , Auth::id())->paginate(25);
            }else {
                $Posts = Blog::where('PostPublisher' , Auth::id())->paginate(25);
            }
            $Count = Blog::where('PostStatus','Published')->where('PostPublisher' , Auth::id())->count();
            $Draft = Blog::where('PostStatus','Draft')->where('PostPublisher' , Auth::id())->count();
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
            return  RedirectController::Redirect('/panel/Blog/AllPosts','پست مورد نظر شما یافت نشد.مجدداً تلاش کنید');
        }
        if (!$this->IsAdmin()){
            if (!$this->CheckPublisher($Post->PostPublisher)){
                return  RedirectController::Redirect('/panel/Blog/AllPosts','شما اجازه دسترسی به این بخش را ندارید!!!');
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
        if (!$this->IsAdmin()){
            if (!$this->CheckPublisher($Post->PostPublisher)){
                return  RedirectController::Redirect('/panel/Blog/AllPosts','شما اجازه دسترسی به این بخش را ندارید!!!');
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

        return  RedirectController::Redirect('/panel/Blog/EditPost/'.$Post->id,'پست شما بروزرسانی شد');
    }

    /*Delete Post
      Param{
            PostID
            }
    */
    public function DeletePost($id){
        $Post = Blog::find($id);

        $Post->delete();

        return  RedirectController::Redirect('/panel/Blog/AllPosts','پست شما با موفقیت حذف شد');

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

        return  RedirectController::Redirect('/panel/Blog/EditTag/'.$Tag->id,'دسته بندی شما با موققیت افزوده شد');

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

        return  RedirectController::Redirect('/panel/Blog/EditTag/'.$id,'دسته بندی شما با موققیت بروزرسانی شد');

    }

    /*Delete Post
  Param{
        PostID
        }
*/

    public function DeleteTag($id){
        $Tag = Tags::find($id);
        $Tag->delete();
        return  RedirectController::Redirect('/panel/Blog/AllTags','دسته بندی با موفقیت حذف شد');

    }


}
