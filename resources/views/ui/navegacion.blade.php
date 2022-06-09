<div class="btns-container"
    style="
        display:flex; 
        flex-direction:row; 
        flex-wrap: wrap; 
        justify-content: space-around;
        width: 100%;">
    <a href="{{ route('recetas.create') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold" style="width: 20rem; margin-top:1rem;">
        Registrar restaurante
    </a>
    <a href="{{ route('perfiles.edit', ['perfil' => Auth::user()->id ]) }}" class="btn btn-outline-success mr-2 text-uppercase font-weight-bold" style="width: 20rem; margin-top:1rem;">
        Editar mi perfil</a>
    <a href="{{ route('perfiles.show', ['perfil' => Auth::user()->id ]) }}" class="btn btn-outline-info mr-2 text-uppercase font-weight-bold" style="width: 20rem; margin-top:1rem;">
        Ver mi perfil
    </a>
</div>