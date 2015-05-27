@extends('layouts.madre')

@section('registro_login')

<script type="text/javascript" src="{{ URL::asset('js/validaciones.js') }}"></script>

<div id="sns_content" class="wrap layout-m">
	<div class="container">
		<div class="row">
			<div id="sns_main" class="col-md-12 col-main">
				<div id="sns_mainmidle">
					<div class="account-create">
						<div class="page-title">
							<h1>Registrar nuevo usuario</h1>
						</div>
						<form role="form" method="POST" action="{{ url('/auth/register') }}" id="form-validate">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="fieldset">
								<input type="hidden" name="success_url" value="">
								<input type="hidden" name="error_url" value="">
								<h2 class="legend">Información Personal</h2>
								<ul class="form-list">
									@if (count($errors) > 0)
									<div class="alert alert-danger">
										<strong>Whoops!</strong> Hay algunos problemas con su envio.<br><br>
										<ul>
											@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
									@endif

									<li class="fields">
										<div class="customer-name">
											<div class="field name-firstname">
												<label for="nombre" class="required"><em>*</em>Nombre</label>
												<div class="input-box">
													<input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" title="Nombre" maxlength="255" class="input-text required-entry">
													<span class='errorJS' id='nombre_error'>&nbsp;Campo obligatorio</span>
													<span class='errorJS' id='nombre_error2'>&nbsp;Solo se permiten caracteres alfabeticos</span>
												</div>
											</div>
											<div class="field name-lastname">
												<label for="apellidos" class="required"><em>*</em>Apellidos</label>
												<div class="input-box">
													<input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}" title="Apellido" maxlength="255" class="input-text required-entry">
													<span class='errorJS' id='apellido_error'>&nbsp;Campo obligatorio</span>
													<span class='errorJS' id='apellido_error2'>&nbsp;Solo se permiten caracteres alfabeticos</span>
												</div>
											</div>
											<div class="field name-lastname">
												<label for="localidad_id" class="required"><em>*</em>Localidad</label>
												<div class="input-box">
													<select id="localidad_id" value="" title="localidad_id" name="localidad_id" maxlength="255" class="input-text required-entry">
														<option value="">Cargando...</option>
													</select>
													<span class='errorJS' id='localidad_id_error'>&nbsp;Campo obligatorio</span>
												</div>
											</div>
										</div>
									</li>
									<li>
										<label for="apodo" class="required"><em>*</em>Apodo</label>
										<div class="input-box">
											<input type="text" id="username" class="input-text validate-email required-entry"  name="username" value="{{ old('username') }}">
											<span class='errorJS' id='username_error'>&nbsp;Campo obligatorio</span>
										</div>
									</li>
									<li>
										<label for="apodo" class="direccion"><em>*</em>Direccion</label>
										<div class="input-box">
											<input type="text" id="direccion" class="input-text required-entry"  name="direccion" value="{{ old('direccion') }}">
											<span class='errorJS' id='direccion_error'>&nbsp;Campo obligatorio</span>
										</div>
										<label for="texto_presentacion" >Texto de Presentacion</label>
										<div class="input-box">

											<textarea name="texto_presentacion" id="texto_presentacion" rows="4" cols="50" value="{{ old('texto_presentacion') }}"></textarea>
										</div>
									</li>
								</ul>	

								
								<!-- <button type="submit" title="Submit" class="button" onclick='formValidatorr()'><span><span>Registrar</span></span></button> -->


							</div>
							<div class="fieldset">
								<h2 class="legend">Información de Login</h2>
								<ul class="form-list">
									<li class="fields">
										<div class="field">
											<label for="confirmation" class="required"><em>*</em>Email</label>
											<div class="input-box">
												<input type="email" id="email_address" name="email" value="{{ old('email') }}" title="Correo Electronico" class="input-text validate-email required-entry">
												<span class='errorJS' id='email_address_error'>&nbsp;Campo obligatorio</span>
												<span class='errorJS' id='email_address_error2'>&nbsp;Debe ser una direccion de correo valida</span>
											</div>
										</div>
									</li>
									<li class="fields">
										<div class="field">
											<label for="password" class="required"><em>*</em>Contraseña</label>
											<div class="input-box">
												<input type="password" name="password" id="password" title="password" class="input-text required-entry validate-password">
												<span class='errorJS' id='password_error'>&nbsp;Campo obligatorio</span>
												<span class='errorJS' id='password_error2'>&nbsp;La contraseña debe se der de almenos 6 caracteres</span>
											</div>
										</div>
										<div class="field">
											<label for="confirmacion" class="required"><em>*</em>Confirmar Contraseña</label>
											<div class="input-box">
												<input type="password" id="password_confirmation" name="password_confirmation" title="Confirm Password" class="input-text required-entry validate-cpassword">
												<span class='errorJS' id='password_confirmation_error2'>&nbsp;Las contraseñas deben coincidir</span>
												<span class='errorJS' id='password_confirmation_error'>&nbsp;Campo obligatorio</span>
											</div>
										</div>
									</li>
									<li class="control">
										<div class="input-box">
											<input type="checkbox" name="politica_privacidad" title="Sign Up for Newsletter" value="1" id="politica_privacidad" class="checkbox">
										</div>										
										<label for="politica_privacidad">Acepto las condiciones de uso y politica de privacidad. <a href="{{url('politica')}}" target="_blank">Clica aquí para ojearla.</a></label>
										<span class='errorJS' id='politica_privacidad_error'>&nbsp;Debe aceptar las condiciones de uso y politica de privacidad</span>
									</li>
								</ul>

							</div>

							<div class="buttons-set">
								<p class="required">* Campos requeridos</p>
								<p class="back-link"><a href="{{url()}}" class="back-link">« Regresar al inicio</a></p>
								<input type='button' title="Submit" class="button" onclick='formValidator()' value="Registrar"><span>
							</div>

						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		$.getJSON("{{ url('get_localidades') }}", function(result){
			var scatm = "<option value='ninguna'>Escoja una</option>";
			$.each(result, function(i, field){
				scatm += "<option value="+field.id+">"+field.nombre+"</option>";
			});
			$(".field select#localidad_id").html(scatm);
		});
	</script>

	@endsection
