<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 May 2019 21:24:16 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Section
 * 
 * @property int $id
 * @property string $title
 * @property int $course_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Course $course
 * @property \Illuminate\Database\Eloquent\Collection $lessons
 *
 * @package App\Models
 */
class Section extends Eloquent
{
	protected $casts = [
		'course_id' => 'int'
	];

	protected $fillable = [
		'title',
		'course_id'
	];

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class);
	}

	public function lessons()
	{
		return $this->hasMany(\App\Models\Lesson::class);
	}
}
