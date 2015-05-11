<?php use App\Articulo; ?>
@extends('layouts.madre')


@section('titulo', 'PAGINA PRINCIPAL')

@stop


@section('info_extra')
<div id="sns_content" class="wrap layout-m new-subasta">
  <div class="container">
    <div class="row">
      <div id="sns_main" class="col-md-12 col-main">
        <div id="sns_mainmidle">
          <div class="account-create">
            <div class="page-title">
              <h1>Nueva subasta</h1>
            </div>
            <form action="{{ url('add_subasta') }}" method="post" id="form-validate">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="fieldset">
                <input type="hidden" name="success_url" value="">
                <input type="hidden" name="error_url" value="">
                <h2 class="legend">Detalles Articulo</h2>
                <ul class="form-list">
                  <li class="fields">
                    <div class="customer-name">
                      <div class="field ">
                        <label for="nombre_producto" class="required"><em>*</em>Nombre Producto</label>
                        <div class="input-box">
                          <input type="text" id="nombre_producto" name="nombre_producto" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                        </div>
                      </div>
                      <div class="field ">
                        <label for="modelo" class="required"><em>*</em>Modelo</label>
                        <div class="input-box">
                          <input type="text" id="modelo" name="modelo" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <ul class="form-list">
                  <li class="fields">
                    <div class="customer-name">
                      <div class="field ">
                        <label for="localizacion" class="required"><em>*</em>Localización</label>
                        <div class="input-box">
                          <input type="text" id="localizacion" name="localizacion" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                        </div>
                      </div>
                      <div class="field ">
                        <label for="estado" class="required"><em>*</em>Estado</label>
                        <div class="input-box">
                          <input type="text" id="estado" name="estado" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <ul class="form-list">
                  <li class="fields">
                    <div class="customer-name">
                      <div class="field ">
                        <label for="descripcion" class="required"><em>*</em>Descripción</label>
                        <div class="input-box">
                          <textarea id="descripcion" name="descripcion" value="" title="Descarticulo" maxlength="255" class="input-text required-entry" rows="4" cols="70" name="descarticulo"> </textarea>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="fieldset">
                <input type="hidden" name="success_url" value="">
                <input type="hidden" name="error_url" value="">
                <h2 class="legend">Configuracion</h2>
                <ul class="form-list">
                  <li class="fields">
                    <div class="customer-name">
                      <div class="field">
                        <label for="categoria" class="required"><em>*</em>Categoria</label>
                        <div class="input-box">
                         <select name="categoria" id="categoria" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                          <option value="">Cargando...</option>
                        </select>
                        <script>
                              // Script pro rellenar dropdown!
                              $.getJSON("{{ url('get_allCategories') }}", function(result){
                                var scatm = "";
                                $.each(result, function(i, field){
                                  scatm += "<option value="+field.id+">"+field.nombre+"</option>";
                                });
                                $(".field select#categoria").html(scatm);
                              });
                            </script>
                          </div>
                        </div>
                        <div class="field ">
                          <label for="subcategoria" class="required"><em>*</em>Sub-Categoria</label>
                          <div class="input-box">
                           <select name="subcategoria" id="subcategoria" name="narticulo" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                            <option value="">Seleccione una categoria.</option>
                          </select>
                          <div id="descriptext" class="input-box"></div>
                          <script>
                              // Script pro rellenar dropdown!
                              $(".field select#categoria").change(function() {
                                var aux = "{{ url('get_allSubCategoriesOnCategory') }}/"+$(".field select#categoria").val();
                                $.getJSON(aux , function(result){
                                  var scatm = "";
                                  $.each(result, function(i, field){
                                    scatm += "<option value="+field.id+">"+field.nombre+"</option>";
                                  });
                                  $(".field select#subcategoria").html(scatm);
                                });
                              });

                              $(".field select#subcategoria").change(function() { 
                                var aux2 = "get_subCategoryDescription/"+$(".field select#subcategoria").val();
                                $.get(aux2 , function(result){
                                  $("#descriptext").html("<p style='color:green;'>Descripcion:</b>"+result);
                                });

                              });
                            </script>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="form-list">
                    <li class="fields">
                      <div class="customer-name">
                        <div class="field ">
                          <label for="precio_inicial" class="required"><em>*</em>Precio inicial</label>
                          <div class="input-box">
                            <input type="text" id="precio_inicial" name="precio_inicial" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                          </div>
                        </div>
                        <div class="field ">
                          <label for="incremento_precio" class="required"><em>*</em>Incremento de las pujas</label>
                          <div class="input-box">
                            <input type="text" id="incremento_precio" name="incremento_precio" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="form-list">
                    <li class="fields">
                      <div class="customer-name">
                        <div class="field ">
                          <label for="fecha_final" class="required"><em>*</em>Fecha de vencimiento</label>
                          <div class="input-box">
                            <input type="text" id="fecha_final" name="fecha_final" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="buttons-set">
                    <p class="required">* Campos requeridos</p>
                    <p class="back-link"><a href="index.html" class="back-link">« Regresar al inicio</a></p>
                    <button type="submit" title="Submit" class="button"><span><span>Crear Subasta</span></span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @stop