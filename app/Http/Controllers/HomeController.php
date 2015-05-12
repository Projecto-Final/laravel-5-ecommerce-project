<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * REDIRECCIONA AL INDEX, SI EL USUARIO LOGUEA SATISFACTORIAMENTE.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('index');
	}

	/**
	 * IMPRIME EL PANEL DE CONTROL DEL USUARIO A PETICION URL.
	 *
	 * @return Response
	 */
	public function cp_usuario()
	{
		return view('cp_usuario');
	}

	public function puja_usuario()
	{
		return view('puja_usuario');
	}

}
