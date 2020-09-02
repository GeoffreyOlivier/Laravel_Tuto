<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Support\Facades\Auth;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;

class InstructorController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('instructor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('instructor.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $slugify = new Slugify();
        $course = new Course();

        $course->title = $request->input('title');
        $course->slug = $slugify->slugify($course->title);
        $course->subtitle = $request->input('subtitle');
        $course->category_id = $request->input('category');
        $course->description = $request->input('description');
        $course->user_id = Auth::user()->id;

        $image = $request->file('image');
        $imagefullName = $image->getClientOriginalName();
        $imageName = pathinfo($imagefullName, PATHINFO_FILENAME);
        $extention = $image->getClientOriginalExtension();
        $file = time() . '_' . $imageName . '.' . $extention;
        $image->storeAs('public/courses/' . Auth::user()->id, $file);

        $course->image = $file;
        $course->save();
        return redirect()->route('instructor.index');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categories = Category::all();
        $course = Course::find($id);
        return view('instructor.edit', [
            'course' => $course,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $slugify = new Slugify();

        $course->title = $request->input('title');
        $course->slug = $slugify->slugify($course->title);
        $course->subtitle = $request->input('subtitle');
        $course->category_id = $request->input('category');
        $course->description = $request->input('description');
        if ($request->file('image')) {
            $image = $request->file('image');
            $imagefullName = $image->getClientOriginalName();
            $imageName = pathinfo($imagefullName, PATHINFO_FILENAME);
            $extention = $image->getClientOriginalExtension();
            $file = time() . '_' . $imageName . '.' . $extention;
            $image->storeAs('public/courses/' . Auth::user()->id, $file);
            $course->image = $file;
        }

        $course->save();

        return redirect()->route('instructor.index')->with('success', 'Votre modifications ont été apporté avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->route('instructor.index')->with('succes', 'le cours a vien été supprimer');
    }

    public function publish($id)
    {
        $course = Course::find($id);

        if ($course->price && count($course->sections) > 0){
            $course->is_published = true;
            $course->save();
            return redirect()->back()->with('success', 'votre cours est publier');
        }
        return redirect()->back()->with('danger', 'fait pas le con');
    }

}
