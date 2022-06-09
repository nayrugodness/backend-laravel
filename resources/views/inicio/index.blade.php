@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
@endsection

@section('hero')
    <div class="hero-categorias" style="text-align:center;">
        <form class="container h-100" action={{ route('buscar.show') }}>
            <div class="row h-100" style="display:flex; justify-content:center; align-items:center;">
                <div class="col-md-6 texto-buscar" style="text-align:center;">
                    <p class="display-4">Encuentra un restaurante para tu siguiente comida</p>

                    <input
                        type="search"
                        name="buscar"
                        class="form-control"
                        placeholder="Buscar restaurante"
                    />
                </div>
            </div>
        </form>
    </div>
    <div class="" style="width:100vw; height: 4rem;"></div>
@endsection

@section('content')
    

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mb-4">Nuevos Restaurantes</h2>

        <div class="owl-carousel owl-theme">
            @foreach ($nuevas as $nueva)
                <div class="card ">
                    <img src="https://images.pexels.com/photos/4694556/pexels-photo-4694556.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="imagen receta">

                    <div class="card-body h-100">
                        <h3>{{ Str::title( $nueva->titulo ) }}</h3>

                        <p style="color:black;"> {{ Str::words(  strip_tags( $nueva->descripcion ), 15 ) }} </p>

                        <a href=" {{ route('recetas.show', ['receta' => $nueva->id ]) }} "
                            class="btn btn-primary d-block font-weight-bold text-uppercase"
                        >Ver restaurante</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Los mejores restaurantes</h2>
        
        <div class="row">
            @foreach($votadas as $receta)
                @include('ui.receta')
            @endforeach
        </div>
    </div>


@endsection