@extends('layouts.app')
@section('content')
	<h3>Novo Professor</h3>
	{!! Form::model($teacher, ['route' => ['teacher.update', $teacher->id], 'method' => 'patch', 'class' => 'form-horizontal form-label-left']) !!}
		@include('teachers._form')
	{!! Form::close() !!}
@endsection