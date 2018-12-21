@extends('layouts.admin')

@section('h1')
    Permissões
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="mb-3 mt-3">
                <div class="float-left">
                    <h2><i class="mdi mdi-lock mr-2"></i>Permissões de Grupos</h2>
                </div>
                <div class="float-right">
                    <a href="{{ route('admin.grupos.index') }}" class="btn btn-outline-dark btn-lg"><i class="mdi mdi-account"></i>Grupos</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card-box">
                {{ Form::model($permissoes, ['route' => ['admin.permissoes.update', $grupo_id]]) }}
                {{ Form::hidden('_method', 'PUT') }}
                <div class="row">
                    @foreach($permissoes as $permissao)
                        <div class="col-md-5">
                            <div class="form-group">
                                {{ Form::text('label[]', $permissao->label, [
                                    'class' => 'form-control',
                                ]) }}
                            </div>
                        </div>
                        <div class="col-md-5 text-center">
                            {{ $permissao->route }}
                        </div>
                        <div class="col-md-2">
                            <div class="col-1 text-center offset-1">
                                {{ Form::checkbox($permissao->route, true, false, [
                                    'class' => 'permission',
                                    'data-plugin' => "switchery",
                                    'data-color' => "#1bb99a",
                                    'data-switchery' => "true",
                                    'data-size' => 'small',
                                    'value' => $permissao->id,
                                ]) }}
                            </div>
                        </div>
                    @endforeach
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