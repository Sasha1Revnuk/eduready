<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($url)
    {
        $category = Category::where('url', $url)->first();
        $courses = Course::where('category_id', $category->id)->paginate(config('settings.coursesOnCoursePage'));
        $data = [
            'title' => $category->title,
            'breadCrumbs' => [
                'Головна' => '/',
                $category->title => '/category/' . $category->url
            ],
            'menu' => $this->mainMenu,
            'categories'=> $this->categories,
            'category'=> $category,
            'courses' => $courses
        ];

        return view('categories.index')->with($data);
    }
}
