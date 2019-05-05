<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 05 May 2019 23:07:55 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Event
 * 
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $time
 * @property int $day
 * @property string $month
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 * max:85
 */
class Event extends Eloquent
{
	protected $casts = [
		'day' => 'int'
	];

	protected $fillable = [
		'title',
		'text',
		'time',
		'day',
		'month'
	];
}
