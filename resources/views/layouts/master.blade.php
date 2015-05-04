<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>App Name - @yield('title')</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="../resources/views/css/font-awesome.min.css">
<link href="../resources/views/css/bootstrap.min.css" rel="stylesheet">
<link href="../resources/views/css/main.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300" rel="stylesheet" type="text/css">
</head>
<body>
   @yield('cargaLoquesea')
<div id="container-fluid">
  <div class="contenedor-header">
    <div class="m-usuario">
      <nav class="container">
        <ul class="enlaces">
          <li> <a href="#foo"><i class="fa fa-user"></i> Iniciar Sessión</a> </li>
          <li> <a href="#foo"><i class="fa fa-user-plus"></i> Nuevo Usuario</a> </li>
        </ul>
      </nav>
    </div>
    <div class="container">
      <div class="contenido-header">
        <div class="row">
          <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="logo-container"> <a href="#" title="YaPujo." class="logo"> <strong> YaPujo. </strong> <img src="../resources/views/images/logo.png" alt="YaPujo."> </a> </div>
          </div>
          <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="acceso_rapido">
              <div class="formulario-busqueda">
                <div class="select-input">
                  <select>
                    <option value="Smartphones">Smartphones</option>
                    <option value="Camaras">Camaras</option>
                    <option value="Ropa">Ropa</option>
                    <option value="Accesorios">Accesorios</option>
                  </select>
                  <input type="text" name="buscar" class="input-text" placeholder="Buscar en todas las subastas...">
                </div>
                <div class="submit-button">
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
              <li class="active"><a href="#">INICIO<span class="sr-only">(current)</span></a></li>
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
   <div class="inf-clientes">
     @yield('inf-client')
  </div>
  
  <!-- fin info clientes -->
  
  <div id="box-slideshow" class="box-slideshow wrap">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
          <div class="block block-sns-layered-nav">
            <div class="block-layered-nav-inner">
              <div class="block-title"> <span>Categorias</span> </div>
              <div class="block-content clearfix" style="height: 402px;">
                <ul id="sns_sidenav" class="nav_accordion">
                  <li class="level0 nav-1">
                    <div class="accr_header"><a href="http://demo.snstheme.com/sns-riveshop/index.php/mobiles.html"> <span>Mobiles</span> </a></div>
                  </li>
                  <li class="level0 nav-2">
                    <div class="accr_header"><a href="http://demo.snstheme.com/sns-riveshop/index.php/tablets.html"> <span>Tablets</span> </a></div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
          <div id="sns_slideshow">
            <div class="sns-revolutionslider-wrap">
              <div class="wrap-inner" style="overflow: visible;">
                <div class="sns-revolutionslider revslider-initialised tp-simpleresponsive" id="sns_revolutionslider17340255551430400226" style="height: 450px;">
                  <ul class="list-unstyled" style="display: block; overflow: hidden; width: 100%; height: 100%; max-height: none;">
                    <li style="width: 100%; height: 100%; overflow: hidden; visibility: visible; left: 0px; top: 0px; z-index: 20; opacity: 1; position: absolute;">
                      <div class="slotholder" style="width:100%;height:100%;">
                        <div class="tp-bgimg defaultimg" src="../resources/views/images/oferta999.jpg" style="width: 100%; height: 100%; opacity: 1; background-image: url(../resources/views/images/oferta999.jpg); background-color: rgba(0, 0, 0, 0); background-position: 50% 50%; background-repeat: no-repeat;"></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="banner t1"> <img src="../resources/views/images/monster.jpg" style="width: 100%;"> </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- FIN CATEGORIA Y SPONSOR -->
  
  <div id="sns_content" class="wrap layout-m">
    <div class="container">
      <div class="row">
        <div id="sns_main" class="col-md-12 col-main">
          <div id="sns_mainmidle">
            <div class="std">
              <div class="no-display">&nbsp;</div>
            </div>
            <div id="sns_producttabs3375621631430404908" class="sns-producttabs">
              <div class="sns-pdt-head">
                <h2>NUEVAS SUBASTAS</h2>
              </div>
              <div class="sns-pdt-container"> 
                <!--Begin Tab Nav --> 
                
                <!-- End Tab Nav --> 
                <!--Begin Tab Content -->
                <div class="sns-pdt-content wide-4 normal-4 tabletlandscape-3 tabletportrait-3 mobilelandscape-2 mobileportrait-1">
                  <div class="pdt-content tab-content-actived is-loaded pdt_39">
                    <div class="pdt-list products-grid zoomOut play">
                      <div class="inner-3267714721430404908">
                        @yield('articulos')
                        <div class="clearfix visible-xs"></div>
                        <div class="clearfix visible-md"></div>
                        <div class="clearfix visible-sm"></div>
                        <div class="clearfix visible-lg"></div>
                      </div>
                    </div>
                    <div class="pdt-loadmore data-inserted" data-href="pdt_39" data-type="category" data-catid="39" data-orderby="position" data-all="20" data-start="6" data-loadnum="6">
                      <div class="btn-loadmore" style="display: block;"> <span class="loadmore button">VER MAS PRODUCTOS</span></div>
                    </div>
                  </div>
                </div>
              </div>
              <!--End Tab Content --> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>