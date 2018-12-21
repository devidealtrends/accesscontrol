<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdatePermissoes;
use App\Repositories\PermissaoRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class PermissoesController extends Controller
{
    /**
     * @var PermissaoRepository
     */
    public $permissoes;

    /**
     * PermissoesController constructor.
     * @param PermissaoRepository $permissaoRepository
     */
    public function __construct(PermissaoRepository $permissaoRepository)
    {
        $this->permissoes = $permissaoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PermissaoRepository $permissaoRepository)
    {
        $this->viewData['permissoes'] = $this->store($permissaoRepository->all());
        return view('Admin.Permissoes.index', $this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($permissoes)
    {
        foreach (Route::getRoutes() as $route) {
            if (stripos($route->getName(), 'admin') !== false) {
                $rotas[] = $route->getName();
            }
        }
        if (count($rotas) > $permissoes->count()) {
            $permissoes = $this->permissoes->sincronizaRotas($rotas);
            flash('Novas rotas foram adicionadas às permissões de grupos')->success();
            return $permissoes;
        }
        return $permissoes;
    }

    /**
     * @param UpdatePermissoes $updatePermissoes
     */
    public function update(UpdatePermissoes $updatePermissoes)
    {
        if ($updatePermissoes->isMethod('post')) {
            $this->permissoes->atualizaTodos($updatePermissoes->all());
            flash('Permissões atualizadas com sucesso')->success();
            return redirect()->back();
        }
        flash('Não foi possível atualizar as permissões')->error();
        return redirect()->back();
    }

}
