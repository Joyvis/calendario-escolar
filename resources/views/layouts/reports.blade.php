<!DOCTYPE html>

<html>

		<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

				<title>Relatorio de Faltas</title>
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/vendors/bootstrap/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/css/style.css">
				@yield('css')
								
		</head>

		<body>			

			<div class="container-fluid">

				<div class="content">
					@yield('content')
				</div>
			</div>
			<div class="alert alert-success alert-dismissable fade in" id="msg-success" style="display: none">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Sucesso!</strong> Os dados do calendário letivo foram atualizados.
			</div>
			<script type="text/javascript" src="{{url('/')}}/assets/vendors/jquery/js/jquery-3.2.1.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			@yield('js')
		</body>


</html>
