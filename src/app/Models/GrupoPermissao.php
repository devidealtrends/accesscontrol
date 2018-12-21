<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 17 Dec 2018 13:18:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GruposPermisso
 * 
 * @property int $grupo_id
 * @property int $permissao_id
 * 
 * @property \App\Models\Grupo $grupo
 * @property \App\Models\Permissao $permisso
 *
 * @package App\Models
 */
class GrupoPermissao extends Eloquent
{
	protected $table = 'grupos_permissoes';

	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'grupo_id' => 'int',
		'permissao_id' => 'int'
	];

	protected $fillable = [
		'grupo_id',
		'permissao_id'
	];

	public function grupo()
	{
		return $this->belongsTo(\App\Models\Grupo::class);
	}

	public function permisso()
	{
		return $this->belongsTo(\App\Models\Permissao::class, 'permissao_id');
	}
}
