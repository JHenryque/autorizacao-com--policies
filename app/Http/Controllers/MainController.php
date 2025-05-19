<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    function index(): View {
        // get all posts and their authos from database
        $posts = Post::with('user')->get();
        // return view('home', ['posts' => $posts]); ou
        return view('home', compact('posts'));
    }
}
