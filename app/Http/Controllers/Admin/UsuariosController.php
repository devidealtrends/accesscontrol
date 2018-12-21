<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUsuarios;
use App\Http\Requests\UpdateUsuarios;
use App\Models\Grupo;
use App\Models\StatusUser;
use App\Models\Usuario;
use App\Repositories\UsuarioRepository;
use App\Http\Controllers\Controller;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Grupo $grupo, StatusUser $status_users)
    {
        $this->viewData['grupos'] = $grupo->pluck('titulo', 'id');
        $this->viewData['status_users'] = $status_users->pluck('titulo', 'id');
        return view('Admin.Alunos.create', $this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarios $request, UsuarioRepository $userRepository, Usuario $user)
    {
        if ($request->isMethod('post')) {
            $request->password = bcrypt($request->password);
            if ($user = $userRepository->create($request->only($user->getFillable()))) {
                $user->grupo()->create($request->grupos);
                flash('Usuário adicionado com sucesso!')->success();
                return redirect()->route('admin.dashboard');
            }
            flash('Não foi possível adicionar o usuário')->error();
            return redirect()->back();
        }
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
    public function edit($id, UsuarioRepository $userRepository, Grupo $grupo, StatusUser $statusUser)
    {
        $this->viewData['aluno'] = $userRepository->find($id);
        $this->viewData['grupos'] = $grupo->pluck('titulo', 'id');
        $this->viewData['status_users'] = $statusUser->pluck('titulo', 'id');

        return view('Admin.Alunos.edit', $this->viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarios $request, $id, UsuarioRepository $userRepository, Usuario $user)
    {
        if ($request->isMethod('put')) {
            $request->password = bcrypt($request->password);
            if ($userRepository->find($id)->update($request->only($user->getFillable()))) {
                $userRepository->find($id)->grupo()->update($request->grupos);
                flash('Usuário atualizado com sucesso!')->success();
                return redirect()->back();
            }
            flash('Não foi possível atualizar os dados do usuário')->error();
            return redirect()->back();
        }
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
