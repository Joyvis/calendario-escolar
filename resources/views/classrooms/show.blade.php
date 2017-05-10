@extends('layouts.app')
@section('content')
	<h3>Visualizar Turma</h3>
	<p><b>Nome:</b> {{ $classroom->name }}</p>
	<p><b>Ano:</b> {{ $classroom->year }}</p>	
@endsection