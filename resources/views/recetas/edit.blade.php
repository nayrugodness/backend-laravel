@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold" style="width: 10rem;">
        <svg class="icono" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
        Volver
    </a>
@endsection

@section('content')


    <div style="background-color:white;">
        <h2 class="text-center mb-1" style="color:#AC0202; font-size:1.8rem;">Editar Receta: {{$receta->titulo}} </h2>


        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form method="POST" action="{{ route('recetas.update', ['receta' => $receta->id]) }}" enctype="multipart/form-data" novalidate>
                    @csrf

                    @method('PUT')
                    <div class="form-group">
                        <label for="titulo" style="font-size:1.5rem;">Nombre del restaurante</label>

                        <input style="font-size:1.5rem;" type="text"
                            name="titulo"
                            class="form-control @error('titulo') is-invalid @enderror "
                            id="titulo"
                            placeholder="Nombre del restaurante"
                            value="{{ $receta->titulo }}"
                        >

                        @error('titulo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label style="font-size:1.5rem;" for="direccion">Direcci??n</label>

                        <input type="text"
                            name="direccion"
                            class="form-control @error('direccion') is-invalid @enderror "
                            id="direccion"
                            placeholder="Direcci??n"
                            value="{{ $receta->direccion }}"
                        >

                        @error('direccion')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label style="font-size:1.5rem;" for="email">Correo electr??nico</label>

                        <input style="font-size:1.5rem;" type="text"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror "
                            id="email"
                            placeholder="restautante@gmail.com"
                            value="{{ $receta->email }}"
                        >

                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label style="font-size:1.5rem;" for="telefono">Tel??fono</label>

                        <input type="text"
                            name="telefono"
                            class="form-control @error('telefono') is-invalid @enderror "
                            id="telefono"
                            placeholder=""
                            value="{{ $receta->telefono }}"
                        >

                        @error('telefono')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="from-group">
                        <label style="font-size:1.5rem;" for="categoria">Categoria</label>

                        <select style="font-size:1.5rem;"
                            name="categoria"
                            class="form-control @error('categoria') is-invalid @enderror "
                            id="categoria"
                        >
                            <option value="" style="font-size:1.5rem;">-- Seleccione -</option>
                            @foreach ($categorias as $categoria)
                                <option style="font-size:1.5rem;"
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
                        <label style="font-size:1.5rem;" for="ciudad">Ciudad</label>

                        <select style="font-size:1.5rem;"
                            name="ciudad"
                            class="form-control @error('ciudad') is-invalid @enderror "
                            id="ciudad"
                        >
                            <option style="font-size:1.5rem;" value="">-- Seleccione -</option>
                            @foreach ($ciudades as $ciudad)
                                <option style="font-size:1.5rem;"
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
                        <label style="font-size:1.5rem;" for="descripcion">Descripcion</label>
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

                    <div class="form-group">
                            <label for="nombre">Hora Apertura:</label>
                            <input
                                type="time"
                                class="form-control @error('apertura')  is-invalid  @enderror"
                                id="apertura"
                                name="apertura"
                                value="{{ old('apertura') }}"
                            >
                            @error('apertura')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

                        <div class="form-group">
                            <label for="nombre">Hora Cierre:</label>
                            <input
                                type="time"
                                class="form-control @error('cierre')  is-invalid  @enderror"
                                id="cierre"
                                name="cierre"
                                value="{{ old('cierre') }}"
                            >
                            @error('cierre')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    
                    <div class="form-group mt-3">
                        <label  style="font-size:1.5rem;" for="imagen">Elige la  imagen principal de tu restaurante</label>

                        <input style="font-size:1.5rem;"
                            id="imagen"
                            type="file"
                            class="form-control @error('imagen') is-invalid @enderror"
                            name="imagen"
                        >
                        

                        <div class="mt-2">
                            <p style="font-size:1.5rem;">Imagen actual:</p>

                            <img src="/storage/{{$receta->imagen}}" style="width: 300px">
                        </div>

                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label  style="font-size:1.5rem;" for="imagen">A??ade el men?? de tu restaurante</label>

                        <input style="font-size:1.5rem;"
                            id="menu"
                            type="file"
                            class="form-control @error('menu') is-invalid @enderror"
                            name="menu"
                        >
                        

                        <div class="mt-2">
                            <p style="font-size:1.5rem;">Men?? actual:</p>

                            <img src="/storage/{{$receta->menu}}" style="width: 300px">
                        </div>

                        @error('menu')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Editar mi restaurante" style="width:100%; font-size:2rem;">
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection
