<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Articulo;
use App\Puja;
use Carbon\Carbon;

class FinalizarVentas extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'FinalizarVentas:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

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
			if (Carbon::parse($articulo->fecha_final) >= $fecha) {
				$puja = Puja::where('articulo_id', '=', $articulo->id)->orderBy('created_at', 'desc')->take(1)->get();
				if (count($puja)!=0) {
					$articulo->precio_venta = $articulo->puja_mayor;
					$articulo->comprador_id = $puja[0]->id;
					$articulo->fecha_venda = $fecha->format('Y-m-d H:i:s');
					$articulo->save();
				} else {
					$articulo->precio_venta = 0;
					$articulo->save();
				}
			}
		}
	}
}