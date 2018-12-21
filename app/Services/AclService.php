<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

/**
 * Class AclService
 * @package App\Services
 */
class AclService
{
    /**
     * @var
     * return bolean
     */
    public $acl;

    /**
     * AclService constructor.
     * @param $request
     */
    public function __construct($request)
    {
        if ($user = Auth::user()->grupos()->first()) {
            $this->acl = $user->hasPermissao($request);
        }
    }

    /**
     * @return mixed
     */
    public function getPemissao()
    {
        return $this->acl;
    }
}