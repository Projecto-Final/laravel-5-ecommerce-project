<?php use App\Articulo;  ?>

<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('titulo') - 3F&M - Subastas Online </title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
	<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link href="{{url('../vendor/kartik-v/bootstrap-star-rating/css/star-rating.min.css')}}" media="all" rel="stylesheet" type="text/css" />
	<script src="{{url('../vendor/kartik-v/bootstrap-star-rating/js/star-rating.min.js')}}" type="text/javascript"></script>
	<script src="{{url('js/sistema_notificaciones.js')}}" type="text/javascript"></script>
	<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ url('css/main.css') }}" rel="stylesheet">
	<link href="{{ url('css/perfil_user.css') }}" rel="stylesheet">
	<link href="{{ url('css/subasta.css') }}" rel="stylesheet">
	<link href="{{ url('css/sistema_notificaciones.css') }}" rel="stylesheet">
	@yield('extclases')

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="col-md-offset-3">
			<div class="notification-box error"><p><b>error: </b> text</p><i class=""></i><div onClick="closeNotificationBox('.error')" class="glyphicon glyphicon-remove-sign"></div></div>
			<div class="notification-box warning"><p><b>warning: </b>text</p><i class="glyphicon glyphicon-warning-sign"></i><div onClick="closeNotificationBox('.warning')" class="glyphicon glyphicon-remove-sign"></div></div>
			<div class="notification-box advice"><p><b>advice: </b>text</p><i class="glyphicon glyphicon-bell"></i><div onClick="closeNotificationBox('.advice')" class="glyphicon glyphicon-remove-sign"></div></div>
			<div class="notification-box notice"><p><b>notice: </b>text</p><i class="glyphicon glyphicon-grain"></i><div onClick="closeNotificationBox('.notice')" class="glyphicon glyphicon-remove-sign"></div></div>
			<div class="notification-box alert"><p><b>alert: </b>text</p><i class="glyphicon glyphicon-alert"></i><div onClick="closeNotificationBox('.alert')" class="glyphicon glyphicon-remove-sign"></div></div>
		</div>
		<script>
			notifications();
		</script>

		<div id="container-fluid">
			<div class="contenedor-header">
				<div class="m-usuario">
					<nav class="container">
						@if (Auth::check())
						<div class="box-left">
							<p class="welcome-msg">Bienvenido, {{ Auth::user()->username }}</p>
						</div>
						<ul class="enlaces">
							<li> <a href="usuario"><i class="fa fa-user"></i> Mis cosas</a> </li>
							<li> <a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> Cerrar Sesión</a> </li>
						</ul>
						@else
						<ul class="enlaces">
							<li> <a href="{{ url('auth/login') }}"><i class="fa fa-sign-in"></i> Iniciar Sessión</a> </li>
							<li> <a href="{{ url('auth/register') }}"><i class="fa fa-user-plus"></i> Nuevo Usuario</a> </li>
						</ul>
						@endif

					</nav>
				</div>
				<div class="container">
					<div class="contenido-header">
						<div class="row">
							<div class="col-md-3 col-sm-12 col-xs-12">
								<div class="contenedor-logo"> <a href="{{ url('') }}" title="YaPujo." class="logo"> <strong> YaPujo. </strong> <img src="{{ url('/images/logo.png') }}" alt="YaPujo."> </a> </div>
							</div>
							<div class="col-md-9 col-sm-12 col-xs-12">
								<div class="acceso_rapido">
									<div class="formulario-busqueda">
										<div class="select-input">
											<select>
											</select>
											<script>
											// Script pro rellenar dropdown!
											$.getJSON("{{ url('get_allCategories') }}", function(result){
												var scatm = "";
												$.each(result, function(i, field){
													scatm += "<option value="+field.id+">"+field.nombre+"</option>";
												});
												$(".formulario-busqueda > .select-input > select").html(scatm);
											});

										</script>
										<input type="text" name="buscar" class="entrada-texto" placeholder="Buscar en todas las subastas...">
									</div>
									<div class="boton-submit">
										<button type="button" name="realizar-busqueda" class="buscar" value="buscar"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="m-navegacion">
				<nav class="navbar navbar-default">
					<div class="container"> 
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="{{ url('') }}">INICIO<span class="sr-only">(current)</span></a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
							</ul>
						</div>
						<!-- /.navbar-collapse --> 
					</div>
					<!-- /.container-fluid --> 
				</nav>
			</div>
		</div>

		<!-- FIN HEADER -->

		@yield('info_extra')

		@yield('iniciar_sesion')

		@yield('categorias_i_sponsor')

		@yield('articulos_subastas')

		@yield('registro_login')

		@yield('opciones_usuario')

		<!-- FIN CATEGORIA Y SPONSOR -->
		<footer id="C3">
			<div id="sns_footer_top" class="wrap footer">
				<div class="container">
					<div class="sns_footer-top">
						<div class="row">
							<div class="col-sm-9">
								<div class="block-twitter">
									<div class="block_head_left">
										<h3>Twitter</h3>
										<div class="navslider"> <a class="prev" href="#"><i class="fa fa-angle-left"></i></a> <a class="next" href="#"><i class="fa fa-angle-right"></i></a> </div>
									</div>
									<div class="block-content clearfix">
										<div id="sns_twitter" class=" no-avartar no-followlink no-interactlink">
											<div class="posts owl-carousel owl-theme" style="opacity: 1; display: block;">
												<div class="owl-wrapper-outer">
													<div class="owl-wrapper" style="width: 5088px; left: 0px; display: block; -webkit-transition: all 0ms ease; transition: all 0ms ease;">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="block-business">
									<h3>Business Hours</h3>
									<ul class="list-unstyle">
										<li><a href="#">Mon-Fri: ------------------- <span>8am-5pm</span></a></li>
										<li><a href="#">Sat: ---------------------- <span>8am-11pm</span></a></li>
										<li><a href="#">Sun: ---------------------- <span>Closed</span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- final pre-footer ( redes sociales -->
			<div id="sns_footer_middle" class="wrap footer">
				<div class="container">
					<div class="row">
						<div class="col-phone-12 col-xs-6 col-sm-6 col-md-3 column column1">
							<h3>Lenguajes Utilizados</h3>
							<ul>
								<li><a href="#">PHP</a></li>
								<li><a href="#">HTML5</a></li>
								<li><a href="#">CSS3</a></li>
								<li><a href="#">JAVASCRIPT</a></li>
								<li><a href="#">MYSQL</a></li>
							</ul>
						</div>
						<div class="col-phone-12 col-xs-6 col-sm-6 col-md-3 column column2">
							<h3>EQUIPO DESARROLLO</h3>
							<ul>
								<li><a href="#">Alejandro Maroto</a></li>
								<li><a href="#">Adria Pozo</a></li>
								<li><a href="#">Bartomeu Cot</a></li>
								<li><a href="#">Sergio Sanchez</a></li>
								<li><a href="#">Panchito</a></li>
							</ul>
						</div>
						<div class="col-phone-12 col-xs-6 col-sm-6 col-md-3 column column3">
							<h3>Utilidades</h3>
							<ul>
								<li><a href="#">My Account</a></li>
								<li><a href="#">Orders and Returns</a></li>
								<li><a href="#">Site Map</a></li>
								<li><a href="#">Search Terms</a></li>
								<li><a href="#">Advanced Search</a></li>
								<li><a href="#">My order</a></li>
							</ul>
						</div>
						<div class="col-phone-12 col-xs-6 col-sm-6 col-md-3 column column4">
							<div class="about">
								<h3>SUPPREME</h3>
								<ul class="list-unstyle">
									<li><a class="address" href="#">Address: 1234 Street Name, City Name</a></li>
									<li><a class="phone" href="#">Phone: 56445675467</a></li>
									<li><a class="mail" href="#"> <span>Email: </span>suppor@3f&m.com</a></li>
								</ul>
							</div>
							<div class="sns-social">
								<h3>Follow Us On</h3>
								<ul>
									<li><a class="fa fa-facebook-square" title="" href="#" target="_self">&nbsp;</a></li>
									<li><a class="fa fa-twitter-square" title="" href="#" target="_self">&nbsp;</a></li>
									<li><a class="fa fa-youtube-square" title="" href="#" target="_self">&nbsp;</a></li>
									<li><a class="fa fa-google-plus-square" title="" href="#" target="_self">&nbsp;</a></li>
									<li><a class="fa fa-vimeo-square" title="" href="#" target="_self">&nbsp;</a></li>
									<li><a class="fa fa-linkedin-square" title="" href="#" target="_self">&nbsp;</a></li>
									<li><a class="fa fa-github-square" title="" href="#" target="_self">&nbsp;</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- final pre-footer 2 enlaces -->
			<div id="sns_footer_bottom" class="footer wrap">
				<div class="container">
					<div class="row">
						<div class="sns-footer-content">
							<div class="copy-right"> © 2015 99Pujas. Todos los derechos reservados. Tema: Clear White Theme diseñado por (<a href="" title="">3FYM</a>) Laravel  </div>
							<div class="payment">
								<div class="payment-method">
									<ul class="payment list-unstyled">
										<li><a class="fa fa-cc-visa" title="Visa" href="#"></a></li>
										<li><a class="fa fa-paypal" title="PayPal Certificado" href="#"></a></li>
										<li><a class="fa fa-cc-mastercard" title="MasterCard" href="#"></a></li>
										<li><a class="fa fa-envelope-o" title="Contra-Reembolso" href="#"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<script src="http://127.0.0.1/proyecto/public/js/bootstrap.min.js"></script>
</body>
</html>