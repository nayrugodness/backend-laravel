@extends('layouts.app')



@section('content')
    <h2 class="text-center mb-5" style="color: white;">Reservaciones de tus comensales</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Nombre</th>
                    <th scole="col">Correo</th>
                    <th scole="col">Fecha</th>
                    <th scole="col">Hora</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($reservas as $reserva)
                    <tr>
                        <td> {{$reserva->usuario->name}} </td>
                        <td>{{ $reserva->usuario->email }} </td>
                        <td>{{ $reserva->fecha }}</td>
                        <td>{{ $reserva->hora}} </td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>

        
    </div>

@endsection