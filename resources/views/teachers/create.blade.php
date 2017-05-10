@extends('layouts.app')
@section('content')
	<h3>Novo Professor</h3>
	{!! Form::open(['route' => 'teacher.store', 'class' => 'form-horizontal form-label-left', 'data-parsley-validate' => ""]) !!}
		@include('teachers._form')
	{!! Form::close() !!}
@endsection