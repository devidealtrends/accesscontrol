<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Dec 2018 00:47:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GruposUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $grupo_id
 *
 * @property \App\Models\Grupo $grupo
 * @property \App\Models\Usuario $user
 *
 * @package App\Models
 */
class GrupoUser extends Eloquent
{
    public $timestamps = false;

    protected $casts = [
        'user_id' => 'int',
        'grupo_id' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'grupo_id'
    ];

    protected $table = 'grupos_users';

    public function grupo()
    {
        return $this->belongsTo(\App\Models\Grupo::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\Usuario::class);
    }
}
