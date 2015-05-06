<?php 
use App\Subcategoria;
use App\Categoria; 
use App\Usuario; 
use App\Mensaje; 
use App\LiniaM; 

echo "<h1>PRUEBAS</h1>";
echo "<h2>RELACIONES</h2>";
echo "<h3>Categoria&Subcategoria</h3>";
$cat= new Categoria;
$cat->nombre="nova";
$cat->descripcion="PLZ";
//$cat->save();

$temp = Categoria::find(1);

print_r("<pre>".$temp."</pre>");

//$sub=new Subcategoria;
//$sub->nombre="siva";
//$sub->descripcion="PLOZ";
//$sub->categoria_id=$temp->id;
//$sub->save();

print_r("<pre>".$temp->subcategorias."</pre>");

echo "<h3>Usuario&Mensajes</h3>";

// $us = new Usuario;
// $us->nombre="Pepe";
// $us->apellido="Maroto";
// $us->direccion="FOrtuny";
// $us->username="POP";
// $us->contrasena=123456;
// $us->save();

// $us2 = new Usuario;
// $us2->nombre="Pope";
// $us2->apellido="Mar";
// $us2->direccion="FOny";
// $us2->username="PO";
// $us2->contrasena=1236;
// $us2->save();

$te = Usuario::find(1);
$te2 = Usuario::find(2);

$date=date("Y-m-d");

// $m=new Mensaje;
// $m->titulo="megustas";
// $m->fecha=$date;
// $m->emisor_id=$te->id;
// $m->receptor_id=$te2->id;
// $m->save();

$tomp = Mensaje::find(1);

// $lm=new LiniaM;
// $lm->nombre="es todo tuyo";
// $lm->texto="la primera linia";
// $lm->mensaje_id=$tomp->id;
// $lm->save();

$to = Usuario::find(2);

print_r("<pre>".$to->Mrecibidos[0]->liniasM."</pre>");

?>