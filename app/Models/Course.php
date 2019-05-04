<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 04 May 2019 22:19:21 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Course
 * 
 * @property int $id
 * @property string $title
 * @property string $img
 * @property string $description
 * @property int $category_id
 * @property int $creater_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Category $category
 * @property \Illuminate\Database\Eloquent\Collection $feedback
 * @property \Illuminate\Database\Eloquent\Collection $sections
 *
 * @package App\Models
 */
class Course extends Eloquent
{
	protected $casts = [
		'category_id' => 'int',
		'creater_id' => 'int'
	];

	protected $fillable = [
		'title',
		'img',
		'description',
		'category_id',
		'creater_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function feedback()
	{
		return $this->hasMany(\App\Models\Feedback::class);
	}

	public function sections()
	{
		return $this->hasMany(\App\Models\Section::class);
	}
}
