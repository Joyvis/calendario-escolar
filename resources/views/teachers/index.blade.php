@extends('layouts.app')
@section('content')
	<h3>Professors</h3>
	{!! Html::link(route('teacher.create'), 'Novo Professor', ['class' => 'btn btn-success']) !!}
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nome</th>
			<th>Email</th>	
			<th>Telefone</th>						
			<th class="text-right">Ações</th>
		</thead>
		<tbody>
			@forelse ($teachers as $teacher)
				<tr>
			    	<td>{{ $teacher->id }}</td>
			    	<td>{{ $teacher->name }}</td>
			    	<td>{{ $teacher->email }}</td>
			    	<td>{{ $teacher->phone }}</td>
			    				    	
			    	<td class="text-right">
			    		@include('partials.actions', ['route' => 'teacher', 'routeId' => $teacher->id])
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