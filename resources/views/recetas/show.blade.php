@extends ('layouts.app')



@section('content')

    {{-- <h1>{{ $receta}}</h1> --}}

    <article class="contenido-receta bg-white p-5 shadow" style="font-size:2rem;">
        <h1 class="text-center mb-4">{{$receta->titulo}}</h1>

        <div class="imagen-receta">
            <img src="/storage/{{ $receta->imagen }}" class="w-100">
        </div>

        <div class="receta-meta mt-2">
            <p style="display:flex; flex-direction:row; flex-wrap:wrap; justify-content:space-evenly;  ">
                <span class="font-weight-bold text-primary" style="font-size:1.5rem;"></span>
                <a class="text-dark" style="font-size:1.5rem;" href="{{ route('categorias.show', ['categoriaReceta' => $receta->categoria->id ]) }} ">
                    {{$receta->categoria->nombre}}
                </a>
                <span class="text-primary" style="font-size:1.5rem;">{{$receta->ciudad->nombre}}</span>
                <span class="text-secondary" style="font-size:1.5rem;">Quindío</span>
            </p>

            <!--<p>
                <span class="font-weight-bold text-primary" >Autor:</span>
                <a class="text-dark" href="{{ route('perfiles.show', ['perfil' => $receta->autor->id ]) }} ">
                    {{$receta->autor->name}}
                </a>

            </p>-->

            <!--<p>
                <span class="font-weight-bold text-primary">Fecha:</span>
                @php
                    $fecha = $receta->created_at
                @endphp

                <fecha-receta fecha="{{$fecha}}" ></fecha-receta>
            </p>-->


            <div style="">
                <div class="" style="font-size:1.3rem;">
                    <h2 class="text-primary"></h2>
                    {!! $receta->descripcion !!}
                </div>

                <div class="display:flex; flex-direction:row; flex-wrap: nowrap;">
                    <h3 class="text-primary mt-4">Correo electrónico: {!! $receta->email!!}</h3>
                    <h3 class="text-secondary mt-4">Teléfono: {!! $receta->telefono !!}</h3>
                </div>
            </div>
            

            <div class="justify-content-center row text-center">
                <like-button
                    receta-id="{{$receta->id}}"
                    like="{{$like}}"
                    likes="{{$likes}}"
                ></like-button>
            </div>




        </div>
    </article>
@endsection
