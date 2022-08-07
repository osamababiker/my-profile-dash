<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;
use App\Models\Category;

class CategoriesController extends Controller
{

    public function index(){
        $categories = Category::get();
        return view('admin/categories/index',  compact(['categories']));
    }

    public function create(){
        $categories = Category::get();
        return view('admin/categories/create', compact(['categories']));
    }

    public function store(CategoriesRequest $request){
        $category = new Category();
        $category->arName = $request->arName;
        $category->enName = $request->enName;
        $category->subOf = $request->subOf;
        $category->save();
        session()->flash('feedback', 'Category has been created!');
        return redirect()->back();
    }


    public function update(CategoriesRequest $request){
        $category = Category::findOrFail($request->categoryId);
        $category->arName = $request->arName;
        $category->enName = $request->enName;
        $category->subOf = $request->subOf;
        $category->save();
        session()->flash('feedback', 'Category has been updated!');
        return redirect()->back();
    }

    public function destroy(Request $request){
        $category = Category::findOrFail($request->categoryId);
        $category->delete();
        session()->flash('feedback', 'Category has been Deleted!');
        return redirect()->back();
    }
}
