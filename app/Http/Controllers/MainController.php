<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Database\Schema\Builder;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function home(){
        $course = Course::find('id',1)->firstOrFail();
        dd($course);
        return view('main.home');
    }
}
