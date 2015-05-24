@extends('view_subasta')
 @section('pujable')
 <div class="col-lg-7 col-md-6 col-xs-8 article-content">
 <div class="bid">
          <h5>PRECIO ACTUAL DEL ARTICULO</h5>
          <div id="contPujas">Nº Pujas :<br>{{ $pujas}}</div>
          <form class="form-inline">
            @if ($logueado == true) 
            <input type="hidden" id="cargarPrecio" value="{{url('cargar_precio')}}">
            <input type="hidden" id="cargarPujaAut" value="{{url('cargarPujaAut')}}">
            <input type="hidden" id="todasPujas" value="{{url('todasPujas')}}">
          @elseif($logueado == false)
            <input type="hidden" id="cargarPrecio" value="{{url('cargar_precioGuest')}}">
            <input type="hidden" id="cargarPujaAut" value="no">
            <input type="hidden" id="todasPujasGuest" value="{{url('todasPujasGuest')}}">
            @endif            
            <input type="hidden" id="subastaId" value="{{ $subasta['id'] }}">
            <input type="hidden" id="cambiarConf" value="{{url('cambiarConf')}}">
            <input type="hidden" id="cancelarConf" value="{{url('cancelarConf')}}">
            <input type="hidden" id="crearConfPuja" value="{{url('crearConfPuja')}}">
             <input type="hidden" id="pujasAutom" value="{{url('pujasAutom')}}">
             <input type="hidden" id="ultimaPuja" value="{{url('ultimaPuja')}}">
             
             
            
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">€</div>
                <input type="text" class="form-control" id="exampleInputAmount" value="{{ $subasta['puja_mayor'] }}" disabled="true">
              </div>
            </div>
            

      <!--      @if ($logueado == true) 
            <input id="botonPuja" type="button" class="btn btn-primary" onclick='pujar( {{ $subasta["id"].' , "'.url("add_puja").'"' }} )' value="PUJAR {{ $subasta['incremento_precio']+$subasta['puja_mayor'] }}€">
          @elseif($logueado == false)
            <input id="botonPuja" type="button" class="btn btn-primary" onclick='avisoLog()' value="PUJAR {{ $subasta['incremento_precio']+$subasta['puja_mayor'] }}€">
            @endif -->
            <input id="botonPuja" type="button" class="btn btn-primary" onclick='pujar( {{ $subasta["id"].' , "'.url("add_puja").'"' }} )' value="PUJAR {{ $subasta['incremento_precio']+$subasta['puja_mayor'] }}€">
          </form>
          <p colspan="3">* El incremento de puja actual es de {{ $subasta['incremento_precio']}}€</p>
        </div>


        <div>

           @if ($logueado == true) 
            <button class="formConfPuja-button" type="button" onClick="mostrar_cp();">Configurar Pujas Automáticas <i class='fa fa-floppy-o'></i></button>
          @elseif($logueado == false)
            <button class="formConfPuja-button" type="button" onClick="avisoLog();">Configurar Pujas Automáticas <i class='fa fa-floppy-o'></i></button>
            @endif
          
          <div class="formConfPuja">
            <div id="formConf">
              <form class="form-inline" id="form-validate">
                <h2>Cantidad Máxima Que Pujara</h2>
              <p>  <input trype="text" id="cantidadMax" name="cantidadMax"/>€</p>
                <br>
                <span class='errorJS' id='cantidadMax_error'>&nbsp;Campo obligatorio</span>
                <span class='errorJS' id='cantidadMax_error2'>&nbsp;Debe ser un numero positivo, con dos decimales como máximo</span>
              </form>
         <p>     <input id="crearConf" type="button" class="btn btn-primary" onclick='crear_confPuja()' value="GUARDAR"> <i class='fa fa-flag-o'></i></p>
    
              <div id="pujasAutomaticastable"></div>
            </div>
          </div>
        </div>
@stop