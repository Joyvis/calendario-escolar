@extends('layouts.app')
@section('content')
	<h3>Novo Turma</h3>
	{!! Form::open(['route' => 'classroom.store', 'class' => 'form-horizontal form-label-left', 'data-parsley-validate' => ""]) !!}
		@include('classrooms._form')
	{!! Form::close() !!}
@endsection