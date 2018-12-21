@extends('layouts.admin')

@section('h1')
    Adicionar um novo Grupo
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="mb-3 mt-3">
                <div class="float-left">
                    <h2><i class="mdi mdi-lock mr-2"></i>Adicionar Grupo</h2>
                </div>
                <div class="float-right">
                    <a href="{{ route('admin.grupos.index') }}" class="btn btn-outline-dark btn-lg"><i class="mdi mdi-account"></i>Grupos</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card-box">
                {{ Form::open(['route' => 'admin.grupos.store']) }}
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('titulo', 'Nome do grupo *') }}
                            {{ Form::text('titulo', null, [
                                'id' => 'titulo',
                                'class' => 'form-control',
                            ]) }}
                        </div>
                    </div>

                    <div class="col-md-12">
                    <div class="clearfix"></div>
                    <h4>Permissões do Grupo</h4>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Label</th>
                            <th>Rota</th>
                            <th class="text-center">Permissão</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissoes as $permissao)
                            <tr>
                                <td>{{ $permissao->label }}</td>
                                <td>{{ $permissao->route }}</td>
                                <td>
                                    <div class="text-center offset-1">
                                        {{ Form::checkbox("route[]", $permissao->id, false, [
                                            'class' => 'permission',
                                            'data-plugin' => "switchery",
                                            'data-color' => "#1bb99a",
                                            'data-switchery' => "true",
                                            'data-size' => 'small',
                                        ]) }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12">
                        {{ Form::submit('Salvar', [
                            'class' => 'btn btn-outline-success btn-lg float-right',
                        ]) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>

    </div>

@endsection

@section('css')
@endsection

@section('scripts')
@endsection