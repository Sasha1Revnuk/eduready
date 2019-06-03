<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Question;
use App\Models\RoleUser;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TestsController extends Controller
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

    public function index(Request $request)
    {
        $tests = Test::query()
            ->where('user_id', $this->user->id);
        $cources = Course::where('creater_id', $this->user->id)->get();

        if ($request->get('cource')) {
            $tests->where('cource_id', $request->get('cource'));
        }

        $tests = $tests->get();
        $data = [
            'title' => 'Тести',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'tests' => $tests,
            'cources' => $cources
        ];
        return view('admin.tests.index')->with(['data' => $data]);
    }

    public function add()
    {
        $data = [
            'cources' => Course::where('creater_id', $this->user->id)->get(),
            'title' => 'Додати тест',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'add'
        ];

        return view('admin.tests.form')->with(['data' => $data]);
    }

    public function update(Request $request)
    {
        $test = Test::find($request->get('id'));
        $test->load('questions');
        $data = [
            'cources' => Course::where('creater_id', $this->user->id)->get(),
            'title' => 'Редагувати тест',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'edit',
            'test' => $test
        ];
        return view('admin.tests.form')->with(['data' => $data]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'cource' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->get('action') == 'add') {
            $test = new Test();
            $test->active = 0;
        } elseif ($request->get('action') == 'edit') {
            $test = Test::find($request->get('id'));
            if($request->get('active') == 'on') {
                $test->active = 1;
            } else {
                $test->active = 0;
            }
        }
        $test->title = $request->get('title');
        $test->cource_id = $request->get('cource');
        $test->user_id = $this->user->id;

        if ($request->get('action') == 'add') {
            $test->save();
        } else {
            $test->update();
        }

        return redirect()->route('tests');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function addQuestion(Request $request)
    {
        $data = [
            'test' => Test::find($request->get('test_id')),
            'title' => 'Додати питання',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'add'
        ];

        return view('admin.tests.questions.form')->with(['data' => $data]);
    }

    public function questionsUpdate(Request $request)
    {
        $data = [
            'test' => Test::find($request->get('test_id')),
            'title' => 'Редагування питання',
            'question' => Question::find($request->get('id'))   ,
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'edit',
        ];

        return view('admin.tests.questions.form')->with(['data' => $data]);

    }

    public  function questionsSave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'test_id' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $test = Test::find($request->get('test_id'));
        if($test->user_id != $this->user->id) {
            return redirect()->back();
        }

        if ($request->get('action') == 'add') {
            $question = new Question();
        } elseif ($request->get('action') == 'edit') {
            $question = Question::find($request->get('id'));

        }
        $question->title = $request->get('title');
        $question->test_id = $request->get('test_id');

        if ($request->get('action') == 'add') {
            $question->save();
        } else {
            $question->update();
        }

        return redirect('/adm/tests/edit?id=' . $request->get('test_id'));
    }

}
