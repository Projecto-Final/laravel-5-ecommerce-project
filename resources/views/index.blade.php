<?php use App\Articulo; use App\Imagen; ?>


@extends('layouts.madre')


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
      <div class="col-lg-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            {{--*/ $smartCount = 0; /*--}}
            @for($i = 0; $i < count($subastas); $i++)
            @if($smartCount==0)
            <li data-target="#carousel-example-generic" data-slide-to="{{ $smartCount }}" class="active"></li>
            @else
            <li data-target="#carousel-example-generic" data-slide-to="{{ $smartCount }}"></li>
            @endif
            {{--*/ $smartCount++; /*--}}

            @endfor
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            {{--*/ $smartCount = 0; /*--}}
            @forelse($subastas as $contador => $subasta)
            @if($smartCount==0)
            <a class="item category-bids active" href="{{ url('subasta/'.$subasta[0]['id'])}}">
              <div class="image-art" style="background-image: url('{{ url('images/subastas/'.$subasta[1])}}');"></div>
              <div class="description">
                <h1>{{ $subasta[0]['nombre_producto']}} </h1>
                <p>{{ $subasta[0]['descripcion']}} </p>
                <span class="price">{{ $subasta[0]['puja_mayor']}} €</span>
              </div>
            </a>
            @else
            <a class="item category-bids" href="{{ url('subasta/'.$subasta[0]['id'])}}">
              <div class="image-art" style="background-image: url('{{ url('images/subastas/'.$subasta[1])}}');"></div>
              <div class="description">
                <h1>{{ $subasta[0]['nombre_producto']}} </h1>
                <p>{{ $subasta[0]['descripcion']}} </p>
                <span class="price">{{ $subasta[0]['puja_mayor']}} €</span>
              </div>
            </a>

            @endif
            {{--*/ $smartCount++; /*--}}
            @empty
            @endforelse
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
        <div class="block m-interno">
          <div class="m-interno-sub">
            <div class="block-title"> <span>Categorias</span> </div>
            <div class="block-content clearfix" style="height: 405px;">
              <ul id="sns_sidenav" class="navegacion">
                @foreach($categorias as $categoria)
                <li class="level0 nav-1">
                  <div class="accr_header"><a href="{{ url('/categorias/'.$categoria->nombre) }}"> <span>{{ $categoria->nombre }}</span> </a></div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
        <div id="sns_slideshow">
         <div class="sns-revolutionslider-wrap">
           <div class="tp-bgimg defaultimg" style="width: 100%; height: 450px; opacity: 1; background-image: url('{{ url('images/oferta999.jpg') }}'); background-color: rgba(0, 0, 0, 0); /* background-position: 50% 50%; */ background-repeat: no-repeat;background-size: contain;"></div>
         </div>
       </div>
     </div>
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="banner t1"> <img src="{{ url('images/monster.jpg') }}" style="width: 100%;"> </div>
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
                    <div class="contenedor-subastas">
                      <!-- ARTICULOS --> 
                      @forelse($subastas as $contador => $subasta)
                      <!-- MUESTRA -->
                      <div class="item item-animate col-xs-12 col-sm-4 col-md-4 col-lg-2" style="-webkit-animation-delay:0ms;-moz-animation-delay:0ms;-o-animation-delay:0ms;animation-delay:0ms;">
                        <div class="item-inner clearfix">
                          <div class="badges"> </div>
                          <div class="item-img"> <a class="product-image" href="{{ url('subasta/'.$subasta[0]['id']) }}" title=" Retis lapen casen "> <span class="image-main"> <img src="{{ url('images/subastas/'.$subasta[1]) }}" alt=" Retis lapen casen "> </span> </a> </div>
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
                              <button title="Add to Cart" class="btn-cart" onclick="">Subastar</button>
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