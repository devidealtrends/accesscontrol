<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 17 Dec 2018 13:16:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Permisso
 * 
 * @property int $id
 * @property int $permissao_id
 * @property string $label
 * @property string $route
 * @property int $exibe_menu
 * @property string $icon
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Permissao $permisso
 * @property \Illuminate\Database\Eloquent\Collection $grupos
 * @property \Illuminate\Database\Eloquent\Collection $permissos
 *
 * @package App\Models
 */
class Permissao extends Eloquent
{
	protected $table = 'permissoes';

	protected $casts = [
		'permissao_id' => 'int',
		'exibe_menu' => 'int'
	];

	protected $fillable = [
		'permissao_id',
		'label',
		'route',
		'exibe_menu',
		'icon'
	];

	public function permissao()
	{
		return $this->belongsTo(\App\Models\Permissao::class, 'permissao_id');
	}

	public function grupos()
	{
		return $this->belongsToMany(\App\Models\Grupo::class, 'grupos_permissoes', 'permissao_id');
	}

	public function permissoes()
	{
		return $this->hasMany(\App\Models\Permissao::class, 'permissao_id');
	}
}
