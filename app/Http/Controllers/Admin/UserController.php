<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\RoleUser;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        File::deleteDirectory(public_path() . '/img/users/' . $user->id);
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

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
        ]);

        if($validator->fails()) {
            return redirect()->route('main-admin')->withErrors($validator);
        }

        $user->password = bcrypt($request->get('password'));
        $user->update();
        Session::put('PasswordChange', 'Пароль успішно змінено');
        return redirect()->route('main-admin');
    }

    public function changeProfile(Request $request, $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->route('main-admin')->withErrors($validator);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move(public_path() . '/img/users/' . $user->id . '/',$file->getClientOriginalName());
            $user->img = $file->getClientOriginalName();
        }

        $user->name = $request->get('name') . ' ' . $request->get('surname');
        $user->update();
        Session::put('ProfileChange', 'Профіль успішно змінено!');
        return redirect()->route('main-admin');
    }
}
