<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Models\Category;
use App\Models\Post;

class PostsController extends Controller
{

    public function index(){
        $posts = Post::get();
        return view('admin/posts/index', compact(['posts']));
    }

    public function create(){
        $categories = Category::get();
        return view('admin/posts/create', compact(['categories']));
    }

    public function store(PostsRequest $request){
        $post = new Post();
        $post->arTitle = $request->arTitle;
        $post->enTitle = $request->enTitle;
        $post->subOf = $request->subOf;
        $post->arSummery = $request->arSummery;
        $post->enSummery = $request->enSummery;
        $post->arContent = $request->arContent;
        $post->enContent = $request->enContent;
        $post->isPublished = $request->isPublished;
        $post->save();
        session()->flash('feedback', 'Post has been created!');
        return response()->json([
            'data' => $post
        ], 201);
    }

    public function update(Request $request){
        $post = Post::findOrFail($request->postId);
        $post->arTitle = $request->arTitle;
        $post->enTitle = $request->enTitle;
        $post->subOf = $request->subOf;
        $post->arSummery = $request->arSummery;
        $post->enSummery = $request->enSummery;
        $post->arContent = $request->arContent;
        $post->enContent = $request->enContent;
        $post->isPublished = $request->isPublished;
        $post->save();
        session()->flash('feedback', 'Post has been updated!');
        return redirect()->back();
    }

    public function destroy(Request $request){
        $post = Post::findOrFail($request->postId);
        $post->delete();
        session()->flash('feedback', 'Post has been deleted!');
        return redirect()->back();
    }
}
