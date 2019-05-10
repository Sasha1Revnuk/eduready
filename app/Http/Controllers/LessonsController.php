<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($cat, $course, $lessonId)
    {
        $lesson = Lesson::find($lessonId)->first();
        $lesson->load('section');
        $lesson->section->load('course');
        $lesson->section->course->load('category');
        $data = [
            'title' => $lesson->title,
            'breadCrumbs' => [
                'Головна' => '/',
                $lesson->section->course->category->title =>'/category/' . $lesson->section->course->category->url,
                $lesson->section->course->title => '/learn/' . $lesson->section->course->url,
                $lesson->title => '/learn/'. $lesson->section->course->url . '/' . $lesson->id
            ],
            'menu' => $this->mainMenu,
            'categories'=> $this->categories,
            'lesson' => $lesson
        ];

        return view('lessons.index')->with($data);
    }
}
