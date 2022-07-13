<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class HomeController extends Controller
{

    public function index(){
        $messages = Message::get();
        return view('admin/index',compact(['messages']));
    }

}
