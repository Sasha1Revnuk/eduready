<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 04 May 2019 22:20:15 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $courses
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $fillable = [
		'title'
	];

	public function courses()
	{
		return $this->hasMany(\App\Models\Course::class);
	}
}
