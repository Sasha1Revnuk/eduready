<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 18 May 2019 20:15:17 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Group
 * 
 * @property int $id
 * @property string $title
 * @property int $specialise_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Specialisation $specialisation
 *
 * @package App\Models
 */
class Group extends Eloquent
{
	protected $casts = [
		'specialise_id' => 'int'
	];

	protected $fillable = [
		'title',
		'specialise_id'
	];

	public function specialisation()
	{
		return $this->belongsTo(\App\Models\Specialisation::class, 'specialise_id');
	}
}
