<?php 
use App\Categorias;

?>
@extends('layouts.master')

@section('title', '¡PAG X')
@section('cargaLoquesea')

@stop
@section('inf-client')
<?php
//$p = new Categorias;
//$p->nombre='jajajaja';
//$p->save();
?>
@stop

@section('articulos')
<?php
$users = Categorias::all();
//for($i = 0; $i < count($users); $i++){


?>

@foreach ($users as $user)
    {{ $user->nombre}}
@endforeach
<div class="item item-animate col-xs-6 col-sm-4 col-md-4 col-lg-2 col-phone-12" style="-webkit-animation-delay:0ms;-moz-animation-delay:0ms;-o-animation-delay:0ms;animation-delay:0ms;">
                          <div class="item-inner clearfix">
                            <div class="badges"> </div>
                            <div class="item-img"> <a class="product-image" href="http://demo.snstheme.com/sns-riveshop/index.php/retis-lapen.html" title=" Retis lapen casen "> <span class="image-main"> <img src="http://demo.snstheme.com/sns-riveshop/media/catalog/product/cache/9/small_image/225x281.25/9df78eab33525d08d6e5fb8d27136e95/0/0/00007.jpg" alt=" Retis lapen casen "> </span> </a>
                            </div>
                            <div class="item-info">
                              <div class="info-inner">
                                <div class="item-title"> <a href="http://demo.snstheme.com/sns-riveshop/index.php/retis-lapen.html" onclick="javascript: return true" title=" Retis lapen casen "> <?php /*echo $users[$i]->nombre;*/ ?></a> </div>
                                <div class="item-content clearfix">
                                  <div class="item-price">
                                    <div class="price-box"> <span class="price">$125.00</span> </div>
                                  </div>
                                </div>
                                <div class="rating">
                                  <p class="no-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                </div>
                                <button title="Add to Cart" class="btn-cart" onclick="setLocation('http://demo.snstheme.com/sns-riveshop/index.php/checkout/cart/add/uenc/aHR0cDovL2RlbW8uc25zdGhlbWUuY29tL3Nucy1yaXZlc2hvcC9pbmRleC5waHAvP19fX3N0b3JlPXNwYWlu/product/274/form_key/nX6STUT8dkC9CBdX/')">Add to Cart</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php
                        //}
                         ?>
@stop
@section('content')
@stop