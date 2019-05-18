<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 18 May 2019 19:17:16 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Faculty
 * 
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $specialisations
 *
 * @package App\Models
 */
class Faculty extends Eloquent
{
	protected $fillable = [
		'title'
	];

	public function specialisations()
	{
		return $this->hasMany(\App\Models\Specialisation::class);
	}
}
