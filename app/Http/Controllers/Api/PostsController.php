<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{

    public function index(){
        $posts = Post::orderBy('id','desc')->get();
        return response()->json($posts,200);
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->first();
        return response()->json($post, 200);
    } 


}
