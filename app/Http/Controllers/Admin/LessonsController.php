<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lesson;
use App\Models\RoleUser;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Validator;

class LessonsController extends Controller
{
    public $user;
    public $role;
    public function __construct()
    {
        $this->user = Auth::user();
        if($this->user->ready == 0) {
            Session::put('FailedReady', 'Ваш аккаунт очікує активації!');
            return redirect('/logout');
        }
        $this->role = RoleUser::where('user_id', $this->user->id)->first();
        if ($this->role->role_id != User::ROLE_TEACHER) {
            return redirect()->back();
        }
    }

    public function add(Request $request)
    {
        $data = [
            'title' => 'Додати урок',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'add',
            'sectionId' => $request->get('section')
        ];

        return view('admin.lessons.form')->with(['data' => $data]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'action' => 'required',
            'text' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->get('action') == 'add') {
            $lesson = new Lesson();
            $lesson->section_id = $request->get('sectionId');
        } elseif ($request->get('action') == 'edit') {
            $lesson = Lesson::find($request->get('id'));
        }
        $lesson->title = $request->get('title');
        $lesson->text = $request->get('text');
        if ($request->get('action') == 'add') {
            $lesson->img = 'lesson.jpg';
        }

        if ($request->get('action') == 'add') {
            $lesson->save();
            $section = Section::with('course')->with('course.category')->find($request->get('sectionId'));
        } else {
            $section = Section::with('course')->with('course.category')->find($lesson->section_id);
        }
        if ($request->get('action') == 'add') {
            File::makeDirectory(public_path() . '/img/lessons/' . $lesson->id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file->move(public_path() . '/img/lessons/' . $lesson->id . '/',$file->getClientOriginalName());
                $lesson->img = $file->getClientOriginalName();
            } else {
                File::copy(public_path() . '/img/lessons/' . 'lesson.jpg', public_path() . '/img/lessons/' . $lesson->id . '/lesson.jpg');
            }
        } elseif ($request->get('action') == 'edit') {

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file->move(public_path() . '/img/lessons/' . $lesson->id . '/',$file->getClientOriginalName());
                $lesson->img = $file->getClientOriginalName();
            }

        }

        if ($request->get('action') == 'add') {
            $lesson->save();
        } elseif ($request->get('action') == 'edit') {
            $lesson->update();
        }

        return redirect('/adm/sections/edit?id=' . $section->id);
    }

    public function edit(Request $request)
    {
        $lesson = Lesson::with('section')->find($request->get('id'));
        $data = [
            'lesson' => $lesson,
            'title' => $lesson->title,
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'edit'
        ];
        //dd($data);
        return view('admin.lessons.form')->with(['data' => $data]);
    }

    public function confDelete(Request $request)
    {
        $data = [
            'title' => 'Підтвердіть видалення уроку',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'id' => $request->get('id')
        ];

        return view('admin.lessons.confirm-delete')->with(['data' => $data]);
    }

    public function delete(Request $request)
    {
        if ($request->get('action') == 'false') {
            return redirect('/adm/sections/edit?id=' . Lesson::with('section')->find($request->get('id'))->id);
        }

        $id = $request->get('id');

        $lesson = Lesson::find($id);
        $lessonName = $lesson->title;
        $sectionId = Lesson::with('section')->find($request->get('id'))->section->id;
        File::deleteDirectory(public_path() . '/img/lessons/' . $lesson->id);
        $lesson->delete();
        $redirectUrl = '/adm/sections/edit?id=' . $sectionId;
        Session::put('lessonDelete', 'Урок ' . $lessonName . ' успішно видалено!');
        return redirect($redirectUrl);
    }

}
