<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 04 May 2019 22:19:21 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AboutUs
 * 
 * @property int $id
 * @property string $title
 * @property string $img
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AboutUs extends Eloquent
{
	protected $table = 'about_us';

	protected $fillable = [
		'title',
		'img',
		'text'
	];
}
