@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
	{!! Form::label('name', 'Nome:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
	<div class="col-md-6 col-sm-6 col-xs-12">
		{!! Form::text('name', old('name'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('email', 'Email:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
	<div class="col-md-6 col-sm-6 col-xs-12">
		{!! Form::email('email', old('email'), ['class' => 'form-control col-md-7 col-xs-12']) !!}
		
	</div>
</div>
<div class="form-group">
	{!! Form::label('phone', 'Telefone:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
	<div class="col-md-6 col-sm-6 col-xs-12">
		{!! Form::text('phone', old('phone'), ['class' => 'form-control col-md-7 col-xs-12']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('classroom_id', 'Turma:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
	<div class="col-md-6 col-sm-6 col-xs-12">
		{!! Form::select('classroom_id', \App\Classroom::pluck('name', 'id')->prepend('SELECIONE', ''),old('classroom_id'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
	</div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		{!! Form::submit('Salvar Aluno', ['class' => 'btn btn-success']) !!}
	</div>
</div>
