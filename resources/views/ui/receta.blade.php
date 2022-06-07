<div class="col-md-4 mt-4">
    <div class="card shadow">
        <img class="card-img-top" src="{{$receta->imagen}}" alt="imagen receta">
        <div class="card-body">
            <h3 class="card-title">{{$receta->titulo}}</h3>

            <div class="meta-receta d-flex justify-content-between" style="font-size:1.2rem;">
                @php
                    $fecha = $receta->created_at
                @endphp

                <!--<p class="text-primary fecha font-weight-bold">
                    <fecha-receta fecha="{{$fecha}}" ></fecha-receta>
                </p>-->
                <p class="text-primary fecha font-weight-bold">
                    {{ $receta->ciudad->nombre }}
                </p>
                <p> {{ count( $receta->likes ) }} Les gustó</p> 
            </div>
        
            <p> {{ Str::words(  strip_tags( $receta->descripcion ), 20, ' ...' ) }} </p>

            <a href="{{ route('recetas.show', ['receta' => $receta->id ])}}"
            class="btn btn-primary d-block font-weight-bold text-uppercase">Ver restaurante
            </a>
        </div>
    </div>
</div>