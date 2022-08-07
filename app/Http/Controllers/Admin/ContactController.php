<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index(){
        $messages = ContactMessage::orderBy('id','desc')->get();
        return view('admin.contactMessages', compact(['messages']));
    }

    public function destroy(Request $request){
        $message = ContactMessage::findOrFail($request->messageId);
        $message->delete();
        session()->flash('feedback', 'Message has been deleted successfully');
        return redirect()->back();
    }
}
