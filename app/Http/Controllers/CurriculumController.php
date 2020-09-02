<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Manager\VideoManager;
use App\Section;
use Illuminate\Support\Facades\Auth;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{



    public function __construct(VideoManager $videoManager)
    {
        $this->videoManager = $videoManager;
    }

    public function index($id) {

        $course = Course::find($id);
        return view('instructor.curriculum.index', [
            'course' => $course
        ]);
    }

    public function create($id){
        $course = Course::find($id);
        return view('instructor.curriculum.create', [
            'course' => $course
        ]);
    }

    public function store(Request $request, $id){
        $slugify = new slugify();
        $section = new Section();
        $course = Course::find($id);

        $section->name = $request->input('section_name');
        $section->slug = $slugify->slugify($section->name);
        $video = $this->videoManager->videoStorage($request->file('section_video'));

        $section->video = $video;
        $section->course_id = $id;

        $playtime= $this->videoManager->getVideoDuration($video);
        $section->playtime_second = $playtime;

       $section->save();
       return redirect()->route('instructor.curriculum.index', $course->id);

    }

    public function edit($id,$sectionId){

        $course= Course::find($id);
        $section = Section::find($sectionId);
        return view('instructor.curriculum.edit',[
            'course'=>$course,
            'section'=>$section
        ]);
    }

    public function delete($id,$sectionId){
        $course= Course::find($id);
        $section = Section::find($sectionId);
        $section->destroy();
        return redirect()->route('instructor.curriculum.index')->with('succes', 'la section a bien été supprimer');
    }
}
