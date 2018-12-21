@extends('layouts.admin')

@section('h1')
    Grupos
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="mb-3 mt-3">
                <div class="float-left">
                    <h2><i class="mdi mdi-lock mr-2"></i>Grupos e permissões</h2>
                </div>
                <div class="float-right">
                    <a href="{{ route('admin.grupos.create') }}" class="btn btn-outline-success btn-lg"><i class="mdi mdi-plus"></i>Adicionar Grupo</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card-box">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th width="40%">Nome</th>
                        <th width="10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($grupos as $grupo)
                        <tr>
                            <td>{{ $grupo->id }}</td>
                            <td>{{ $grupo->titulo }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.grupos.edit', $grupo->id) }}" class="btn btn-warning" data-toggle="tooltip" title="Editar permissões"><i class="mdi mdi-lock-open"></i> Editar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-12">
            {{ $grupos->appends(request()->query())->links() }}
        </div>
        <div class="col-md-12 mb-3">
            Página {{$grupos->currentPage()}} de {{$grupos->lastPage()}}, mostrando {{$grupos->count()}} resultados de {{$grupos->total()}} no total
        </div>

    </div>

@endsection

@section('css')
@endsection

@section('scripts')
@endsection