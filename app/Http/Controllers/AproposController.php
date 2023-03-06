<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AproposController extends Controller
{
    public function index()
    {

        $posts = Post::latest()->paginate(10);

        return view('a-propos', compact('posts'));
    }
}
