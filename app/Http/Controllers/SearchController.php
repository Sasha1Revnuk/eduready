<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $lesson=null;
        $users=null;
        if($request -> get('author'))
        {
            $users=User::find($request->get('searchPhrase'))->get();
        }
        else
        {
            $lesson=Lesson::where('title', 'LIKE', '%'.$request->get('searchPhrase').'%')->get();

            dd($lesson);
            if($lesson)
            {
                $lesson->load('section');
                $lesson->section->load('course');
            }

        }
        
        $data = [
            'title' => $lesson->title,
            'breadCrumbs' => [
                'Головна' => '/',
                $lesson->section->course->title => '/learn/' . $lesson->section->course->url
            ],
            'menu' => $this->mainMenu,
            'categories'=> $this->categories,
            'users'=>$users,
            'lesson'=>$lesson
        ];

        return view('search.index')->with($data);
    }
}
