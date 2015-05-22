<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Usuario;
use App\Empresa;
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
			$usuario->touch();
			$updated = new Carbon($usuario->updated_at);
			if ($updated->diff($now)->days > $empresa[0]->inactividad) {
				Mail::raw("Hola!!! Parece que ultimamente no nos visitas, revisa las novedades y que no se te pase nada!!", function($message) use ($usuario) {
					$message->from("3fym.info@gmail.com", "info");
					$message->to($usuario->email, $usuario->nombre)->subject('Hola, cuanto tiempo');
				});
			}
		}
	}
}