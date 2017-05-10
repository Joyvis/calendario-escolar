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
					<h1>Calendário Escolar</h1>			
					<hr>
					<div class="subtitle row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<ul class="list-inline">
								<li>
									<i class="color-subtitle red"></i>
								</li>
								<li><span>Sábados, Domingos, Recessos e Feriados</span></li>
							</ul>

							<ul class="list-inline subttl" data-select='ini-fim-semestre''>
								<li>
									<i class="color-subtitle blue"></i>
								</li>
								<li><span>Início e Término do semestre letivo</span></li>
							</ul>

							<ul class="list-inline subttl" data-select='sabado-letivo'>
								<li>
									<i class="color-subtitle yellow"></i>
								</li>
								<li><span>Sábados letivos</span></li>
							</ul>

							<ul class="list-inline subttl" data-select='dia-escolar'>
								<li>
									<i class="color-subtitle green"></i>
								</li>
								<li><span>Dia Escolar</span></li>
							</ul>

							<ul class="list-inline subttl" data-select=''>
								<li>
									<i class="color-subtitle"></i>
								</li>
								<li><span>Dia Letivo</span></li>
							</ul>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<ul class="list-inline">
								<li>
									<input type="text" id="dias-escolares" readonly="readonly" value="0">
								</li>
								<li><span>Dias Escolares</span></li>
							</ul>
							<ul class="list-inline">
								<li>
									<input type="text" id="dias-letivos" readonly="readonly" value="0">
								</li>
								<li><span>Dias Letivos</span></li>
							</ul>
							<ul class="list-inline">
								<li>
									<a href="#" class="btn btn-success" id="save-calendar">SALVAR</a>
									{{ csrf_field() }}
								</li>
								<li>
									<a href="{{route('user.index')}}" class="btn btn-info" >VOLTAR</a>
								</li>
							</ul>
							<ul class="list-inline">
								<li>
									<small>Clique sobre o dia no calendario para alternar entre as legendas</small>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="content">
					<?php for ($i=1; $i <= 12; $i++) { ?>	
						<?php if(in_array($i, [1, 5, 9])){ ?>
						<div class="row row-eq-height">	
						<?php } ?>											

							<div class="col-md-3">
								<?php 
									MostreCalendario(str_pad($i, 2, '0', STR_PAD_LEFT));
								?>		
							</div>
						<?php if(in_array($i, [4, 8, 12])){ ?>
						</div>
						<?php } ?>											
					<?php } ?>
				</div>
			</div>
			<div class="alert alert-success alert-dismissable fade in" id="msg-success" style="display: none">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Sucesso!</strong> Os dados do calendário letivo foram atualizados.
			</div>
			<script type="text/javascript" src="{{url('/')}}/assets/vendors/jquery/js/jquery-3.2.1.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					function calculaDiasLetivos(){
						var diasLetivos = $('.dia-letivo').length;
						var sabadosLetivos = $('.sabado-letivo').length;
						var diasFdsFalta = $('.fds-feriado').length;
						var iniSemestreLetivo = $('.ini-fim-semestre').length;
						var diaEscolar = $('.dia-escolar').length;

						$('#dias-escolares').val(diaEscolar);
						$('#dias-letivos').val(diasLetivos + sabadosLetivos + iniSemestreLetivo);
					}

					calculaDiasLetivos();

					$(document).on('click', '.change-event', function(e){
						e.preventDefault();
						var link = $(this).parent();
						if(!link.hasClass('fds-feriado')){
							var selector = $('.subttl-selected').attr('data-select');
							if(typeof $('.subttl-selected').attr('data-select') !== 'undefined'){
								link.attr('class', selector);
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
						var iniSemeste = [];
						$('.ini-fim-semestre').each(function(){
							var link1 = $(this);
							iniSemeste.push($('.change-event', link1).attr('data-day'));
						})

						var sabadoLetivo = [];
						$('.sabado-letivo').each(function(){
							var link2 = $(this);
							sabadoLetivo.push($('.change-event', link2).attr('data-day'));
						})

						var diaEscolar = [];
						$('.dia-escolar').each(function(){
							var link3 = $(this);
							diaEscolar.push($('.change-event', link3).attr('data-day'));
						})

						var iniSemeste = JSON.stringify(iniSemeste);
						var sabadoLetivo = JSON.stringify(sabadoLetivo);
						var diaEscolar = JSON.stringify(diaEscolar);

						$.post(
							'{{route("calendar.save")}}', 
							{
								iniSemestre : iniSemeste,
								diaEscolar : diaEscolar,
								sabadoLetivo : sabadoLetivo,
								_token : $('[name="_token"]').val()
							},
							function(data){
								$('#msg-success').fadeIn();
							}
						)
						

					})
				})
			</script>
		</body>


</html>
