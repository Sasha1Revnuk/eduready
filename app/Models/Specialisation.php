<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 18 May 2019 19:43:53 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Specialisation
 * 
 * @property int $id
 * @property string $title
 * @property int $faculty_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Faculty $faculty
 * @property \Illuminate\Database\Eloquent\Collection $groups
 *
 * @package App\Models
 */
class Specialisation extends Eloquent
{
	protected $casts = [
		'faculty_id' => 'int'
	];

	protected $fillable = [
		'title',
		'faculty_id'
	];

	public function faculty()
	{
		return $this->belongsTo(\App\Models\Faculty::class);
	}

	public function groups()
	{
		return $this->hasMany(\App\Models\Group::class, 'specialise_id');
	}
}
