@extends('layouts.app')
@section('content')
	<h3>Alunos</h3>
	{!! Html::link(route('student.create'), 'Novo Aluno', ['class' => 'btn btn-success']) !!}
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nome</th>
			<th>Turma</th>
			<th>Email</th>	
			<th>Telefone</th>						
			<th class="text-right">Ações</th>
		</thead>
		<tbody>
			@forelse ($students as $student)
				<tr>
			    	<td>{{ $student->id }}</td>
			    	<td>{{ $student->name }}</td>
			    	<td>{{ $student->classroom->name }}</td>
			    	<td>{{ $student->email }}</td>
			    	<td>{{ $student->phone }}</td>
			    				    	
			    	<td class="text-right">
			    		@include('partials.actions', ['route' => 'student', 'routeId' => $student->id])
			    	</td>
			    </tr>
			@empty
				<tr>
					<td colspan="5">Nenhum estudante cadastrado.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
@endsection