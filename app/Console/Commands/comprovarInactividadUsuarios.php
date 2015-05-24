<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Usuario;
use App\Empresa;
use App\Articulo;
use Mail;
use Carbon\Carbon;

class comprovarInactividadUsuarios extends Command {
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'comprovarInactividadUsuarios';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Comproves if the user has no activity, if that is true send an email.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$empresa = Empresa::all()->take(1);
		$usuarios = Usuario::all();
		$now = Carbon::now();
		foreach ($usuarios as $usuario) {
			$updated = new Carbon($usuario->updated_at);
			$diasInactivo = $updated->diff($now)->days;
			if ($diasInactivo > $empresa[0]->inactividad) {
				$articulos = Articulo::where('precio_venta', '=', -1)->orderBy('fecha_inicio', 'desc')->take(3);
				$data = ["usuario" => $usuario, "art1" => $articulos[0], "art2" => $articulos[1], "art3" => $articulos[2]];
				Mail::send("emails.inactivos", $data, function($message) use ($usuario) {
					$message->to($usuario->email, $usuario->nombre)->subject('Hola, cuanto tiempo');
				});
			}
		}
	}
}