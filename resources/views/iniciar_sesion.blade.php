<?php 
use App\Categoria;

?>
@extends('layouts.master')


@section('titulo', 'REGISTRARSE O INICIAR SESSION')


@section('registro_login')
<div id="sns_content" class="wrap layout-m">
    <div class="container">
      <div class="row">
        <div id="sns_main" class="col-md-12 col-main">
          <div id="sns_mainmidle">
            <div class="account-login">
              <div class="page-title">
                <h1>Registrate o Inicia sesión</h1>
              </div>
              <form action="http://demo.snstheme.com/sns-riveshop/index.php/customer/account/loginPost/" method="post" id="login-form">
                <input name="form_key" type="hidden" value="YI43JcRMPlZ5bHvi">
                <div class="col2-set">
                  <div class="col-1 new-users">
                    <div class="content">
                      <h2>Nuevo Usuario</h2>
                      <p>Al crear una cuenta en nuestra pagina, usted será capaz de moverse a través del proceso de pujas de forma rápida, almacenar direcciones de envío, ver y realizar un seguimiento de sus subastas y articulos subastados de su cuenta y más.</p>
                    </div>
                  </div>
                  <div class="col-2 registered-users">
                    <div class="content">
                      <h2>Usuario Registrado</h2>
                      <p>Si tienes una cuenta con nosotros, por favor inicia sesión.</p>
                      <ul class="form-list">
                        <li>
                          <label for="username" class="required"><em>*</em>Nombre de Usuario</label>
                          <div class="input-box">
                            <input type="text" name="login[username]" value="" id="username" class="input-text required-entry validate-email" title="Nombre De Usuario">
                          </div>
                        </li>
                        <li>
                          <label for="pass" class="required"><em>*</em>Contraseña</label>
                          <div class="input-box">
                            <input type="contrasena" name="login[contrasena]" class="input-text required-entry validate-password" id="pass" title="Contraseña">
                          </div>
                        </li>
                      </ul>
                      <p class="required">* Campos requeridos</p>
                    </div>
                  </div>
                </div>
                <div class="col2-set">
                  <div class="col-1 new-users">
                    <div class="buttons-set">
                      <button type="button" title="Create an Account" class="button" onclick="">Registrar Nuevo Usuario</button>
                    </div>
                  </div>
                  <div class="col-2 registered-users">
                    <div class="buttons-set"> <a href="" class="f-left">Mas información.</a>
                      <button type="submit" class="button" title="Login" name="send" id="send2">Iniciar Sesión</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop