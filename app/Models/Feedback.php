<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 04 May 2019 22:19:21 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Feedback
 * 
 * @property int $id
 * @property string $text
 * @property int $user_id
 * @property int $course_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Course $course
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Feedback extends Eloquent
{
	protected $table = 'feedbacks';

	protected $casts = [
		'user_id' => 'int',
		'course_id' => 'int'
	];

	protected $fillable = [
		'text',
		'user_id',
		'course_id'
	];

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
