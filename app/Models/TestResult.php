<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 07 Jun 2019 21:54:55 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TestResult
 * 
 * @property int $id
 * @property int $test_id
 * @property int $user_id
 * @property int $mark
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Test $test
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class TestResult extends Eloquent
{
	protected $casts = [
		'test_id' => 'int',
		'user_id' => 'int',
		'mark' => 'int'
	];

	protected $fillable = [
		'test_id',
		'user_id',
		'mark'
	];

	public function test()
	{
		return $this->belongsTo(\App\Models\Test::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
