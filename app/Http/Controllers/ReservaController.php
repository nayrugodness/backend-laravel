<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\CiudadReceta;
use App\Receta;
use App\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // auth()->user()->recetas->dd();
        // $recetas = auth()->user()->recetas->paginate(2);

        $usuario = auth()->user();

        // Reservas con paginación
        //$reservas = Reserva::where('user_id', $usuario->id)->paginate(10);
        //$ciudades = Ciudad::where('user_id', $usuario->id)->paginate(2);

        return view('reservas.index');
            //->with('reservas', $reservas)
            //->with('usuario', $usuario);
            //->with('ciudades', $ciudades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Receta $receta)
    {
        $usuario = auth()->user();
        //$receta = Receta::all(['id', 'nombre']);

        return view('reservas.create')->with('usuario', $usuario)->with('receta', $receta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'hora' => 'date_format:H:i',
            'fecha' => 'date_format:Y:m:d',

        ]);

        // almacenar en la BD (con modelo)
        auth()->user()->reservas()->create([
            
            'hora' => $data['hora'],
            'fecha' => $data['fecha']
       ]);
        // Redireccionar
        return redirect()->action('ReservaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
         // Revisar el policy
         $this->authorize('update', $reserva);

         // validación
         $data = $request->validate([
            'hora' => 'date_format:H:i',
            'fecha' => 'date_format:Y:m:d',
         ]);

         // Asignar los valores
        $reserva->hora = $data['hora'];
        $reserva->fecha = $data['fecha'];

        // redireccionar
        return redirect()->action('ReservaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
         // Ejecutar el Policy
         $this->authorize('delete', $receta);

         // Eliminar la receta
         $reserva->delete();
 
         return redirect()->action('ReservaController@index');
    }
}
