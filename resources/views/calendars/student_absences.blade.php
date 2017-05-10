<!DOCTYPE html>

<html>

		<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

				<title>Calendario</title>
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/vendors/bootstrap/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/css/style.css">
				<style type="text/css">
					.header {
						position: fixed;
						background-color: white;
						z-index: 999999;
						width: 100%;
					}
					.content {
						    margin-top: 380px;
					}
				</style>				
		</head>

		<body>
			@include('partials.functions')

			<div class="container-fluid">
				<div class="header ">
					@if(isset($student->id))
						<h1>Lançamento de faltas - {{ $student->name }}  | {{ $student->classroom->name }}</h1>			
					@else
						<h1>Lançamento de faltas</h1>			
					@endif
					
					<hr>
					<div class="subtitle row">
						@if(isset($student->id))
							@include('calendars.student_absences.subtitle')
						@else
							@include('calendars.student_absences.select_student')
						@endif
					</div>
				</div>
				@if(isset($student->id))
					<div class="content">
						
						<?php for ($i=1; $i <= 12; $i++) { ?>	
							<?php if(in_array($i, [1, 5, 9])){ ?>
							<div class="row row-eq-height">	
							<?php } ?>											

								<div class="col-md-3">
									<?php 
										MostreCalendario(str_pad($i, 2, '0', STR_PAD_LEFT), $student->id);
									?>		
								</div>
							<?php if(in_array($i, [4, 8, 12])){ ?>
							</div>
							<?php } ?>											
						<?php } ?>
					</div>
				@endif
			</div>
			<div class="alert alert-success alert-dismissable fade in" id="msg-success" style="display: none">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Sucesso!</strong> Os dados das faltas foram lançados com sucesso.
			</div>
			<script type="text/javascript" src="{{url('/')}}/assets/vendors/jquery/js/jquery-3.2.1.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					function calculaDiasLetivos(){
						// var diasLetivos = $('.dia-letivo').length;
						// var sabadosLetivos = $('.sabado-letivo').length;
						// var diasFdsFalta = $('.fds-feriado').length;
						// var iniSemestreLetivo = $('.ini-fim-semestre').length;
						// var diaEscolar = $('.dia-escolar').length;

						var faltasNJ = $('.falta-nao-justificada').length;
						var atestadosMedicos = $('.atestado-medico').length;
						var faltasJ = $('.faltas-justificada').length;

						$('#faltas-justificadas').val(faltasJ);
						$('#atestados-medicos').val(atestadosMedicos);
						$('#faltas-nao-justificadas').val(faltasNJ);						

						$('#total-faltas').val(faltasJ+faltasNJ);

						// $('#dias-letivos').val(diasLetivos + sabadosLetivos + iniSemestreLetivo);
					}

					calculaDiasLetivos();

					$(document).on('click', '.change-event-students', function(e){
						e.preventDefault();
						var link = $(this).parent();

						if(!link.hasClass('fds-feriado')){
							var selector = $('.subttl-selected').attr('data-select');
							console.log(selector);
							if(typeof $('.subttl-selected').attr('data-select') !== 'undefined'){								
								link.removeClass('falta-nao-justificada');
								link.removeClass('atestado-medico');
								link.removeClass('faltas-justificada');

								link.removeClass('paralisacao');
								link.removeClass('greve');
								link.removeClass('intemperie');

								link.addClass(selector);
							}
						}
		

						calculaDiasLetivos();						
					})

					$(document).on('click', '.subttl', function(e){
						e.preventDefault();
						$('.subttl').not(this).removeClass('subttl-selected');
						var link = $(this);						
						link.toggleClass('subttl-selected')

					})

					$('#save-calendar').click(function(e){
						e.preventDefault();

						var faltasNJ = [];
						$('.falta-nao-justificada').each(function(){
							var link1 = $(this);
							faltasNJ.push($('.change-event', link1).attr('data-day'));
						})

						var atestadosMedicos = [];
						$('.atestado-medico').each(function(){
							var link2 = $(this);
							atestadosMedicos.push($('.change-event', link2).attr('data-day'));
						})

						var faltasJ = [];
						$('.faltas-justificada').each(function(){
							var link3 = $(this);
							faltasJ.push($('.change-event', link3).attr('data-day'));
						})

						var paralisacao = [];
						$('.paralisacao').each(function(){
							var link1 = $(this);
							paralisacao.push($('.change-event', link1).attr('data-day'));
						})

						var greve = [];
						$('.greve').each(function(){
							var link2 = $(this);
							greve.push($('.change-event', link2).attr('data-day'));
						})

						var intemperie = [];
						$('.intemperie').each(function(){
							var link3 = $(this);
							intemperie.push($('.change-event', link3).attr('data-day'));
						})

						var faltasNJ = JSON.stringify(faltasNJ);
						var atestadosMedicos = JSON.stringify(atestadosMedicos);
						var faltasJ = JSON.stringify(faltasJ);

						var paralisacao = JSON.stringify(paralisacao);
						var greve = JSON.stringify(greve);
						var intemperie = JSON.stringify(intemperie);

						$.post(
							'{{route("student_absence.save")}}', 
							{
								faltasNJ : faltasNJ,
								atestadosMedicos : atestadosMedicos,
								faltasJ : faltasJ,
								paralisacao : paralisacao,
								greve : greve,
								intemperie : intemperie,
								student_id : $('#student_id').val(),

								_token : $('[name="_token"]').val()
							},
							function(data){
								$('#msg-success').fadeIn();
							}
						)
						

					})

					$('[name="classroom_id"]').change(function(){
						var val = $(this).val();
						if(val != ''){
							$.post(
								'{{route("student.get_by_classroom")}}',
								{
									classroom_id : val,
									_token : $('[name="_token"]').val()
								},
								function(data){
									$('[name="student_id"]').html('<option value="">SELECIONE</option>');
									data = JSON.parse(data);

									$.each(data,function(key, value) {
									    $('[name="student_id"]').append('<option value=' + value.id + '>' + value.name + '</option>');
									});
								}
							);
						}
					})

					$('#select-student-submit').click(function(e){
						e.preventDefault();
						var id = $('[name="student_id"]').val();
						if(id != ''){
							window.location.href = "{{route('student_absence.index')}}/" + id;
						}else{
							alert('Selecione um aluno para lançar as faltas')
						}
					})
				})
			</script>
		</body>


</html>
