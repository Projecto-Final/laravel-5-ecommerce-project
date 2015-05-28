<?xml version="1.0" encoding="iso-8859-1"?>
<factura>
  <id>{{ $factura['id']}}</id>
  <nombre>{{ $usuario['nombre'] }}</nombre>
  <direccion>{{ $usuario['direccion'] }}</direccion>
  <servicio>
    <nombre>Porroga</nombre>
    <articulo>'{{--*/ echo $articulo['nombre_producto']; /*--}}</articulo>
    <coste>{{ $factura['cantidad_pagada'] }}</coste>
    <iva>{{--*/ echo round(($factura['cantidad_pagada']*0.21), 2); /*--}}</iva>
  </servicio>
  <total>{{--*/ echo round(($factura['cantidad_pagada']*0.21+$factura['cantidad_pagada']), 2); /*--}}</total>
</factura>
