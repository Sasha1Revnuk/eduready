<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $courses = Course::paginate(config('settings.coursesOnCoursePage'));
        $courses->load('category');
        //dd($courses->lastPage());
        $data = [
            'title' => 'Курси',
            'breadCrumbs' => [
                'Головна' => '/',
                'Курси' => '/courses'
            ],
            'menu' => $this->mainMenu,
            'categories'=> $this->categories,
            'courses' => $courses
        ];

        return view('courses.index')->with($data);
    }
}
