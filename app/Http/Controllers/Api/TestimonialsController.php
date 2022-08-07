<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{

    public function index(){
        $testimonials = Testimonial::orderBy('id','desc')->limit(10)->get();
        return response()->json($testimonials, 200);
    }

}
