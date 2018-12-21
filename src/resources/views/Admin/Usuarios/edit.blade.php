@extends('layouts.admin')

@section('h1')
    Editar Aluno
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            {{ Form::model($aluno, ['route' => ['admin.alunos.update', $aluno->id]]) }}
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::hidden('id') }}
            <div class="card-box">
                @include('Admin.Alunos.block.formulario')
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('idealui/vendor/material-input/css/material-input.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('scripts')
@endsection