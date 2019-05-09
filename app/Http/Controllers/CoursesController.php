<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->paginate(config('settings.coursesOnCoursePage'));
        $courses->load('category');
//        $myCourses = null;
//        if (Auth::check()) {
//            $myCourses = Course::query()
//                ->whereIn('id',  explode(',', Auth::user()->courses))
//                ->with('category')
//                ->get();
//        }
        $coursesArray = [];
        if (Auth::check()) {
            $coursesArray = explode(',', Auth::user()->courses);
        }
        $data = [
            'title' => 'Курси',
            'breadCrumbs' => [
                'Головна' => '/',
                'Курси' => '/courses'
            ],
            'menu' => $this->mainMenu,
            'categories'=> $this->categories,
            'courses' => $courses,
            'coursesArray' => $coursesArray,
            //'myCourses' => $myCourses
        ];

        return view('courses.index')->with($data);
    }

    public function singleCourse($cat, $title)
    {
        $course = Course::where('url', $cat . '/' . $title)->first();
        $course->load('category');
        $course->load('sections');
        $course->sections->load('lessons');
        $author = User::where('id', $course->creater_id)->first();
        //dd($course);
        $data = [
            'title' => $course->title,
            'breadCrumbs' => [
                'Головна' => '/',
                'Курси' => '/courses'
            ],
            'menu' => $this->mainMenu,
            'categories'=> $this->categories,
            'course' => $course,
            'author' => $author,
            'coursesArray' => explode(',', Auth::user()->courses)
        ];

        return view('courses.single.single')->with($data);
    }

    public function subscribe($id)
    {
        $user = User::find(Auth::user()->id);
        if ($user->courses == '0') {
           $user->courses = $id;
        } else {
            $coursesArray = explode(',',$user->courses);
            $coursesArray [] = $id;
            $user->courses = implode(',', $coursesArray);
        }
        $user->save();
        return redirect()->back();
    }
    public function unsubscribe($id)
    {
        $user = User::find(Auth::user()->id);
        $coursesArray = explode(',',$user->courses);
        foreach ($coursesArray as $key => $value) {
            if ($value == $id) {
                unset($coursesArray[$key]);
                break;
            }
        }
        $user->courses = implode(',', $coursesArray);
        $user->save();
        return redirect()->back();
    }
}
