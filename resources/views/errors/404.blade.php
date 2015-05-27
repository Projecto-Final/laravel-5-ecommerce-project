<html>
<head>
	<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
	<link href="{{ url('css/shake.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
	<style>
		body {
			margin: 0;
			padding: 0;
			width: 100%;
			height: 100%;
			color: #B0BEC5;
			display: table;
			font-weight: 100;
			font-family: 'Lato';
		}

		.container {
			text-align: center;
			display: table-cell;
			padding-top: 40px;
		}

		.content {
			text-align: center;
			display: inline-block;
		}

		.title {
			font-size: 72px;
			margin-bottom: 40px;
		}
		.element-animation{
			animation: animationFrames linear 4s;
			animation-iteration-count: 1;
			transform-origin: 50% 50%;
			-webkit-animation: animationFrames linear 4s;
			-webkit-animation-iteration-count: 1;
			-webkit-transform-origin: 50% 50%;
			-moz-animation: animationFrames linear 4s;
			-moz-animation-iteration-count: 1;
			-moz-transform-origin: 50% 50%;
			-o-animation: animationFrames linear 4s;
			-o-animation-iteration-count: 1;
			-o-transform-origin: 50% 50%;
			-ms-animation: animationFrames linear 4s;
			-ms-animation-iteration-count: 1;
			-ms-transform-origin: 50% 50%;
		}

		@keyframes animationFrames{
			-1% {
				transform:  translate(0px,0px)  ;
			}
			0% {
				transform:  translate(0px,0px)  rotate(0deg) ;
			}
			3% {
				transform:  translate(11px,-43px)  rotate(12deg) ;
			}
			15% {
				transform:  translate(-2px,-83px)  rotate(-17deg) ;
			}
			17% {
				transform:  translate(-23px,-92px)  rotate(7deg) ;
			}
			26% {
				transform:  translate(-118px,-131px)  rotate(-22deg) ;
			}
			36% {
				transform:  translate(-131px,-161px)  rotate(-17deg) ;
			}
			52% {
				transform:  translate(-152px,-208px)  rotate(6deg) ;
			}
			81% {
				transform:  translate(-189px,-293px)  ;
			}
			100% {
				transform:  translate(-276px,-289px)  rotate(-28deg) ;
			}
		}

		@-moz-keyframes animationFrames{
			-1% {
				-moz-transform:  translate(0px,0px)  ;
			}
			0% {
				-moz-transform:  translate(0px,0px)  rotate(0deg) ;
			}
			3% {
				-moz-transform:  translate(11px,-43px)  rotate(12deg) ;
			}
			15% {
				-moz-transform:  translate(-2px,-83px)  rotate(-17deg) ;
			}
			17% {
				-moz-transform:  translate(-23px,-92px)  rotate(7deg) ;
			}
			26% {
				-moz-transform:  translate(-118px,-131px)  rotate(-22deg) ;
			}
			36% {
				-moz-transform:  translate(-131px,-161px)  rotate(-17deg) ;
			}
			52% {
				-moz-transform:  translate(-152px,-208px)  rotate(6deg) ;
			}
			81% {
				-moz-transform:  translate(-189px,-293px)  ;
			}
			100% {
				-moz-transform:  translate(-276px,-289px)  rotate(-28deg) ;
			}
		}

		@-webkit-keyframes animationFrames {
			-1% {
				-webkit-transform:  translate(0px,0px)  ;
			}
			0% {
				-webkit-transform:  translate(0px,0px)  rotate(0deg) ;
			}
			3% {
				-webkit-transform:  translate(11px,-43px)  rotate(12deg) ;
			}
			15% {
				-webkit-transform:  translate(-2px,-83px)  rotate(-17deg) ;
			}
			17% {
				-webkit-transform:  translate(-23px,-92px)  rotate(7deg) ;
			}
			26% {
				-webkit-transform:  translate(-118px,-131px)  rotate(-22deg) ;
			}
			36% {
				-webkit-transform:  translate(-131px,-161px)  rotate(-17deg) ;
			}
			52% {
				-webkit-transform:  translate(-152px,-208px)  rotate(6deg) ;
			}
			81% {
				-webkit-transform:  translate(-189px,-293px)  ;
			}
			100% {
				-webkit-transform:  translate(-276px,-289px)  rotate(-28deg) ;
			}
		}

		@-o-keyframes animationFrames {
			-1% {
				-o-transform:  translate(0px,0px)  ;
			}
			0% {
				-o-transform:  translate(0px,0px)  rotate(0deg) ;
			}
			3% {
				-o-transform:  translate(11px,-43px)  rotate(12deg) ;
			}
			15% {
				-o-transform:  translate(-2px,-83px)  rotate(-17deg) ;
			}
			17% {
				-o-transform:  translate(-23px,-92px)  rotate(7deg) ;
			}
			26% {
				-o-transform:  translate(-118px,-131px)  rotate(-22deg) ;
			}
			36% {
				-o-transform:  translate(-131px,-161px)  rotate(-17deg) ;
			}
			52% {
				-o-transform:  translate(-152px,-208px)  rotate(6deg) ;
			}
			81% {
				-o-transform:  translate(-189px,-293px)  ;
			}
			100% {
				-o-transform:  translate(-276px,-289px)  rotate(-28deg) ;
			}
		}

		@-ms-keyframes animationFrames {
			-1% {
				-ms-transform:  translate(0px,0px)  ;
			}
			0% {
				-ms-transform:  translate(0px,0px)  rotate(0deg) ;
			}
			3% {
				-ms-transform:  translate(11px,-43px)  rotate(12deg) ;
			}
			15% {
				-ms-transform:  translate(-2px,-83px)  rotate(-17deg) ;
			}
			17% {
				-ms-transform:  translate(-23px,-92px)  rotate(7deg) ;
			}
			26% {
				-ms-transform:  translate(-118px,-131px)  rotate(-22deg) ;
			}
			36% {
				-ms-transform:  translate(-131px,-161px)  rotate(-17deg) ;
			}
			52% {
				-ms-transform:  translate(-152px,-208px)  rotate(6deg) ;
			}
			81% {
				-ms-transform:  translate(-189px,-293px)  ;
			}
			100% {
				-ms-transform:  translate(-276px,-289px)  rotate(-28deg) ;
			}
		}
		body {
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-moz-transition: 0.5s all;
		}

		.tpp {
			background-color: #f8f8f8;
			border: 1px solid #c8c8c8;
			border-radius: 5px;
			width: auto;
			text-align: center;
			padding: 20px;
			position: relative;
		}
		.tpp .arrow {
			border-style: solid;
			position: absolute;
		}

		.bottom {
			border-color: #fff transparent transparent transparent;
			border-width: 8px 8px 0px 8px;
			bottom: -8px;
		}
		.absBOT {
			position: fixed;
			height: 50px;
			text-align: center;
			background-color: #fff;
			border-top: 1px #83C3F7 solid;
			bottom: 0px;
			margin: 0px;
			width: 100%;
			right: 0px;
			color: #000;
			font-size: 16px;
			padding-top: 7px;
			font-weight: bold;
		}
		.absBOT > a {
			font-weight: bold;
		}
	</style>
</head>
<script src="{{ url('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script>
	$(function(){
		var x = 0;
		setInterval(function(){
			x+=30;
			$('body').css('background-position', '' + x + 'px 0px');
		}, 100);
	})
</script>
<body style="background-image: url('{{ url('images/theme/errors/bg.png') }} ')">
	<div class="container">
		<div class="content">
			<div class="title tpp"><div class="arrow bottom right"></div><img class=""src="{{ url('images/theme/errors/404.png') }}"/></div><img class="element-animation shake shake-constant shake-slow" src="{{ url('images/theme/errors/ntodohere.png') }}"/>
			<p class="absBOT">Info: La pagina que estas buscando no existe! <a class="btn btn-info" href="{{ url('') }}">Volver a la página principal.</a></p>
		</div>
	</div>
</body>

</html>
