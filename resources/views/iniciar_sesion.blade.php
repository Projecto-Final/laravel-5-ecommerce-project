<?php 
use App\Categoria;

?>
@extends('layouts.master')

@section('title', '¡PAG X')
@section('cargaLoquesea')

@stop
@section('inf-client')
<?php
$p = new Categoria;
$p->nombre='jajajaja';
$p->save();
?>
@stop

@section('articulos')

@stop

@section('content')
@stop