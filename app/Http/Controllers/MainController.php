<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    function index(): View {
        // get all posts and their authos from database
        $posts = Post::with('user')->get();
        // return view('home', ['posts' => $posts]); ou
        return view('home', compact('posts'));
    }

    public function update($id)
    {
        // update post
        $post = Post::find($id);

        // verificar if the user allowed to delete the post
        if (Auth::user()->can('update', $post)) {
            echo 'O usuario pode atualizar o post!';
        } else {
            echo 'O usuario nao pode atualizar o post!';
        }
    }

    public function delete($id)
    {
        // delete post
        $post = Post::find($id);

        // verificar if the user allowed to delete the post
        if (Auth::user()->can('delete', $post)) {
            echo 'O usuario pode eliminar o post!';
        } else {
            echo 'O usuario nao pode eliminar o post!';
        }
    }

    public function create()
    {
        if (Auth::user()->can('create', Post::class)) {
            echo 'O usuario pode Criar o post!';
        } else {
            echo 'O usuario nao pode criar o post!';
        }
    }
}
