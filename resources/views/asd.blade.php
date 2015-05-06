<?php 
use App\Subcategoria;
use App\Categoria; 
?>

@extends('layouts.master')

<?php 
//$usu1 = new Usuario("Pedro","ROberto Garcia","YOUR HOME","PEPE","123456");
//$usu2 = new Usuario("Maria","Garcia","HOME","MARIA","123456",1);
//$usu1 = Usuario::find(18);
//$usu2 = Usuario::find(19);
//$date = date("Y-m-d");
//$usu1->save();
//$usu2->save();
//$val = new Valoracion;
//$val->texto="hola";
//$val->usuarios()->save($usu1);
//$val= new Valoracion($usu1,$usu2,1,$date,"HOLA MOLO MUCHO");
//$val->save();

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
?>

@section('articulos')






@stop