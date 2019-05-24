<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->ready == 0) {
            Session::put('FailedReady', 'Ваш аккаунт очікує активації!');
            return redirect('/logout');
        }
        $role = RoleUser::where('user_id', $user->id)->first();
        if ($role->role_id != User::ROLE_ADMIN) {
            return redirect()->back();
        }
        $categories = Category::all();
        $categories->load('courses');
        $data = [
            'title' => 'Категорії',
            'role' => $role,
            'userName' => explode(' ',$user->name),
            'categories' => $categories
        ];

        return view('admin.categories.index')->with(['data' => $data]);
    }

    public function add()
    {
        $user = Auth::user();
        if($user->ready == 0) {
            Session::put('FailedReady', 'Ваш аккаунт очікує активації!');
            return redirect('/logout');
        }
        $role = RoleUser::where('user_id', $user->id)->first();
        if ($role->role_id != User::ROLE_ADMIN) {
            return redirect()->back();
        }

        $data = [
            'title' => 'Додавання категорію',
            'role' => $role,
            'userName' => explode(' ',$user->name),
        ];

        return view('admin.categories.add')->with(['data' => $data]);
    }

    public function edit($id)
    {
        $user = Auth::user();
        if($user->ready == 0) {
            Session::put('FailedReady', 'Ваш аккаунт очікує активації!');
            return redirect('/logout');
        }
        $role = RoleUser::where('user_id', $user->id)->first();
        if ($role->role_id != User::ROLE_ADMIN) {
            return redirect()->back();
        }

        $data = [
            'title' => 'Додавання категорію',
            'role' => $role,
            'userName' => explode(' ',$user->name),
            'category' => Category::find($id)
        ];

        return view('admin.categories.edit')->with(['data' => $data]);
    }

    public function save(Request $request)
    {
        $category = new Category();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->route('addCategories')->withErrors($validator);
        }

        $category->title = $request->get('name');
        $category->url = $request->get('name');
        $category->save();
        return redirect()->route('categories');
    }

    public function update(Request $request)
    {
        $category = Category::find($request->get('id'));
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->route('editCategories')->withErrors($validator);
        }
        $category->title = $request->get('name');
        $category->url = $request->get('name');
        $category->update();
        return redirect()->back();
    }

    public function delete($id)
    {
        $user = Auth::user();
        if($user->ready == 0) {
            Session::put('FailedReady', 'Ваш аккаунт очікує активації!');
            return redirect('/logout');
        }
        $role = RoleUser::where('user_id', $user->id)->first();
        if ($role->role_id != User::ROLE_ADMIN) {
            return redirect()->back();
        }

        $category = Category::find($id);
        $category->delete();

        return redirect()->back();
    }
}
