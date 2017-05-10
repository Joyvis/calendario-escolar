@extends('layouts.app')
@section('content')
	<h3>Novo Aluno</h3>
	{!! Form::open(['route' => 'student.store', 'class' => 'form-horizontal form-label-left', 'data-parsley-validate' => ""]) !!}
		@include('students._form')
	{!! Form::close() !!}
@endsection