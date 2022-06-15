@extends('layouts.app')



@section('content')
    <h2 class="text-center mb-5" style="color: white;">Tus reservaciones</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Restaurante</th>
                    <th scole="col">Ciudad</th>
                    <th scole="col">Dirección</th>
                    <th scole="col">Fecha</th>
                    <th scole="col">Hora</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($reservas as $reserva)
                    <tr>
                        <td> {{$reserva}} </td>
                        <td></td>
                        
                        <td>

                            <eliminar-receta
                                reserva-id={{$reserva->id}}
                            ></eliminar-receta>

                            <a href="{{ route('reservas.edit', ['reserva' => $reserva->id]) }} " class="btn btn-dark d-block mb-2">Editar</a>
                            <a href="{{ route('reservas.show', ['reserva' => $reserva->id]) }} " class="btn btn-success d-block">Ver</a>
                      
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
    </div>

@endsection
