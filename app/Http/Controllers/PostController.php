<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }
    public function index()
    {
        //Eager Loading == with(['user', 'likes'])
        $posts = Post::latest()->with(['user', 'likes'])->paginate(7);

        // $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(7);
        // dd($posts);


        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post){

        return view('posts.show', [
            'post' => $post
        ]);

    }

    public function posts(Request $request)
    {
        // dd('ok');
        $this->validate($request, [
            'body' => 'required',
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);
         return back();

        // Post::create([
        //     'user_id' => auth()->user()->id(),
        //     'body'=> $request->body,
        // ]);
        //a user can have multiple posts

        
    }
    public function destroy(Post $post){
            // dd($post);

            // if (!$post->ownedBy(auth()->user())) {
            //     dd('no');
            // }
            
            $this->authorize('delete', $post); //throws an error when trying to delete unauthorized posts.

            $post->delete();
            return back();
    }
}
