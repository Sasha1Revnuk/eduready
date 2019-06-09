<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 05 May 2019 23:54:00 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $courses
 * @property string $img
 * 
 * @property \Illuminate\Database\Eloquent\Collection $comments
 * @property \Illuminate\Database\Eloquent\Collection $feedback
 * @property \Illuminate\Database\Eloquent\Collection $roles
 *
 * @package App\Models
 */
class User extends Eloquent
{
    const ROLE_ADMIN = 1;
    const ROLE_TEACHER = 2;
    const ROLE_STUDENT = 3;

    const STAUTS_ACTIVE = 1;
    const STAUTS_UNACTIVE = 0;
	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'remember_token',
		'courses',
		'img',
        'group_id',
        'facult_id',
	];

//	public function comments()
//	{
//		return $this->hasMany(\App\Models\Comment::class);
//	}

	public function feedback()
	{
		return $this->hasMany(\App\Models\Feedback::class);
	}

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class)
					->withPivot('id')
					->withTimestamps();
	}

    public function test_results()
    {
        return $this->hasMany(\App\Models\TestResult::class, 'id', 'user_id');
    }

    public static function getTitleGroup($groups, $group_id)
    {
        return $groups[$group_id];
    }
}
