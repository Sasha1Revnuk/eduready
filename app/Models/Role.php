<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 19 May 2019 21:42:17 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Role extends Eloquent
{
	protected $fillable = [
		'title'
	];

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class)
					->withPivot('id')
					->withTimestamps();
	}
}
