<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = RoleUser::where('user_id', $user->id)->first();
        $data = [
            'title' => 'Головна',
            'role' => $role
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
        };
        return view('admin.index.index')->with(['data' => $data]);
    }
}
