@extends('layouts.admin')

@section('h1')
    Adicionar Aluno
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            {{ Form::open(['route' => 'admin.alunos.store']) }}
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