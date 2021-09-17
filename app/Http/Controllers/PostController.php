<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
       $posts = Post::take(5)->get();
       return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $user = User::get();
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'content' => 'required|min:1',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()) {

            return redirect('user.index')
                        ->withErrors($validator)
                        ->withInput();
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = Str::uuid() . "." . $file->getClientOriginalExtension();
            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => \Str::slug($request->title),
                'image' => $image,
                'user_id' => Auth::id(),
            ]);

            $file->storeAs("public/users_posts" , $image);

        }else{
            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => \Str::slug($request->title),
                'user_id' => Auth::id(),
            ]);
        }


        return back();

    }

    public function show(Post $post) {

      $comments = $post->comments->where($post->id);


    return view('post.single',compact('post' ,'comments' ));

    }
}
