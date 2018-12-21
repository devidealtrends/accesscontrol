<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 17 Dec 2018 18:48:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Grupo
 *
 * @property int $id
 * @property string $titulo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $permissoes
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Grupo extends Eloquent
{
    const TUTORES = 1;
    const ALUNOS = 2;

    protected $fillable = [
        'titulo'
    ];

    public function permissoes()
    {
        return $this->belongsToMany(\App\Models\Permissao::class, 'grupos_permissoes', 'grupo_id', 'permissao_id');
    }

    public function users()
    {
        return $this->belongsToMany(\App\Models\Usuario::class, 'grupos_users')->withPivot('id');
    }

    /**
     * Valida as permissões e rotas para o usuário logado
     * @param $request
     * @return bool
     */
    public function hasPermissao($request)
    {
        foreach ($this->permissoes()->get() as $permissao) {
            if ($permissao->route === $request->route()->getName()) {
                return true;
            }
        }
        return false;
    }

}
