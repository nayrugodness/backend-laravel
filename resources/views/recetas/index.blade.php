@extends('layouts.app')

@section('botones')
    @include('ui.navegacion')
@endsection

@section('content')
    <h2 class="text-center mb-5" style="color: white;">Administra tus restaurantes</h2>

    <div class="col-md-10 col-lg-10 col-sm-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Nombre</th>
                    <th scole="col">Imagen principal</th>
                    <th scole="col">Ciudad</th>
                    <th scole="col">Categoría</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($recetas as $receta)
                    <tr>
                        <td> {{$receta->titulo}} </td>
                        <td>  <img src="/storage/{{ $receta->imagen }}" style="width:10rem; height: 8rem;"></td>
                        <td>{{ $receta->ciudad->nombre}}</td>
                        <td> {{$receta->categoria->nombre}} </td>
                        <td>

                            <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }} " class="btn btn-info d-block mb-2">Editar</a>
                            <a href="{{ route('reservas.reservations', ['receta' => $receta->id]) }} " class="btn btn-info d-block mb-2">Reservas</a>
                            <a href="{{ route('recetas.show', ['receta' => $receta->id]) }} " class="btn btn-success d-block" style="margin-bottom:0.5rem;">Ver</a>
                            <eliminar-receta
                                receta-id={{$receta->id}}
                            ></eliminar-receta>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h2 class="text-center m-3" style="color: white;">Mis restaurantes favoritos</h2>

    <div class="col-md-10 col-lg-10 col-sm-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                    <tr>
                        <th scole="col">Nombre</th>
                        <th scole="col">Imagen principal</th>
                        <th scole="col">Ciudad</th>
                        <th scole="col">Categoría</th>
                       <th scole="col">Reservar</th></th>
                    </tr>
            </thead>
            <tbody>
                @if ( count( $usuario->meGusta ) > 0 )
                    <td class="list-group">
                        @foreach( $usuario->meGusta as $receta )
                            
                        <tr>
                            <td> {{$receta->titulo}} </td>
                            <td>  <img src="/storage/{{ $receta->imagen }}" style="width:10rem; height: 8rem;"></td>
                            <td>{{ $receta->ciudad->nombre}}</td>
                            <td> {{$receta->categoria->nombre}} </td>
                            <td>

                                 <a class="btn btn-primary" href="{{ route('recetas.show', ['receta' => $receta->id ])}}">Ver</a>
                            </td>
                        </tr>
                                <!--<a class="btn btn-primary" href="{{ route('recetas.show', ['receta' => $receta->id ])}}">Ver</a>-->
                            
                        @endforeach
                    </td>
                @else
                    <p class="text-center" style="font-size:1.5rem; color:black;">Aún no tienes restaurantes favoritos guardados
                        <small> Dale me gusta a los restaurantes y aparecerán aquí</small>
                    </p>

                @endif
            </tbody>
       
        </table>

        <!--<div class="col-12 mt-4 justify-content-center d-flex">
            {{ $recetas->links() }}
        </div>-->


        <!--<h2 class="text-center my-5">Restaurantes que te gustan</h2>
        <div class="col-md-10 col-lg-10 col-sm-10 mx-auto bg-white p-3">

            @if ( count( $usuario->meGusta ) > 0 )
                <ul class="list-group">
                    @foreach( $usuario->meGusta as $receta )
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <p> {{$receta->titulo}}</p>

                            <a class="btn btn-outline-success text-uppercase font-weight-bold" href="{{ route('recetas.show', ['receta' => $receta->id ])}}">Ver</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center" style="font-size:1.5rem; color:black;">Aún no tienes restaurantes favoritos guardados
                    <small> Dale me gusta a los restaurantes y aparecerán aquí</small>
                </p>

            @endif
        </div>-->

   

@endsection
