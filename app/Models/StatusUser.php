<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 11 Dec 2018 14:44:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StatusUser
 * 
 * @property int $id
 * @property string $titulo
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class StatusUser extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'titulo'
	];

	public function users()
	{
		return $this->hasMany(\App\Models\Usuario::class);
	}
}
