@extends('layouts.admin')

@section('h1')
    titulo da página
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.permissoes.update']) }}
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 mt-3">
                <div class="float-left">
                    <h2><i class="mdi mdi-lock mr-2"></i>Lista de Permissões</h2>
                </div>
                <div class="float-right">
                    {{ Form::submit('Salvar', [
                        'class' => 'btn btn-outline-success btn-lg'
                    ]) }}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card-box">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Label</th>
                        <th>Rota</th>
                        <th>Ícone</th>
                        <th class="text-center">Exibir no menu</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissoes as $permissao)
                        {{ Form::hidden('id[]', $permissao->id) }}
                        <tr>
                            <td>
                                <div class="form-group">
                                    {{ Form::text("label[{$permissao->id}]", $permissao->label, [
                                        'class' => 'form-control'
                                    ]) }}
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    {{ Form::text("route[{$permissao->id}]", $permissao->route, [
                                        'disabled' => true,
                                        'class' => 'form-control'
                                    ]) }}
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    {{ Form::text("icon[{$permissao->id}]", $permissao->icon, [
                                        'class' => 'form-control text-center'
                                    ]) }}
                                </div>
                            </td>
                            <td>
                                <div class="text-center offset-1">
                                    {{ Form::checkbox("exibe_menu[$permissao->id]", null, ($permissao->exibe_menu == 1 ? true : false), [
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
        </div>
        <div class="col-md-12 mb-3">
            <div class="float-right">
                {{ Form::submit('Salvar', [
                    'class' => 'btn btn-outline-success btn-lg'
                ]) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('css')
@endsection

@section('scripts')
@endsection