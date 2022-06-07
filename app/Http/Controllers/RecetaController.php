<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\CiudadReceta;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\File;

class RecetaController extends Controller
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

        // Recetas con paginación
        $recetas = Receta::where('user_id', $usuario->id)->paginate(10);
        //$ciudades = Ciudad::where('user_id', $usuario->id)->paginate(2);

        return view('recetas.index')
            ->with('recetas', $recetas)
            ->with('usuario', $usuario);
            //->with('ciudades', $ciudades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // DB::table('categoria_receta')->get()->pluck('nombre', 'id')->dd();

        // Obtener las categorias (sin modelo)
        // $categorias =  DB::table('categoria_recetas')->get()->pluck('nombre', 'id');

        // Con modelo
        $categorias = CategoriaReceta::all(['id', 'nombre']);
        $ciudades = CiudadReceta::all(['id', 'nombre']);

        return view('recetas.create')->with('categorias', $categorias)->with('ciudades', $ciudades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd(  $request['imagen']->store('upload-recetas', 'public') );


        // validación
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'descripcion' => 'required',
            //'ingredientes' => 'required',
            'imagen' => 'required|image',
            'categoria' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'email' => 'required',
            'telefono' => 'required',

        ]);

        // obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        // Resize de la imagen
        //$img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $ruta_imagen->save();
        // almacenar en la bd (sin modelo)
        // DB::table('recetas')->insert([
        //     'titulo' => $data['titulo'],
        //     'preparacion' => $data['preparacion'],
        //     'ingredientes' => $data['ingredientes'],
        //     'imagen' => $ruta_imagen,
        //     'user_id' => Auth::user()->id,
        //     'categoria_id' => $data['categoria']
        // ]);

        // almacenar en la BD (con modelo)
        auth()->user()->recetas()->create([
             'titulo' => $data['titulo'],
             'descripcion' => $data['descripcion'],
             //'ingredientes' => $data['ingredientes'],
             'direccion' => $data['direccion'],
             'imagen' => $ruta_imagen,
             'email' => $data['email'],
             'telefono' => $data['telefono'],
             'categoria_id' => $data['categoria'],
             'ciudad_id' => $data['ciudad']
        ]);
        


        // Redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        // Obtener si el usuario actual le gusta la receta y esta autenticado
        $like = ( auth()->user() ) ?  auth()->user()->meGusta->contains($receta->id) : false; 

        // Pasa la cantidad de likes a la vista
        $likes = $receta->likes->count();

        return view('recetas.show', compact('receta', 'like', 'likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        // Revisar el policy
        $this->authorize('view', $receta);

        // Con modelo
        $categorias = CategoriaReceta::all(['id', 'nombre']);
        $ciudades = CiudadReceta::all(['id', 'nombre']);

        return view('recetas.edit', compact('categorias', 'receta', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {

        // Revisar el policy
        $this->authorize('update', $receta);

        // validación
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'descripcion' => 'required',
            'direccion' => 'required',
            'imagen' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'ciudad' => 'required',
            'categoria' => 'required',
        ]);

        // Asignar los valores
        $receta->titulo = $data['titulo'];
        $receta->descripcion = $data['descripcion'];
        $receta->direccion = $data['direccion'];
        $receta->email = $data['email'];
        $receta->telefono = $data['telefono'];
        $receta->ciudad_id = $data['ciudad'];
        $receta->categoria_id = $data['categoria'];



        // Si el usuario sube una nueva imagen
        if(request('imagen')) {
            // obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

            // Resize de la imagen
            $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            $img->save();

            // Asignar al objeto
            $receta->imagen = $ruta_imagen;
        }

        $receta->save();

        // redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        // Ejecutar el Policy
        $this->authorize('delete', $receta);

        // Eliminar la receta
        $receta->delete();

        return redirect()->action('RecetaController@index');
    }

    public function search(Request $request) 
    {
        // $busqueda = $request['buscar'];
        $busqueda = $request->get('buscar');

        $recetas = Receta::where('titulo', 'like', '%' . $busqueda . '%')->paginate(10);
        $recetas->appends(['buscar' => $busqueda]);

        return view('busquedas.show', compact('recetas', 'busqueda'));
    }
}
