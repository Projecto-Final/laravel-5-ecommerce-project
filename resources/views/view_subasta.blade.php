<?php use App\Articulo; ?>
@extends('layouts.madre')

@section('extclases')

@stop

@section('titulo', 'PAGINA PRINCIPAL')

@stop


@section('info_extra')
<script type="text/javascript" src="{{ URL::asset('js/validaciones.js') }}"></script>

<div id="single-bid-view">
  <div class="container">
    <section class="row">
      <div class="col-lg-5 col-md-6 col-xs-4">
        @for ($i = 0; $i < count($imagenes); $i++)
        @if ($i  == 0)
        <a class="image-gallery col-md-12" href="#">
          @elseif($i  == 1 || $i  == 2)
          <a class="image-gallery col-md-6" href="#">
           @elseif($i  == 3 || $i  == 4 || $i  == 5)
           <a class="image-gallery col-md-4" href="#">
            @endif
            <div class="image-art" style="background-image: url('{{ url('images/subastas/'.$imagenes[$i]->imagen) }}');"></div>
          </a>
          @endfor

        </div>
        <div class="col-lg-7 col-md-6 col-xs-8 article-content">
          <div class="bid">
            <h5>PRECIO ACTUAL DEL ARTICULO</h5>
            <form class="form-inline">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">€</div>
                  <input type="text" class="form-control" id="exampleInputAmount" placeholder="{{ $subasta['puja_mayor'] }}" disabled="true">
                </div>
              </div>
              <button type="submit" class="btn btn-primary"> PUJAR {{ $subasta['incremento_precio'] }}€</button>
            </form>
          </div>
          <h5>Informació</h5>
          <table class="table table-bordered">
            <tbody><tr>
              <td>Enviament:</td>
              <td colspan="3">
                45,50 EUR<br>
                Ubicacio de l'article: suecia<br>
                Envia a: tot el mon.
              </td>
            </tr>
            <tr>
              <td>Entrega:</td>
              <td colspan="3">20 al 35 de juny del 2015</td>
            </tr>
            <tr>
              <td>Pagaments:</td>
              <td colspan="3">Tarjeta de credit/debit, contra reembolso</td>
            </tr>
            <tr>
              <td>Devolucions:</td>
              <td colspan="3">7 Dies despres de la entrega</td>
            </tr>
          </tbody></table>
        </div>
      </section>
    </div>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </div>
  @stop