<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Course;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if($user->ready == 0) {
            Session::put('FailedReady', 'Ваш аккаунт очікує активації!');
            return redirect('/logout');
        }
        $role = RoleUser::where('user_id', $user->id)->first();
        $data = [
            'title' => 'Головна',
            'role' => $role,
            'userName' => explode(' ',$user->name)
        ];
        switch($role->role_id) {
            case \App\Models\User::ROLE_ADMIN :
                $data['users'] = User::query()
                    ->select(['id', 'name', 'email', 'ready', 'created_at'])
                    ->orderBy('created_at', 'desc');


                if($request->get('email')) {
                    $data['users']->where('email', $request->get('email'));
                }

                if($request->get('status')) {
                    $data['users']->whereIn('ready', $request->get('status'));
                }

                $data['users'] = $data['users']->get();

            break;

            case User::ROLE_TEACHER:
                $data['courses'] = Course::query()
                    ->with('category')
                    ->where('creater_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc');


                if($request->get('name')) {
                    $data['courses']->where('title', $request->get('name'));
                }
                if($request->get('category')) {
                    $data['courses']->where('category_id', $request->get('category'));
                }

                $data['courses'] = $data['courses']->get();
                $data['categories'] = Category::all();
            break;
        };

        return view('admin.index.index')->with(['data' => $data]);
    }
}
