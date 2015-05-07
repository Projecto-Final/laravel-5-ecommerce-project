@extends('app')

@section('content')
<?php 
$user = Auth::user();
?>
<h1>{{ "Bienvenido: ".Auth::user()->username }}</h1>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
