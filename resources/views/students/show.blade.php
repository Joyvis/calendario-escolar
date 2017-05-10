@extends('layouts.app')
@section('content')
	<h3>Visualizar Aluno</h3>
	<p><b>Nome:</b> {{ $student->name }}</p>
	<p><b>Email:</b> {{ $student->email }}</p>	
@endsection