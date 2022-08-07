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
        if($request->has('poster')){
            $image = $request->file('poster');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/posts'),$image_name);
        }
        $post->arTitle = $request->arTitle;
        $post->enTitle = $request->enTitle;
        $post->subOf = $request->subOf;
        $post->poster = $image_name;
        $post->arSummery = $request->arSummery;
        $post->enSummery = $request->enSummery;
        $post->arContent = $request->arContent;
        $post->enContent = $request->enContent;
        $post->isPublished = $request->isPublished;
        $post->save();
        session()->flash('feedback', 'Post has been created!');
        return redirect()->back();
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        $categories = Category::get();
        return view('admin/posts/edit', compact(['post','categories']));
    }

    public function update(Request $request){
        $post = Post::findOrFail($request->postId);
        if($request->has('poster')){
            if(file_exists(public_path('upload/poster/'.$post->poster))){
                unlink(public_path('upload/poster/'.$post->poster));
            }
            $image = $request->file('poster');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/posts'),$image_name);
        }else $image_name = $post->poster;
   
        $post->arTitle = $request->arTitle;
        $post->enTitle = $request->enTitle;
        $post->subOf = $request->subOf;
        $post->poster = $image_name;
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
