<?php 
use App\Usuario;
use App\Valoracion; 
?>

@extends('layouts.master')

<?php 
$usu1 = new Usuario("Pedro","ROberto Garcia","YOUR HOME","PEPE","123456");
$usu2 = new Usuario("Maria","Garcia","HOME","MARIA","123456",1);
$date = date("Y-m-d");
//$usu1->save();
//$usu2->save();
$val= new Valoracion($usu1,$usu2,1,$date,"HOLA MOLO MUCHO");
$val->save();

?>

@section('articulos')
<h1>{{$usu1->id}}</h1>
<h1>{{$usu1->nombre}}</h1>
<h1>{{$usu2->id}}</h1>
<h1>{{$usu2->nombre}}</h1>





@stop