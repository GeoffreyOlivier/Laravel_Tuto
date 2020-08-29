<?php

use App\Category;
use App\Course;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugify = new Slugify();

        $course = new Course();
        $course->title = "Les bases de laravel 7";
        $course->subtitle = "Apprendre à créer un site avec laravel ";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at ultrices erat, sit amet rutrum nisi. Integer sollicitudin ullamcorper mauris, eget tempus libero dignissim eu. Vestibulum nunc nulla, suscipit nec augue sed, posuere dignissim nisl. Quisque dignissim in massa ac pulvinar. Sed bibendum sem ut condimentum vulputate. Ut vehicula, urna vitae fringilla commodo, leo lectus ultrices odio, id vestibulum nibh neque eu massa. Nam nulla risus, ultricies vitae lorem sit amet, vestibulum auctor nibh. Integer congue rhoncus leo. Cras dictum malesuada blandit.";
        $course->price = 19.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->save();

        $course = new Course();
        $course->title = "Les bases de wordpress";
        $course->subtitle = "Apprendre à créer un site wordpress";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at ultrices erat, sit amet rutrum nisi. Integer sollicitudin ullamcorper mauris, eget tempus libero dignissim eu. Vestibulum nunc nulla, suscipit nec augue sed, posuere dignissim nisl. Quisque dignissim in massa ac pulvinar. Sed bibendum sem ut condimentum vulputate. Ut vehicula, urna vitae fringilla commodo, leo lectus ultrices odio, id vestibulum nibh neque eu massa. Nam nulla risus, ultricies vitae lorem sit amet, vestibulum auctor nibh. Integer congue rhoncus leo. Cras dictum malesuada blandit.";
        $course->price = 16.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->save();

        $course = new Course();
        $course->title = "Les bases de Symfony 4";
        $course->subtitle = "Apprendre à créer un site e-commerce";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at ultrices erat, sit amet rutrum nisi. Integer sollicitudin ullamcorper mauris, eget tempus libero dignissim eu. Vestibulum nunc nulla, suscipit nec augue sed, posuere dignissim nisl. Quisque dignissim in massa ac pulvinar. Sed bibendum sem ut condimentum vulputate. Ut vehicula, urna vitae fringilla commodo, leo lectus ultrices odio, id vestibulum nibh neque eu massa. Nam nulla risus, ultricies vitae lorem sit amet, vestibulum auctor nibh. Integer congue rhoncus leo. Cras dictum malesuada blandit.";
        $course->price = 14.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->save();

        $course = new Course();
        $course->title = "Les bases de e-commerce";
        $course->subtitle = "Apprendre à créer un site e-commerce";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at ultrices erat, sit amet rutrum nisi. Integer sollicitudin ullamcorper mauris, eget tempus libero dignissim eu. Vestibulum nunc nulla, suscipit nec augue sed, posuere dignissim nisl. Quisque dignissim in massa ac pulvinar. Sed bibendum sem ut condimentum vulputate. Ut vehicula, urna vitae fringilla commodo, leo lectus ultrices odio, id vestibulum nibh neque eu massa. Nam nulla risus, ultricies vitae lorem sit amet, vestibulum auctor nibh. Integer congue rhoncus leo. Cras dictum malesuada blandit.";
        $course->price = 19.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->save();

    }
}
