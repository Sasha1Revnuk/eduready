<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advantage;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdvantagesController extends Controller
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

        if ($this->role->role_id != User::ROLE_ADMIN) {
            return redirect()->back();
        }
    }

    public function getFlatIcons()
    {
        return [
            'student' => 'flaticon-student',
            'book' => 'flaticon-book',
            'earth' => 'flaticon-earth'
        ];

    }
    public function index()
    {
        $data = [
            'title' => 'Переваги',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'advantages' => Advantage::all()

        ];
        return view('admin.advantages.index')->with(['data' => $data]);
    }

    public function add()
    {
        $data = [
            'title' => 'Додати перевагу',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'flatIcons' => $this->getFlatIcons(),
            'action' => 'add',

        ];
        return view('admin.advantages.form')->with(['data' => $data]);
    }
    public function edit(Request $request)
    {
        $data = [
            'title' => 'Редагувати перевагу',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'flatIcons' => $this->getFlatIcons(),
            'action' => 'edit',
            'advantage' => Advantage::find($request->get('id'))

        ];
        return view('admin.advantages.form')->with(['data' => $data]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'text' => 'required',
            'flatIcon' => 'required',
            'action' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->get('action') == 'add') {
            $advantage = new Advantage();
        } else {
            $advantage = Advantage::find($request->get('id'));
        }

        $advantage->title = $request->get('title');
        $advantage->text = $request->get('text');
        $advantage->icon = $request->get('flatIcon');

        if ($request->get('action') == 'add') {
            $advantage->save();
        } else {
            $advantage->update();
        }

        return redirect()->route('admin-advantages');
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $advantage = Advantage::find($request->get('id'));
        $advantageName = $advantage->title;
        $advantage->delete();
        Session::put('advantageDelete', 'Перевага ' . $advantageName . ' успішно видалена!');
        return redirect()->route('admin-advantages');
    }
}
