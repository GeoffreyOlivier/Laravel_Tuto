<?php

namespace App\Http\Manager;

use Illuminate\Support\Facades\Auth;

class VideoManager {

    public function videoStorage($video) {

        $fileFullName = $video->getClientOriginalName();
        $filename = pathinfo($fileFullName, PATHINFO_FILENAME);
        $extension = $video->getClientOriginalExtension();
        $file = time() . '_' . $filename . '.' . $extension;
        $video->storeAs('public/courses_section/'. Auth::user()->id, $file);
        return $file;
    }

    public function getVideoDuration($video){
        $getID3 = new \getID3();
        $pathVideo = 'storage/courses_section/' . Auth::user()->id . '/' .$video;
        $fileAnalyse = $getID3->analyze($pathVideo);
        $playtime = $fileAnalyse['playtime_string'];
        return $playtime;

    }
}
