<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{

    public function index(){
        $testimonials = Testimonial::orderBy('id','desc')->get();
        return view('admin.testimonials.index', compact(['testimonials']));
    }

    public function create(){
        return view('admin.testimonials.create');
    }


    public function store(Request $request){
        $this->validate($request,[
            'client_name' => 'required|string',
            'client_position' => 'required|string',
            'client_image' => 'required',
            'client_review' => 'required|string',
        ]);

        if($request->has('client_image')){
            $image = $request->file('client_image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/testimonials'),$image_name);
        } 

        $testimonial = new Testimonial();
        $testimonial->client_name = $request->client_name;
        $testimonial->client_position = $request->client_position;
        $testimonial->client_review = $request->client_review;
        $testimonial->client_image = $image_name;
        $testimonial->save();

        session()->flash('feedback', 'Testimonial has been created successfully');
        return redirect()->back();
    }


    public function edit($id){
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', ['testimonial']);
    }


    public function update(Request $request){
        $testimonial = Testimonial::findOrFail($request->testimonialId);
        $this->validate($request,[
            'client_name' => 'required|string',
            'client_position' => 'required|string',
            'client_review' => 'required|string',
        ]);

        if($request->has('client_image')){
            if(file_exists(public_path('upload/testimonials/'.$testimonial->client_image))){
                unlink(public_path('upload/testimonials/'.$testimonial->client_image));
            }
            $image = $request->file('testimonials');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/testimonials'),$image_name);
        }else $image_name = $testimonial->client_image;

        $testimonial->client_name = $request->client_name;
        $testimonial->client_position = $request->client_position;
        $testimonial->client_review = $request->client_review;
        $testimonial->client_image = $image_name;
        $testimonial->save();

        session()->flash('feedback', 'Testimonial has been Updated successfully');
        return redirect()->back();
    }


    public function destroy(Request $request){
        $testimonial = Testimonial::findOrFail($request->testimonialId);
        $testimonial->delete();
        session()->flash('feedback', 'Testimonial has been Deleted successfully');
        return redirect()->back();
    }
}
