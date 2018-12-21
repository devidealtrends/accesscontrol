<?php

namespace App\Repositories;

use App\Models\User;

class UsuarioRepository extends BaseRepository
{
    public $model;

    public function __construct(User $User)
    {
        $this->model = $User;
    }
}