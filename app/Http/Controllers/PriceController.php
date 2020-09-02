<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pricing($id)
    {
        $course = Course::find($id);

        return view('instructor/pricing', [
            'course' => $course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id)
    {
        $course = Course::find($id);
        $course->price = $request->input('price');
        $course->save();

        return redirect()->route('instructor.edit', $course->id)->with('succes', 'le prix a bien été changer');
    }

}
