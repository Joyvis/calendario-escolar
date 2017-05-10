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
	{!! Form::label('year', 'Ano:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
	<div class="col-md-6 col-sm-6 col-xs-12">
		{!! Form::text('year', old('year'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
	</div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		{!! Form::submit('Salvar Turma', ['class' => 'btn btn-success']) !!}
	</div>
</div>
