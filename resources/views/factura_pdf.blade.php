<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Factura Nº {{ $factura['id']}} </title>
  <link href="{{ url('dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="container" style="border: 1px #C8C8C8 solid; padding:30px;">
    <div class="row">
      <div class="col-xs-6" style="width:60%;">
        <h1>
          <a href="https://twitter.com/tahirtaous">
            <img src="{{ url('images/logo.png') }}">
          </a>
        </h1>
      </div>
      <div class="col-xs-6 text-right" style="width:100%;">
        <h1 style="font-siz:20px;">Factura numero {{ $factura['id']}}</h1>
        <p>Se emite esta factura para el/la solicitante <b>{{ $usuario['nombre']." ".$usuario['apellido']}}</b> con un
          cargo de <b>{{ $factura['cantidad_pagada'] }} Euros+IVA </b>, por la porrogracion del articulo "{{ $articulo['nombre_producto']."{".$articulo['id']."}" }}".
        </div>
      </div>
      <div class="row">
        <div class="col-xs-5" style="width:50%;">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>Para: <a href="#">{{ $usuario['nombre']." ".$usuario['apellido']}}</a></h4>
            </div>
            <div class="panel-body">
              <p>
                Dirección: {{ $usuario['direccion'] }} <br>
                Email: {{ $usuario['email']}} <br>
                NIF: {{ $factura['nif']}}
                <br>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- / end client details section -->
      <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
      </style>
      <table class="tg">
        <thead>
          <tr>
            <th class="tg-031e">
              <b>Servicios</b>
            </th>
            <th class="tg-031e">
              <b>Articulo al cual se aplica</b>
            </th>
            <th class="tg-031e">
              <b>Coste Porroga</b>
            </th>
            <th class="tg-031e">
              <b>IVA</b>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="tg-031e">Porroga</td>
            <td class="tg-031e"><a href="#">{{ $articulo['nombre_producto'] }}</a></td>
            <td class="tg-031e">{{ $factura['cantidad_pagada'] }}</td>
            <td class="tg-031e">{{--*/ echo round(($factura['cantidad_pagada']*0.21), 2); /*--}}</td>
          </tr>
        </tbody>
      </table>
      <div class="row text-right">
        <div style="">
          <p>
            <strong>
              Total a pagar: {{--*/ echo round(($factura['cantidad_pagada']*0.21+$factura['cantidad_pagada']), 2); /*--}} €<br>
            </strong>
          </p>
        </div>
      </div>
    </div>
  </body>
  </html>