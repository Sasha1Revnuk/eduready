<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $lessons = Lesson::where('title', 'LIKE', '%' . $request->get('title') . '%')->get();
        if ($lessons) {
            foreach ($lessons as $lesson) {
                $lesson->load('section');
                $lesson->section->load('course');
            }
        }

        $data = [
            'title' => 'Пошук',
            'breadCrumbs' => [
                'Головна' => '/',
            ],
            'menu' => $this->mainMenu,
            'categories'=> $this->categories,
            'lessons' => $lessons
        ];

        return view('search.index')->with($data);
    }

    public function getAuthor($id)
    {
        $author = User::find($id);
        if ($author == false) {
            return redirect()->back();
        }
        $courses = collect();
        if (explode(',', $author->courses)) {
            $courses = Course::query()
                ->whereIn('id', explode(',', $author->courses))
                ->with('category')
                ->get();
        }

        if (Auth::check()) {
            $coursesArray = explode(',', Auth::user()->courses);
        }
        $data = [
            'title' => !$courses->isEmpty() ? 'Автор: ' . $author->name : 'Курсів не знайдено',
            'breadCrumbs' => [
                'Головна' => '/',
            ],
            'menu' => $this->mainMenu,
            'categories'=> $this->categories,
            'courses' => $courses,
            'coursesArray' => isset($coursesArray) ? $coursesArray : '',
        ];

        return view('search.author.index')->with($data);
    }
}
