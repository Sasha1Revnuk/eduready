<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 04 May 2019 22:19:21 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Lesson
 * 
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $img
 * @property int $section_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Section $section
 * @property \Illuminate\Database\Eloquent\Collection $comments
 *
 * @package App\Models
 */
class Lesson extends Eloquent
{
	protected $casts = [
		'section_id' => 'int'
	];

	protected $fillable = [
		'title',
		'text',
		'img',
		'section_id'
	];

	public function section()
	{
		return $this->belongsTo(\App\Models\Section::class);
	}

	public function comments()
	{
		return $this->hasMany(\App\Models\Comment::class);
	}
}
