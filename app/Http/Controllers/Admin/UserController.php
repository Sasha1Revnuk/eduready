<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function delete($id)
    {
        $courses = Course::where('creater_id', $id)->get();
        dd($courses);
    }
}
