<?php use App\Categoria; 
$categorias =  Categoria::all(); ?>
<div id="contenedor-sub-header" class="contenedor-sub-header wrap">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
          <div class="block m-interno">
            <div class="m-interno-sub">
              <div class="block-title"> <span>Categorias</span> </div>
              <div class="block-content clearfix" style="height: 402px;">
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
              <div class="wrap-inner" style="overflow: visible;">
                <div class="sns-revolutionslider revslider-initialised tp-simpleresponsive" id="sns_revolutionslider17340255551430400226" style="height: 450px;">
                  <ul class="list-unstyled" style="display: block; overflow: hidden; width: 100%; height: 100%; max-height: none;">
                    <li style="width: 100%; height: 100%; overflow: hidden; visibility: visible; left: 0px; top: 0px; z-index: 20; opacity: 1; position: absolute;">
                      <div class="slotholder" style="width:100%;height:100%;">
                        <div class="tp-bgimg defaultimg" src="{{ url('images/oferta999.jpg') }}" style="width: 100%; height: 100%; opacity: 1; background-image: url({{ url('images/oferta999.jpg') }}); background-color: rgba(0, 0, 0, 0); background-position: 50% 50%; background-repeat: no-repeat;"></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="banner t1"> <img src="{{ url('images/monster.jpg') }}" style="width: 100%;"> </div>
        </div>
      </div>
    </div>
  </div>