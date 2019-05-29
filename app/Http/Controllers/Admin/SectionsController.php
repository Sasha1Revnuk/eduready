<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoleUser;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SectionsController extends Controller
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
            'title' => 'Додати секцію',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'add',
            'courceId' => $request->get('cource')
        ];

        return view('admin.sections.form')->with(['data' => $data]);
    }
    public function edit(Request $request)
    {
        $section = Section::with('course')->with('course.category')->find($request->get('id'));
        $data = [
            'section' => $section->load('lessons'),
            'title' => $section->title,
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
        ];
        //dd($data);
        return view('admin.sections.content')->with(['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = [
            'title' => 'Редагувати секцію',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'edit',
            'section' => Section::find($request->get('id')),
        ];

        return view('admin.sections.form')->with(['data' => $data]);
    }
    public function save(Request $request)
    {

        if($request->get('action') == 'add'){
            $section = new Section();
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'courceId' => 'required',
            ]);
        }
        else {
            $section = Section::find($request->get('section'));
            $validator = Validator::make($request->all(), [
                'title' => 'required',
            ]);
        }
        if($validator->fails()) {
            return redirect()->route('addSection')->withErrors($validator);
        }

        $section->title = $request->get('title');
        if($request->get('action') == 'add') {
            $section->course_id = $request->get('courceId');
            $redirectUrl = '/adm/courses/edit?id=' . $request->get('courceId');
            $section->save();
        } else {
            $redirectUrl = '/adm/sections/edit?id=' . $section->id;
            $section->update();
        }

        return redirect($redirectUrl);
    }

    public function confDelete(Request $request)
    {
        $data = [
            'title' => 'Підтвердіть видалення секції',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'id' => $request->get('id')
        ];

        return view('admin.sections.confirm-delete')->with(['data' => $data]);
    }

    public function delete(Request $request)
    {
        if ($request->get('action') == 'false') {
            return redirect('/adm/sections/edit?id=' . $request->get('id'));
        }

        $id = $request->get('id');

        $section = Section::find($id);
        $sectionName = $section->title;
        $courceId = $section->course_id;
        $section->load('lessons');
        foreach ($section->lessons as $lesson) {
            File::deleteDirectory(public_path() . '/img/lessons/' . $lesson->id);
            $lesson->delete();
        }
        $section->delete();
        $redirectUrl = '/adm/courses/edit?id=' . $courceId;
        Session::put('sectionDelete', 'Секцію ' . $sectionName . ' успішно видалено!');
        return redirect($redirectUrl);
    }
}
