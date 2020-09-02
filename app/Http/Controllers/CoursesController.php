<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function courses(){

        $course = Course::where('is_published', true)->get();
        return view ('courses.index', [
            'course'=>$course
        ]);
    }
    public function course($slug){

        $course = Course::where('slug', $slug)->firstOrFail();

        return view('courses.show', [
            'course' => $course
        ]);
    }
}
