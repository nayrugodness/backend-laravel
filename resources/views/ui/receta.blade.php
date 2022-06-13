<div class="col-md-4 mt-4">
    <div class="card shadow">
        <img class="card-img-top" src="/storage/{{ $receta->imagen }}" alt="imagen receta" style="height:18rem;">
        <div class="card-body">
            <h3 class="card-title">{{$receta->titulo}}</h3>

            <div class="meta-receta d-flex justify-content-center" style="font-size:1.2rem;">
                
            <p style="color:black;"> {{ count( $receta->likes ) }} Les gustó</p>
                <p class="text-primary font-weight-bold">
                    {{ $receta->categoria->nombre }}
                </p>
                
                 
            </div>
            
            
            <!--<p style="color:black;"> {{ Str::words(  strip_tags( $receta->descripcion ), 10, ' ...' ) }} </p>--->

            <a href="{{ route('recetas.show', ['receta' => $receta->id ])}}"
            class="btn btn-primary d-block font-weight-bold text-uppercase">Ver más...
            </a>
        </div>
    </div>
</div>