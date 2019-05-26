<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Course;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Validator;

class CoursesController extends Controller
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

    public function add()
    {
        $data = [
            'title' => 'Додати курс',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'add'
        ];

        return view('admin.cources.form')->with(['data' => $data]);
    }

    public function edit(Request $request)
    {
        $cource = Course::find($request->get('id'));
        $data = [
            'cource' => $cource->load('sections'),
            'title' => $cource->title,
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
        ];
        //dd($data);
        return view('admin.cources.content')->with(['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = [
            'title' => 'Редагувати курс',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'edit',
            'course' => Course::find($request->get('id')),
        ];

        return view('admin.cources.form')->with(['data' => $data]);
    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'action' => 'required',
            'desc' => 'required|max:100',
            'category' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->get('action') == 'add') {
            $cource = new Course();
        } elseif ($request->get('action') == 'edit') {
            $cource = Course::find($request->get('id'));
        }
        $cource->title = $request->get('title');
        $cource->desc = $request->get('desc');
        $cource->description = $request->get('description');
        $cource->category_id = $request->get('category');
        if ($request->get('action') == 'add') {
            $cource->img = 'cource.jpg';
        }
        $cource->creater_id = $this->user->id;
        $category = Category::find($request->get('category'));
        $cource->url = $category->title . '/' . $cource->title;


        if ($request->get('action') == 'add') {
           $cource->save();
        }

        if ($request->get('action') == 'add') {
            File::makeDirectory(public_path() . '/img/courses/' . $cource->id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file->move(public_path() . '/img/courses/' . $cource->id . '/',$file->getClientOriginalName());
                $cource->img = $file->getClientOriginalName();
            } else {
                File::copy(public_path() . '/img/courses/' . 'cource.jpg', public_path() . '/img/courses/' . $cource->id . '/cource.jpg');
            }
        } elseif ($request->get('action') == 'edit') {

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file->move(public_path() . '/img/courses/' . $cource->id . '/',$file->getClientOriginalName());
                $cource->img = $file->getClientOriginalName();
            }

        }

        if ($request->get('action') == 'add') {
            $cource->save();
        } elseif ($request->get('action') == 'edit') {
            $cource->update();
        }

        return redirect()->route('main-admin');
    }
}
