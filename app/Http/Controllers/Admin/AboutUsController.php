<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Filesystem\Filesystem;

class AboutUsController extends Controller
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

    public function index()
    {
        $data = [
            'title' => 'Про нас',
            'role' => $this->role,
            'userName' => explode(' ',$this->user->name),
            'about-us' => AboutUs::first()

        ];
        return view('admin.about-us.form')->with(['data' => $data]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'text' => 'required',
            'id' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $aboutUs = AboutUs::find($request->get('id'));
        $aboutUs->title = $request->get('title');
        $aboutUs->text = $request->get('text');

        if ($request->hasFile('image')) {
            $file = new Filesystem;
            $file->cleanDirectory(public_path() . '/img/about_us');
            $file = $request->file('image');
            $file->move(public_path() . '/img/about_us/',$file->getClientOriginalName());
            $aboutUs->img = $file->getClientOriginalName();

        }

        $aboutUs->update();
        return redirect()->route('admin-about-us');
    }
}
