@extends('layouts.reports')
@section('css')
	<style type="text/css">
		table * {
			font-size: 10px;
		}
	</style>
@endsection
@section('content')
	<h1>Apuração de Frequencia {{ isset($month) ? " - Mês {$months[$month]} / " . date('Y') : '' }}</h1>	
	<hr>
	<form method="get">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Turma</label>	
				<div class="col-md-12">
					{!! Form::select('classroom_id', \App\Classroom::pluck('name', 'id')->prepend('SELECIONE', ''), old('classroom_id', isset($classroom->id) ? $classroom->id : ''), ['class' => 'form-control', 'required' => 'required']) !!}	
				</div>		
			</div>
			<div class="form-group">
				<label>Mês</label>	
				<div class="col-md-12">
					<select name="month" class="form-control" required="required">
						<option value="">SELECIONE UM MÊS</option>
						<option value="1">Janeiro</option>
						<option value="2">Fevereiro</option>
						<option value="3">Março</option>
						<option value="4">Abril</option>
						<option value="5">Maio</option>
						<option value="6">Junho</option>
						<option value="7">Julho</option>
						<option value="8">Agosto</option>
						<option value="9">Setembro</option>
						<option value="10">Outubro</option>
						<option value="11">Novembro</option>
						<option value="12">Dezembro</option>
					</select>	
				</div>		
			</div>
			<hr>
			<div class="form-group">		
				<div class="col-md-12">
					<button type="submit" href="#" id="select-student-submit" class="btn btn-success">BUSCAR</button>
					<a href="{{route('user.index')}}" class="btn btn-info" >VOLTAR</a>					
				</div>		
			</div>
		</div>
		<div class="col-md-3 col-md-offset-3">
			<table class="table table-bordered">
				<tr>
					<td class="text-center"><b> . </b></td>
					<td><b> Presença </b></td>
				</tr>
				<tr>
					<td class="text-center"><b> F </b></td>
					<td><b> Falta Não Justificada </b></td>
				</tr>
				<tr>
					<td class="text-center"><b> A </b></td>
					<td><b> Atestado Médico </b></td>
				</tr>
				<tr>
					<td class="text-center"><b> J </b></td>
					<td><b> Falta Justificada </b></td>
				</tr>
				<tr>
					<td class="text-center"><b> P </b></td>
					<td><b> Paralização </b></td>
				</tr>
				<tr>
					<td class="text-center"><b> G </b></td>
					<td><b> Greve </b></td>
				</tr>
				<tr>
					<td class="text-center"><b> I </b></td>
					<td><b> Intempérie </b></td>
				</tr>
			</table>
		</div>
	</div>
	</form>	
	<div class="row">
	@if(isset($classroom))
	<div class="col-md-12">
		@include('classrooms.reports._absences')
	</div>
	@endif
	</div>
@endsection