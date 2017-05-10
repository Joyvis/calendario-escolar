@extends('layouts.app')
@section('content')
	<h3>Novo Aluno</h3>
	{!! Form::model($student, ['route' => ['student.update', $student->id], 'method' => 'patch', 'class' => 'form-horizontal form-label-left']) !!}
		@include('students._form')
	{!! Form::close() !!}
@endsection