<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 04 Jun 2019 22:27:46 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Answer
 * 
 * @property int $id
 * @property string $title
 * @property float $right
 * @property int $question_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Question $question
 *
 * @package App\Models
 */
class Answer extends Eloquent
{
	protected $casts = [
		'right' => 'float',
		'question_id' => 'int'
	];

	protected $fillable = [
		'title',
		'right',
		'question_id'
	];

	public function question()
	{
		return $this->belongsTo(\App\Models\Question::class);
	}

    public function answers()
    {
        return $this->hasMany(\App\Models\Answer::class);
    }
}
