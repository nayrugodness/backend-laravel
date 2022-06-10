@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{ route('reservas.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold" style="width: 10rem;">
        <svg class="icono" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
        Volver
    </a>
@endsection

@section('content')


    <div style="background-color:white;">
        <h2 class="text-center mb-1" style="color:#AC0202; font-size:1.8rem;">Editar Receta: {{$reserva->id}} </h2>


        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form method="POST" action="{{ route('reservas.update', ['reserva' => $reserva->id]) }}" enctype="multipart/form-data" novalidate>
                    @csrf

                    @method('PUT')
                    <div class="form-group" style="display:none;">
                        <label for="reserva_id" style="font-size:1.5rem;" style="display:none;">Mi reservación</label>

                        <input style="font-size:1.5rem;" type="text" style="display:none;"
                            name="reserva_id"
                            class="form-control @error('reserva_id') is-invalid @enderror "
                            id="reserva_id"
                            placeholder="{{ $reserva->id }}"
                            value={{ $reserva->id }}
                        >

                        @error('reserva_id')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                   
                    <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input
                                type="date"
                                class="form-control @error('fecha')  is-invalid  @enderror"
                                id="fecha"
                                name="fecha"
                                value="{{ old('fecha')}}"
                            >
                            @error('fecha')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                    
                    <div class="form-group">
                            <label for="hora">Hora</label>
                            <input
                                type="time"
                                class="form-control @error('hora')  is-invalid  @enderror"
                                id="hora"
                                name="hora"
                                value="{{ old('hora') }}"
                            >
                            @error('hora')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Reagendar mi reservación" style="width:100%; font-size:1.5rem;">
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection
