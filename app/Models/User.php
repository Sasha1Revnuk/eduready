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
		'img'
	];

	public function comments()
	{
		return $this->hasMany(\App\Models\Comment::class);
	}

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
}
