<?php

namespace App\Http\Controllers\Auth;

use App\Models\Faculty;
use App\Models\Group;
use App\Models\RoleUser;
use App\Models\Specialisation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        return view('auth.register', compact('faculties'));
    }

    public function save(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'faculty' => 'required'
        ]);
        if(isset($data['faculty']) == false || $data['faculty'] == 0 || $data['faculty'] == '0' ) {
            return redirect()->route('registration');
        }
        //dd($data);
        if (isset($data['teacher']) == false) {
            $validator = Validator::make($data, [
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'groups' => 'required',
            ]);

            if(isset($data['groups']) == false || $data['groups'] == 0 || $data['groups'] == '0' ) {
                return redirect()->route('registration');
            }
        }
        if($validator->fails()) {
            return redirect()->route('registration')->withErrors($validator);
        }

        $user = new User();
        $user->name = $data['name'] . ' ' . $data['surname'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        if (isset($data['teacher']) == false) {
            $user->group_id = $data['groups'];
        } else {
            $user->facult_id = $data['faculty'];

        }
        $user->ready = 0;
        $user->save();
        File::makeDirectory(public_path() . '/img/users/' . $user->id);
        File::copy(public_path() . '/img/users/' . 'user.jpg', public_path() . '/img/users/' . $user->id . '/user.jpg');
        $newRole = new RoleUser();
        $newRole->user_id = $user->id;
        $newRole->role_id = User::ROLE_STUDENT;;
        $newRole->save();
        return redirect()->route('main');
    }

    public function getAjaxFaculty(Request $request)
    {

        if (!$request->get('faculty')) {
            $html = '<option value=""></option>';
        } else {
            $html = '<option value="0">--</option>';
            $faculties = Specialisation::where('faculty_id', $request->get('faculty'))->get();
            foreach ($faculties as $faculty) {
                $html .= '<option value="'.$faculty->id.'">'.$faculty->title.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }
    public function getAjaxGroups(Request $request)
    {
        if (!$request->get('specialisation')) {
            $groupss = '<option value=""></option>';
        } else {
            $groupss = '';
            $groups = Group::where('specialise_id', $request->get('specialisation'))->get();
            foreach ($groups as $group) {
                $groupss .= '<option value="'.$group->id.'">'.$group->title.'</option>';
            }
        }

        return response()->json(['groups' => $groupss]);
    }

}
