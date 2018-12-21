<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grupo;
use App\Repositories\GrupoRepository;
use App\Repositories\PermissaoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GrupoRepository $grupoRepository)
    {
        $this->viewData['grupos'] = $grupoRepository->model()->paginate(10);
        return view('Admin.Grupos.index', $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PermissaoRepository $permissaoRepository)
    {
        $this->viewData['permissoes'] = $permissaoRepository->all();
        return view("Admin.Grupos.create", $this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, GrupoRepository $grupoRepository, Grupo $grupo)
    {
        if ($grupo = $grupoRepository->create($request->only($grupo->getFillable()))) {
            $grupo->permissoes()->sync($request->route);
            flash("O Grupo foi criado com sucesso!")->success();
            return redirect()->route('admin.grupos.index');
        }
        flash('Não foi possível criar o grupo');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, GrupoRepository $grupoRepository, PermissaoRepository $permissaoRepository)
    {
        $grupo = $grupoRepository->find($id);
        $this->viewData['permissoes'] = $permissaoRepository->all();
        $this->viewData['grupos_permissoes'] = $grupo->permissoes()->pluck('id')->toArray();
        $this->viewData['grupo'] = $grupo;
        return view('Admin.Grupos.edit', $this->viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, GrupoRepository $grupoRepository)
    {
        if ($request->isMethod('put')) {
            $grupos_permissoes = [];
            foreach ($request->route as $keys => $value) {
                $grupos_permissoes[] = $value;
            }
            if ($grupoRepository->find($id)->update($request->all())) {
                $grupoRepository->find($id)->permissoes()->sync($grupos_permissoes);
                flash('Permissões do Grupo atualziadas com sucesso!')->success();
                return redirect()->route('admin.grupos.index');
            }
        }
        flash("Não foi possível atualizar as permissões do grupo")->error();
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
