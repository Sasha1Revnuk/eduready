<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\RoleUser;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function delete($id)
    {
        if (Auth::user()->id == $id)
        {
            return redirect()->route('main-admin');
        }
        $courses = Course::where('creater_id', $id)->get();
        $courses->load('sections');
        foreach ($courses as $course) {
            $course->sections->load('lessons');
            foreach ($course->sections as $section) {
                foreach ($section->lessons as $lesson) {
                    $lesson->delete();
                }
                $section->delete();
            }
            $course->load('feedback');
            foreach ($course->feedback as $feedback) {
                $feedback->delete();
            }
            $course->delete();
        }

        $user = User::find($id);
        $user->load('feedback');
        foreach ($user->feedback as $feedback) {
            $feedback->delete();
        }

        $roles = RoleUser::where('user_id', $id)->get();
        foreach ($roles as $role) {
            $role->delete();
        }
        $user->delete();
        return redirect()->route('main-admin');
    }

    public function active($id)
    {
        $user = User::find($id);
        $user->ready = User::STAUTS_ACTIVE;
        $user->update();

        return redirect()->route('main-admin');
    }
}
