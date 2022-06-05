<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CiudadReceta;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function show(CiudadReceta $ciudadReceta) 
    {
        $ciudad = Receta::where('ciudad_id', $ciudadReceta->id)->paginate(3);

        return view('ciudad.show', compact('ciudad', 'ciudadReceta'));
    }
}