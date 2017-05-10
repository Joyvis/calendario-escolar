@include('partials.functions')
<h3 style="padding-top: 0; margin-top: 0">Turma {{ $classroom->name }}</h3>
<table class="table table-striped">
	<thead>
		<th>NUM</th>
		<th>ESTUDANTE</th>		
		@php
			$final = GetNumeroDias('01');
		@endphp

		@for($i = 1; $i <= $final; $i++)
			<th>{{ $i }}</th>
		@endfor

		<th>FALTAS JUS/ATES</th>
		<th>FALTAS NJ</th>
		<th>TOTAL FALTAS</th>
	
	</thead>
	<tbody>
		@foreach($classroom->students as $student)
			<tr>
				<td>{{$student->id}}</td>
				<td>{{$student->name}}</td>
				
				@php
					$typeAJ = 0;
					$typeNJ = 0;					
					$absencesObj = \App\Absence::where(DB::raw('YEAR(date)'), date('Y'))->where(DB::raw('MONTH(date)'), $month)->where('student_id', $student->id)->get();
					$absences = [];
					foreach($absencesObj as $absenceObj){
						$absences[(int)date('d', strtotime($absenceObj->date))] = $absenceObj->type;					
					}									
				@endphp

				@for($i = 1; $i <= $final; $i++)
					@if(isset($absences[$i]))
						@php
							if($absences[$i] == 'A' || $absences[$i] == 'J')
								$typeAJ++;
							elseif($absences[$i] == 'F')
								$typeNJ++;
						@endphp
						<td>{{ $absences[$i] }}</td>
					@else
						<td>.</td>
					@endif
				@endfor

				<td>{{ $typeAJ }}</td>
				<td>{{ $typeNJ }}</td>
				<td>{{ $typeAJ + $typeNJ }}</td>
			</tr>
		@endforeach
	</tbody>
</table>