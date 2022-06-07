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
    <div style="background-color: white;">
        <h2 class="text-center mb-1" style="color:#AC0202; font-size:1.8rem;">Registra tu restaurante</h2>
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="titulo" style="font-size:1.5rem;">Nombre restaurante</label>

                        <input style="font-size:1.5rem;" type="text"
                            name="titulo"
                            class="form-control @error('titulo') is-invalid @enderror "
                            id="titulo"
                            placeholder="Nombre restaurante"
                            value={{ old('titulo') }}
                        >

                        @error('titulo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="direccion" style="font-size:1.5rem;">Dirección</label>

                        <input style="font-size:1.5rem;" type="text"
                            name="direccion"
                            class="form-control @error('direccion') is-invalid @enderror "
                            id="direccion"
                            placeholder="Escribe la dirección"
                            value={{ old('direccion') }}
                        >

                        @error('direccion')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telefono" style="font-size:1.5rem;">Teléfono</label>

                        <input style="font-size:1.5rem;" type="text"
                            name="telefono"
                            class="form-control @error('telefono') is-invalid @enderror "
                            id="telefono"
                            placeholder=""
                            value={{ old('telefono') }}
                        >

                        @error('telefono')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" style="font-size:1.5rem;">Correo electrónico</label>

                        <input style="font-size:1.5rem;" type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror "
                            id="email"
                            placeholder="email"
                            value={{ old('email') }}
                        >

                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    

                    <div class="from-group">
                        <label for="categoria" style="font-size:1.5rem;">Categoria</label>

                        <select style="font-size:1.5rem;"
                            name="categoria"
                            class="form-control @error('categoria') is-invalid @enderror "
                            id="categoria"
                        >
                            <option value="" style="font-size:1.5rem;">-- Seleccione -</option>
                            @foreach ($categorias as $categoria)
                                <option 
                                    value="{{ $categoria->id }}" 
                                    {{ old('categoria') == $categoria->id ? 'selected' : '' }} 
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
                        <label for="ciudad" style="font-size:1.5rem;">Ciudad</label>

                        <select style="font-size:1.5rem;"
                            name="ciudad"
                            class="form-control @error('ciudad') is-invalid @enderror "
                            id="ciudad"
                        >
                            <option value="" style="font-size:1.5rem;">-- Seleccione -</option>
                            @foreach ($ciudades as $ciudad)
                                <option 
                                    value="{{ $ciudad->id }}" 
                                    {{ old('ciudad') == $ciudad->id ? 'selected' : '' }} 
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
                        <label for="descripcion" style="font-size:1.5rem;">descripcion</label>
                        <input id="descripcion" style="font-size:1.5rem;" type="hidden" name="descripcion" value="{{ old('descripcion') }}">
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

                    <!--<div class="form-group mt-3">
                        <label for="ingredientes">Ingredientes</label>
                        <input id="ingredientes" type="hidden" name="ingredientes" value="{{ old('ingredientes') }}">
                        <trix-editor 
                            class="form-control @error('ingredientes') is-invalid @enderror "
                            input="ingredientes"></trix-editor>

                        @error('ingredientes')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>-->

                    <div class="form-group mt-3">
                        <label for="imagen" style="font-size:1.5rem;">Elige la imagen</label>

                        <input style="font-size:1.5rem;"
                            id="imagen" 
                            type="file" 
                            class="form-control @error('imagen') is-invalid @enderror"
                            name="imagen"
                        >

                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Agregar restaurante" style="width:100%; padding-top:0.5rem;font-size:1.5rem;" >
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection