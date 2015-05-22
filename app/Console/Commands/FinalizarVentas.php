<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Articulo;
use App\Puja;
use App\Usuario;
use App\Valoracion;
use Carbon\Carbon;
use Mail;

class FinalizarVentas extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'FinalizarVentas';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Finalize the auction and send an email to the users.';

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

	public function handle()
	{
		$articulos = Articulo::where('precio_venta', '=', -1)->get();
		foreach ($articulos as $articulo) {
			$fecha = Carbon::now();
			if (Carbon::parse($articulo->fecha_final) <= $fecha) {
				$puja = Puja::where('articulo_id', '=', $articulo->id)->orderBy('created_at', 'desc')->take(1)->get();
				if (count($puja)!=0) {
					$articulo->precio_venta = $articulo->puja_mayor;
					$articulo->comprador_id = $puja[0]->pujador_id;
					$articulo->fecha_venda = $fecha->format('Y-m-d H:i:s');
					$articulo->save();
					$comprador = Usuario::find($articulo->comprador_id);
					Mail::raw("¡¡¡¡¡¡Acabas de ganarte el derecho para reclamar tu $articulo->nombre_producto por solo $articulo->precio_venta!!!!!!", function($message) use ($comprador) {
						$message->from("3fym.info@gmail.com", "info");
						$message->to($comprador->email, $comprador->nombre)->subject('¡¡¡Felicidades has ganado la subasta!!!');
					});
					$vendedor = Usuario::find($articulo->subastador_id);
					Mail::raw("¡¡¡¡¡¡Tras la apabullante guerra de pujas el usuario $comprador->nombre se ha impuesto con una oferta de $articulo->precio_venta para llevarse a: $articulo->nombre_pructo, contacta con el para finalizar el tramite a su correo: $comprador->email !!!!!!", function($message) use ($vendedor) {
						$message->from("3fym.info@gmail.com", "info");
						$message->to($vendedor->email, $vendedor->nombre)->subject('La guerra por tu articulo ha concluido');
					});
					Valoracion::Create([
						'texto' => '',
						'valorado_id' => $vendedor->id,
						'validante_id' => $comprador->id,
						'puntuacion' => 1,
						'fecha' => Carbon::now(),
					]);
				} else {
					$articulo->precio_venta = 0;
					$articulo->save();
					$vendedor = Usuario::find($articulo->subastador_id);
					Mail::raw("Parece que has promocionado tu articulo en una mala fecha, tranquilo, siempre puedes prorrogar tu oferta un tiempo mas a ver si aparece la horda de pujadores que estaban en las sombras. Para la prorroga solo tienes que volver a tu panel de perfil y darle a la opcion en tu pagina web de subastas favorita!!!!! Cualquier duda la respondemos en el mail: 3fym.info@gmail.com", function($message) use ($vendedor) {
						$message->from("3fym.info@gmail.com", "info");
						$message->to($vendedor->email, $vendedor->nombre)->subject('Parece que necesitas mas tiempo');
					});
				}
			}
		}
	}
}