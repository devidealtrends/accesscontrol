<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 17 Dec 2018 18:49:33 +0000.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $nome
 * @property string $sobrenome
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property int $status_user_id
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\StatusUser $status_user
 * @property \Illuminate\Database\Eloquent\Collection $grupos
 * @property \Illuminate\Database\Eloquent\Collection $carreiras
 * @property \Illuminate\Database\Eloquent\Collection $formacos
 * @property \Illuminate\Database\Eloquent\Collection $videos
 *
 * @package App\Models
 */
class Usuario extends Authenticatable
{
    use Notifiable;

    const ATIVO = 1;
    const INATIVO = 2;

    protected $casts = [
        'status_user_id' => 'int'
    ];

    protected $dates = [
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'token'
    ];

    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'email_verified_at',
        'password',
        'status_user_id',
        'remember_token',
        'token'
    ];

    public function setTokenAttribute($token)
    {

    }

    public function status_user()
    {
        return $this->belongsTo(\App\Models\StatusUser::class);
    }

    public function grupo()
    {
        return $this->hasOne(\App\Models\GrupoUser::class, 'user_id');
    }

    public function grupos()
    {
        return $this->belongsToMany(\App\Models\Grupo::class, 'grupos_users')->withPivot('id');
    }

    public function carreiras()
    {
        return $this->belongsToMany(\App\Models\Carreira::class, 'users_carreiras');
    }

    public function formacoes()
    {
        return $this->belongsToMany(\App\Models\Formacao::class, 'users_formacoes', 'user_id', 'formacao_id');
    }

    public function videos()
    {
        return $this->belongsToMany(\App\Models\Video::class, 'users_videos');
    }

    public function getFullName()
    {
        return "{$this->nome} {$this->sobrenome}";
    }

    public function getAlunosSearch($request)
    {
        return $this->where('nome', 'like', "%{$request['search']}%")
            ->orWhere('sobrenome', 'like', "%{$request['search']}%")
            ->orWhere('email', 'like', "%{$request['search']}%");
    }
}
