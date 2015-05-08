<?php use App\Articulo; ?>
@extends('layouts.madre')


@section('titulo', 'PAGINA PRINCIPAL')

@stop


@section('info_extra')
  <div id="sns_content" class="wrap layout-m">
    <div class="container">
      <div class="row">
        <div id="sns_main" class="col-md-12 col-main">
          <div id="sns_mainmidle">
            <div class="account-create">
              <div class="page-title">
                <h1>Nueva subasta</h1>
              </div>
              <form action="#" method="post" id="form-validate">
                <div class="fieldset">
                  <input type="hidden" name="success_url" value="">
                  <input type="hidden" name="error_url" value="">
                  <h2 class="legend">Descripción Articulo</h2>
                  <ul class="form-list">
                    <li class="fields">
                      <div class="customer-name">
                        <div class="field ">
                          <label for="narticulo" class="required"><em>*</em>Nombre Articulo</label>
                          <div class="input-box">
                            <input type="text" id="narticulo" name="narticulo" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                          </div>
                        </div>
                         <div class="field ">
                          <label for="marticulo" class="required"><em>*</em>Modelo</label>
                          <div class="input-box">
                            <input type="text" id="marticulo" name="marticulo" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                   <ul class="form-list">
                    <li class="fields">
                      <div class="customer-name">
                        <div class="field ">
                          <label for="narticulo" class="required"><em>*</em>Localización</label>
                          <div class="input-box">
                            <input type="text" id="narticulo" name="narticulo" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                          </div>
                        </div>
                         <div class="field ">
                          <label for="marticulo" class="required"><em>*</em>Estado</label>
                          <div class="input-box">
                            <input type="text" id="marticulo" name="marticulo" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="form-list">
                    <li class="fields">
                      <div class="customer-name">
                        <div class="field ">
                          <label for="narticulo" class="required"><em>*</em>Descripción</label>
                          <div class="input-box">
                            <textarea id="narticulo" name="narticulo" value="" title="Nombre" maxlength="255" class="input-text required-entry" rows="4" cols="70" name="comment" form="usrform"> </textarea>
                          </div>
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