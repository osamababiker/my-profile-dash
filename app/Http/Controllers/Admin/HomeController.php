<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class HomeController extends Controller
{

    public function index(){
        $messages = ContactMessage::get();
        return view('admin/index',compact(['messages']));
    }

}
