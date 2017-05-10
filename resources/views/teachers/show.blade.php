@extends('layouts.app')
@section('content')
	<h3>Visualizar Professor</h3>
	<p><b>Nome:</b> {{ $teacher->name }}</p>
	<p><b>Email:</b> {{ $teacher->email }}</p>	
@endsection