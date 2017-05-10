@extends('layouts.app')
@section('content')
	<h3>Turmas</h3>
	{!! Html::link(route('classroom.create'), 'Nova Turma', ['class' => 'btn btn-success']) !!}
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nome</th>
			<th>Ano</th>						
			<th class="text-right">Ações</th>
		</thead>
		<tbody>
			@forelse ($classrooms as $classroom)
				<tr>
			    	<td>{{ $classroom->id }}</td>
			    	<td>{{ $classroom->name }}</td>
			    	<td>{{ $classroom->year }}</td>
			    				    	
			    	<td class="text-right">
			    		@include('partials.actions', ['route' => 'classroom', 'routeId' => $classroom->id])
			    	</td>
			    </tr>
			@empty
				<tr>
					<td colspan="5">Nenhum usuário cadastrado.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
@endsection