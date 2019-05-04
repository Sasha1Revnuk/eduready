<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 04 May 2019 22:19:21 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Comment
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $text
 * @property int $user_id
 * @property int $lesson_id
 * @property int $parent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Lesson $lesson
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Comment extends Eloquent
{
	protected $casts = [
		'user_id' => 'int',
		'lesson_id' => 'int',
		'parent_id' => 'int'
	];

	protected $fillable = [
		'name',
		'email',
		'subject',
		'text',
		'user_id',
		'lesson_id',
		'parent_id'
	];

	public function lesson()
	{
		return $this->belongsTo(\App\Models\Lesson::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
