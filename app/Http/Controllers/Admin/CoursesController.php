<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CoursesController extends Controller
{
    public function add()
    {
        $user = Auth::user();
        if($user->ready == 0) {
            Session::put('FailedReady', 'Ваш аккаунт очікує активації!');
            return redirect('/logout');
        }
        $role = RoleUser::where('user_id', $user->id)->first();
        if ($role->role_id != User::ROLE_TEACHER) {
            return redirect()->back();
        }
        $data = [
            'title' => 'Додати курс',
            'role' => $role,
            'userName' => explode(' ',$user->name),
            'action' => 'add'
        ];

        return view('admin.cources.form')->with(['data' => $data]);
    }
}
