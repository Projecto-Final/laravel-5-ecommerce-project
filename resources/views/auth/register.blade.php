@extends('layouts.madre')

@section('registro_login')

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
										<strong>Whoops!</strong> There were some problems with your input.<br><br>
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
												</div>
											</div>
											<div class="field name-lastname">
												<label for="apellidos" class="required"><em>*</em>Apellidos</label>
												<div class="input-box">
													<input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}" title="Apellido" maxlength="255" class="input-text required-entry">
												</div>
											</div>
										</div>
									</li>
									<li>
										<label for="apodo" class="required"><em>*</em>Apodo</label>
										<div class="input-box">
											<input type="text" id="username" class="input-text validate-email required-entry"  name="username" value="{{ old('username') }}">
										</div>
									</li>
									<li class="control">
										<div class="input-box">
											<input type="checkbox" name="politica_privacidad" title="Sign Up for Newsletter" value="1" id="politica_privacidad" class="checkbox">
										</div>
										<label for="politica_privacidad">Acepto las condiciones de uso y politica de privacidad.</label>
									</li>
								</ul>
							</div>
							<div class="fieldset">
								<h2 class="legend">Información de Login</h2>
								<ul class="form-list">
									<li class="fields">
										<div class="field">
											<label for="confirmation" class="required"><em>*</em>Email</label>
											<div class="input-box">
												<input type="email" id="email_address" name="email" value="{{ old('email') }}" title="Correo Electronico" class="input-text validate-email required-entry">
											</div>
										</div>
									</li>
									<li class="fields">
										<div class="field">
											<label for="password" class="required"><em>*</em>Contraseña</label>
											<div class="input-box">
												<input type="password" name="password" id="password" title="password" class="input-text required-entry validate-password">
											</div>
										</div>
										<div class="field">
											<label for="confirmacion" class="required"><em>*</em>Confirmar Contraseña</label>
											<div class="input-box">
												<input type="password" name="password_confirmation" title="Confirm Password" class="input-text required-entry validate-cpassword">
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="buttons-set">
								<p class="required">* Campos requeridos</p>
								<p class="back-link"><a href="index.html" class="back-link">« Regresar al inicio</a></p>
								<button type="submit" title="Submit" class="button"><span><span>Registrar</span></span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
