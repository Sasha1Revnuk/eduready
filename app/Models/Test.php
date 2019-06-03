<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 31 May 2019 22:45:54 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Test
 * 
 * @property int $id
 * @property string $title
 * @property int $cource_id
 * @property int $active
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Test extends Eloquent
{
	protected $casts = [
		'cource_id' => 'int',
		'active' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'title',
		'cource_id',
		'active',
		'user_id'
	];

    public function questions()
    {
        return $this->hasMany(\App\Models\Question::class);
    }
}
