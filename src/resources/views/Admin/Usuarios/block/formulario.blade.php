<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('nome', 'Nome *') }}
            {{ Form::text('nome', null, [
                'id' => 'nome',
                'class' => 'form-control',
            ]) }}
        </div>
        <div class="form-group">
            {{ Form::label('sobrenome', 'Sobrenome *') }}
            {{ Form::text('sobrenome', null, [
                'id' => 'sobrenome',
                'class' => 'form-control',
            ]) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-mail *') }}
            {{ Form::email('email', null, [
                'id' => 'email',
                'class' => 'form-control',
            ]) }}
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('status_user_id', 'Status *') }}
            {{ Form::select('status_user_id', $status_users, null, [
                'id' => 'status_user_id',
                'class' => 'select2-cont form-control',
                'placeholder' => '-- Selecione --'
            ]) }}
        </div>
        <div class="form-group">
            {{ Form::label('grupo_id', 'Grupo *') }}
            {{ Form::select('grupos[grupo_id]', $grupos, null, [
                'id' => 'grupo_id',
                'class' => 'select2-cont form-control',
                'placeholder' => '-- Selecione --'
            ]) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Senha *') }}
            {{ Form::password('password', [
                'id' => 'password',
                'class' => 'form-control',
            ]) }}
        </div>
        <div class="form-group">
            {{ Form::label('password_confirmation', 'Confirmar Senha *') }}
            {{ Form::password('password_confirmation', [
                'id' => 'password_confirmation',
                'class' => 'form-control',
            ]) }}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::submit('Salvar', [
                'class' => 'btn btn-outline-primary btn-lg mt-3 float-right'
            ]) }}
        </div>
    </div>
</div>

<div class="clearfix"></div>
