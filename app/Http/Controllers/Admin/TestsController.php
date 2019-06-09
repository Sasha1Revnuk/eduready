<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Group;
use App\Models\Question;
use App\Models\RoleUser;
use App\Models\Test;
use App\Models\TestResult;
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
        $test = Test::find($request->get('test_id'));
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

    public function view(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'test_id' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $data = [
            'title' => 'Результати тесту',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'results' => TestResult::where('test_id', $request->get('test_id'))->get(),
            'groups' => $this->getGroupList()
        ];
        return view('admin.tests.view')->with(['data' => $data]);

    }

    public  function getGroupList()
    {
        $groups = Group::all();
        foreach ($groups as $group) {
            $groupsArray[$group->id] = $group->title;
        }
        return $groupsArray;

    }

    public function resultDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $result = TestResult::find($request->get('id'));
        $result->delete();
        return redirect()->back();
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
            'question' => Question::with('answers')->find($request->get('id'))   ,
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

        return redirect('/adm/tests/edit?test_id=' . $request->get('test_id'));
    }

    public function questionDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $question = Question::with('test')->find($request->get('id'));
        if ($question->test->user_id != $this->user->id) {
            return redirect()->back();
        }
        $testId = $question->test->id;
        $this->questionDeleteMethod($question);
        return redirect('/adm/tests/edit?test_id=' . $testId);
    }

    public function questionDeleteMethod($question)
    {
        $question->load('answers');
        foreach ($question->answers as $answer) {
            $answer->delete();
        }

        $question->delete();

    }

    public function testDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $test = Test::with('questions')->find($request->get('id'));
        if ($test->user_id != $this->user->id) {
            return redirect()->back();
        }

        foreach ($test->questions as $question) {
            $this->questionDeleteMethod($question);
        }

        $test->delete();
        return redirect()->route('tests');
    }


/////////////////////////////////////////////////////////////////////////////////////////
    public function addAnswer(Request $request)
    {
        $data = [
            'question' => Question::find($request->get('question_id')),
            'title' => 'Додати відповідь',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'add'
        ];

        return view('admin.tests.answers.form')->with(['data' => $data]);
    }

    public function editAnswer(Request $request)
    {
        $data = [
            'question' => Question::with('test')->find($request->get('question_id')),
            'answer' => Answer::find($request->get('id')),
            'countRight' => count(Answer::where('right', '<>', 0)->get()),
            'title' => 'Редагувати відповідь',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'action' => 'edit'
        ];
        //dd($data['answer']);
        return view('admin.tests.answers.editForm')->with(['data' => $data]);
    }

    public function answersUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'question_id' => 'required',
            'id' => 'required'
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $answer = Answer::find($request->get('id'));
        $answer->title = $request->get('title');
        if ( $request->get('right') ) {
            $answer->right = 1;
        } else {
            $answer->right = 0;

        }
        $answer->update();
        $question = Question::with('answers')->find($request->get('question_id'));
        $right = 0;
        foreach ($question->answers as $answer) {
            if ($answer->right > 0) {
                $right ++;
            }
        }

        switch ($right) {
            case 1:
                $mark = 1;
                break;
            case 2:
                $mark = 0.5;
                break;
            case 3:
                $mark = 0.33;
                break;
            case 4:
                $mark = 0.25;
                break;
            default :
                $mark = 1;
        }

        foreach ($question->answers as $answerQuestion) {
            $answer = Answer::find($answerQuestion->id);
            if ($answer->right > 0) {
                $answer->right = $mark;
                $answer->update();
            }
        }

        return redirect('/adm/tests/edit-question?id=' . $question->id . '&test_id=' . $question->test->id );

    }

    public function answerSave(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'right' => 'required',
            'question_id' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        switch (count($request->get('right'))) {
            case 1:
                $mark = 1;
                break;
            case 2:
                $mark = 0.5;
                break;
            case 3:
                $mark = 0.33;
                break;
            case 4:
                $mark = 0.25;
                break;
            default :
                $mark = 1;
        }
        $question = Question::with('test')->find($request->get('question_id'));
        for ($i = 0; $i < 4; $i++) {
            $answer = new Answer();
            $answer->title = $request->get('title')[$i];
            $answer->right = 0;
            $answer->question_id = $request->get('question_id');
            $answer->save();
            $answerId[] = $answer->id;
        }
        $i = 0;
        foreach ($answerId as $answerr) {
            $answer = Answer::find($answerr);
            foreach ($request->get('right') as $right) {
                if ($right == $i) {
                    $answer->right = $mark;
                    break;
                }
            }
            $answer->update();
            $i++;
        }
        return redirect('/adm/tests/edit-question?id=' . $question->id . '&test_id=' . $question->test->id );
    }
    /////////////////////////////////////////////////////////////////////////////////

    public function show(Request $request)
    {
        $courceFilter = Course::query()
            ->whereIn('id',  explode(',', Auth::user()->courses))
            ->get();
        $cources = Course::query()
            ->whereIn('id',  explode(',', Auth::user()->courses));
        if ($request->get('cource')) {
            $cources->where('id', $request->get('cource'));
        }
        $cources = $cources->get();
        $testsCollection = collect();
        foreach ($cources as $cource) {
            $test = Test::query()
                ->with('questions')
                ->where('cource_id', $cource->id)
                ->where('active', 1)
                ->get();
            $testsCollection->push($test);
        }
        $data = [
            'courceFilter' => $courceFilter,
            'title' => 'Тести',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'tests' => $testsCollection,
            'cources' => $cources,
            'user' => $this->user
        ];
        return view('admin.tests.student')->with(['data' => $data]);
    }

    public function info(Request $request)
    {
        $result = TestResult::where('test_id', $request->get('test_id'))->where('user_id', $this->user->id)->first();
        if($result) {
            return redirect()->back();
        }

        $test = Test::with('questions')->find($request->get('test_id'));

        $data = [
            'title' => 'Розпочати тест?',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'time' => '15 хв',
            'test' => $test
        ];
        return view('admin.tests.info')->with(['data' => $data]);
    }

    public function testing(Request $request)
    {
        $test = Test::with('questions')->with('questions.answers')->find($request->get('test_id'));
        $data = [
            'title' => 'Проходження тесту',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'time' => 15,
            'test' => $test
        ];
        return view('admin.tests.testing')->with(['data' => $data]);
    }

    public  function testResult(Request $request)
    {
        $mark = 0;
        if($request->get('answer')) {
            foreach ($request->get('answer') as $question) {
                $result = 0;
                foreach ($question as $answer) {
                    $ans = Answer::find($answer)->right;
                    if ( $ans > 0) {
                        $result += $ans;
                    } else {
                        $result = 0;
                        break;
                    }
                }
                $mark += $result;
            }
        }
        $mark = round($mark);
        $testResult = new TestResult();
        $testResult->test_id = $request->get('test_id');
        $testResult->user_id = $this->user->id;
        $testResult->mark = $mark;
        $testResult->save();

        return redirect()->route('student-tests');
    }
}
