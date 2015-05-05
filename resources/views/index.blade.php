<?php use App\Articulo; ?>


@extends('layouts.master')


@section('titulo', 'PAGINA PRINCIPAL')
@stop


@section('info_extra')
<div class="contenedor-informacion-clientes">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-xs-6 col-phone-12 block-layout">
          <div class="item">
            <div class="icon pull-left"> <i class="fa fa-truck">&nbsp;</i> </div>
            <div class="info">
              <h5>Envio gratuito</h5>
              <p>En compras mayores 100€</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-xs-6 col-phone-12 block-layout">
          <div class="item">
            <div class="icon pull-left"> <i class="fa fa-history">&nbsp;</i> </div>
            <div class="info">
              <h5>Devolucion Gratuita</h5>
              <p>30 dias garantia de devolucion.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-xs-6 col-phone-12 block-layout">
          <div class="item">
            <div class="icon pull-left"> <i class="fa fa-money">&nbsp;</i> </div>
            <div class="info">
              <h5>Calidad premium</h5>
              <p>Las mejores pujas de la web</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-xs-6 col-phone-12 block-layout">
          <div class="item">
            <div class="icon pull-left"> <i class="fa fa-gift">&nbsp;</i></div>
            <div class="info">
              <h5>Atencion al cliente</h5>
              <p>Lun a Vie de 7.30 a 22.00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop


@section('categorias_i_sponsor')
 <div id="contenedor-sub-header" class="contenedor-sub-header wrap">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
          <div class="block m-interno">
            <div class="m-interno-sub">
              <div class="block-title"> <span>Categorias</span> </div>
              <div class="block-content clearfix" style="height: 402px;">
                <ul id="sns_sidenav" class="navegacion">
                  <li class="level0 nav-1">
                    <div class="accr_header"><a href="http://demo.snstheme.com/sns-riveshop/index.php/mobiles.html"> <span>Smartphones</span> </a></div>
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
@stop


@section('articulos_subastas')
<div id="sns_content" class="wrap layout-m">
    <div class="container">
      <div class="row">
        <div id="sns_main" class="col-md-12 col-main">
          <div id="sns_mainmidle">
            
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
                        <!-- ARTICULOS --> 

<?php
// $p = new Articulo;
// Esperando implementacion de articulos.
// $articulos = Articulo::all();
$temp = [["articulo1",4],["articulo2",42]];

?>

@forelse($temp as $tem)
<!-- MUESTRA -->
                        <div class="item item-animate col-xs-6 col-sm-4 col-md-4 col-lg-2 col-phone-12" style="-webkit-animation-delay:0ms;-moz-animation-delay:0ms;-o-animation-delay:0ms;animation-delay:0ms;">
                          <div class="item-inner clearfix">
                            <div class="badges"> </div>
                            <div class="item-img"> <a class="product-image" href="http://demo.snstheme.com/sns-riveshop/index.php/retis-lapen.html" title=" Retis lapen casen "> <span class="image-main"> <img src="http://demo.snstheme.com/sns-riveshop/media/catalog/product/cache/9/small_image/225x281.25/9df78eab33525d08d6e5fb8d27136e95/0/0/00007.jpg" alt=" Retis lapen casen ">{{ $tem[0] }} </span> </a> </div>
                            <div class="item-info">
                              <div class="info-inner">
                                <div class="item-title"> <a href="http://demo.snstheme.com/sns-riveshop/index.php/retis-lapen.html" onclick="javascript: return true" title=" Retis lapen casen "> Retis lapen casen </a> </div>
                                <div class="item-content clearfix">
                                  <div class="item-price">
                                    <div class="price-box"> <span class="price">${{ $tem[1] }}</span> </div>
                                  </div>
                                </div>
                                <div class="rating">
                                  <p class="no-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                </div>
                                <button title="Add to Cart" class="btn-cart" onclick="setLocation('http://demo.snstheme.com/sns-riveshop/index.php/checkout/cart/add/uenc/aHR0cDovL2RlbW8uc25zdGhlbWUuY29tL3Nucy1yaXZlc2hvcC9pbmRleC5waHAvP19fX3N0b3JlPXNwYWlu/product/274/form_key/nX6STUT8dkC9CBdX/')">Add to Cart</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- FIN MUESTRA -->
@empty
    <p>No hay registros en la base de datos... a la espera...</p>
@endforelse

 <!-- ARTICULOS -->
                        <div class="clearfix visible-xs"></div>
                        <div class="clearfix visible-md"></div>
                        <div class="clearfix visible-sm"></div>
                        <div class="clearfix visible-lg"></div>
                      </div>
                    </div>
                    <div class="pdt-loadmore data-inserted" data-href="pdt_39" data-type="category" data-catid="39" data-orderby="position" data-all="20" data-start="6" data-loadnum="6">
                      <div class="mas" style="display: block;"> <span class="loadmore button"><i class="fa fa-long-arrow-down"></i> VER MAS PRODUCTOS <i class="fa fa-long-arrow-down"></i></span></div>
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

@stop
@section('content')
@stop