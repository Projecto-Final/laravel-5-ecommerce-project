<?php use App\Articulo; use App\Imagen; ?>


@extends('layouts.madre')


@section('titulo', 'Resultado de busqueda ')
@stop


@section('articulos_subastas')
<div id="sns_content" class="wrap layout-m">
  <div class="container">
    <div class="row">
      <div id="sns_main" class="col-md-12 col-main">
        <div id="sns_mainmidle">

          <div id="sns_producttabs3375621631430404908" class="sns-producttabs">
            <div class="sns-pdt-head">
              <h2>Resultado busqueda</h2>
            </div>
            <div class="sns-pdt-container"> 
              <!--Begin Tab Nav --> 

              <!-- End Tab Nav --> 
              <!--Begin Tab Content -->
              <div class="sns-pdt-content wide-4 normal-4 tabletlandscape-3 tabletportrait-3 mobilelandscape-2 mobileportrait-1">
                <div class="pdt-content tab-content-actived is-loaded pdt_39">
                  <div class="pdt-list products-grid zoomOut play">
                    <div class="contenedor-subastas"> 
                      <!-- ARTICULOS --> 
                 
                      <!-- print_r($resultadoBusqueda[0][0]->imagenes[0]->imagen)."hacked madafakar" -->
                 
                      @forelse($resultadoBusqueda as $contador => $subasta)
                      <!-- MUESTRA -->
                      <div class="item item-animate col-xs-12 col-sm-4 col-md-4 col-lg-2" style="-webkit-animation-delay:0ms;-moz-animation-delay:0ms;-o-animation-delay:0ms;animation-delay:0ms;">
                        <div class="item-inner clearfix">
                          <div class="badges"> </div>
                          <div class="item-img"> <a class="product-image" href="{{ url('subasta/'.$subasta[0]['id']) }}" title=" Retis lapen casen "> <span class="image-main"> <img src="{{ url('images/subastas/'.$subasta[0]->imagenes[0]->imagen) }}" alt=" Retis lapen casen "> </span> </a> </div>
    
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a href="" onclick="javascript: return true" title=" Retis lapen casen ">{{ $subasta[0]['nombre_producto'] }} </a> </div>
                              <div class="item-content clearfix">
                                <div class="item-price">
                                  <div class="price-box"> <span class="price">{{ $subasta[0]['puja_mayor'] }} <i class="fa fa-eur"></i></span> </div>
                                </div>
                              </div>
                              <div class="rating">
                                <p class="no-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                              </div>
                              <a href=""><button title="Add to Cart" class="btn-cart" onclick="">Subastar</button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- FIN MUESTRA -->
                      @empty
                      <p class="vacio">No hay registros en la base de datos... a la espera...</p>

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