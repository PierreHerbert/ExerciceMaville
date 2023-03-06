<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('images');
        $image_name = $image->getClientOriginalName();
        $image->move('./images/posts',$image_name); 

        Post::create(array_merge($request->only('title', 'description', 'body'),[
            'images' => $image_name,
        ]));

        return redirect()->route('posts.index')
            ->withSuccess(__('le post à bien été créer.'));
    }


    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {

        $image = $request->file('images');
        if ($image != null){
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('./images/posts'),$image_name); 
        }
        else{
            $image_name = $post->images;
        }
        $post->update(array_merge($request->only('title', 'description', 'body'),[
            'images' => $image_name,
        ]));

        return redirect()->route('posts.index')
            ->withSuccess(__("l'article à bien été modifier"));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
}