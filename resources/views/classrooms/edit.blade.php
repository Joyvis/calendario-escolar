@extends('layouts.app')
@section('content')
	<h3>Novo Turma</h3>
	{!! Form::model($classroom, ['route' => ['classroom.update', $classroom->id], 'method' => 'patch', 'class' => 'form-horizontal form-label-left']) !!}
		@include('classrooms._form')
	{!! Form::close() !!}
@endsection