<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 03 Jun 2019 22:59:07 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Question
 * 
 * @property int $id
 * @property string $title
 * @property int $test_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Test $test
 *
 * @package App\Models
 */
class Question extends Eloquent
{
	protected $casts = [
		'test_id' => 'int'
	];

	protected $fillable = [
		'title',
		'test_id'
	];

	public function test()
	{
		return $this->belongsTo(\App\Models\Test::class);
	}
}
