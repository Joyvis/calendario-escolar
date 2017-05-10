<div class="col-md-6">
	<div class="form-group">
		<label>Turma</label>	
		<div class="col-md-12">
			{!! Form::select('classroom_id', \App\Classroom::pluck('name', 'id')->prepend('SELECIONE', ''), old('classroom_id'), ['class' => 'form-control']) !!}	
		</div>		
	</div>
	<div class="form-group">
		<label>Aluno</label>	
		<div class="col-md-12">
			<select name="student_id" class="form-control">
				<option value="">SELECIONE UMA TURMA</option>
			</select>	
		</div>		
	</div>
	<hr>
	<div class="form-group">		
		<div class="col-md-12">
			<a href="#" id="select-student-submit" class="btn btn-success">BUSCAR</a>
			<a href="{{route('user.index')}}" class="btn btn-info" >VOLTAR</a>
			{{ csrf_field() }}
		</div>		
	</div>
</div>