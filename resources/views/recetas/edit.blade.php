@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg class="icono" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
        Volver
    </a>
@endsection

@section('content')

    <h2 class="text-center mb-5">Editar Receta: {{$receta->titulo}} </h2>


    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.update', ['receta' => $receta->id]) }}" enctype="multipart/form-data" novalidate>
                @csrf

                @method('PUT')
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>

                    <input type="text"
                        name="titulo"
                        class="form-control @error('titulo') is-invalid @enderror "
                        id="titulo"
                        placeholder="Titulo Receta"
                        value="{{ $receta->titulo }}"
                    >

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="direccion">direccion</label>

                    <input type="text"
                        name="direccion"
                        class="form-control @error('direccion') is-invalid @enderror "
                        id="direccion"
                        placeholder="direccion"
                        value="{{ $receta->direccion }}"
                    >

                    @error('direccion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">telefono</label>

                    <input type="text"
                        name="telefono"
                        class="form-control @error('telefono') is-invalid @enderror "
                        id="telefono"
                        placeholder="telefono"
                        value="{{ $receta->telefono }}"
                    >

                    @error('telefono')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="from-group">
                    <label for="categoria">Categoria</label>

                    <select
                        name="categoria"
                        class="form-control @error('categoria') is-invalid @enderror "
                        id="categoria"
                    >
                        <option value="">-- Seleccione -</option>
                        @foreach ($categorias as $categoria)
                            <option
                                value="{{ $categoria->id }}"
                                {{ $receta->categoria_id == $categoria->id ? 'selected' : '' }}
                            >{{$categoria->nombre}}</option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="from-group">
                    <label for="ciudad">Ciudad</label>

                    <select
                        name="ciudad"
                        class="form-control @error('ciudad') is-invalid @enderror "
                        id="ciudad"
                    >
                        <option value="">-- Seleccione -</option>
                        @foreach ($ciudades as $ciudad)
                            <option
                                value="{{ $ciudad->id }}"
                                {{ $receta->ciudad_id == $ciudad->id ? 'selected' : '' }}
                            >{{$ciudad->nombre}}</option>
                        @endforeach
                    </select>

                    @error('ciudad')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="descripcion">Descripcion</label>
                    <input id="descripcion" type="hidden" name="descripcion" value="{{ $receta->descripcion }}">
                    <trix-editor
                        class="form-control @error('descripcion') is-invalid @enderror "
                        input="descripcion"
                    ></trix-editor>

                    @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group mt-3">
                    <label for="imagen">Elige la imagen</label>

                    <input
                        id="imagen"
                        type="file"
                        class="form-control @error('imagen') is-invalid @enderror"
                        name="imagen"
                    >

                    <div class="mt-4">
                        <p>Imagen Actual:</p>

                        <img src="/storage/{{$receta->imagen}}" style="width: 300px">
                    </div>

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta" >
                </div>

            </form>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection
