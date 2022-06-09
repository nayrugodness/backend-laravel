@extends ('layouts.app')

@yield('styles')

@section('content')

<section class="h-100 gradient-custom-2" style="width:100%; padding:0;">
  <div class="container h-100" style="width: 100%; padding:0;">
    <div class="row d-flex justify-content-center align-items-center h-100" style="width: 100%;margin:0; padding:0;">
      <div class="col-12">
        <div class="card">
          <div class="rounded-top d-flex flex-row" style="
          background-image: url('https://images.pexels.com/photos/260922/pexels-photo-260922.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
           height:340px; padding:2rem; 
           background-size: cover;
           background-position: center;
           background-repeat: no-repeat;
           ">
            <!--<div class="ms-4 mt-5 d-flex flex-column" style="width: 250px;">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
              <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                style="z-index: 1;">
                Edit profile
              </button>
            </div>-->
            <div class="" style="margin-top: 10rem;">
              <h2 style="color: white; text-transform:uppercase; font-weight:600;">{{ $receta->titulo }}</h2>
              <h4 style="color: white;">{{ $receta->ciudad->nombre }}</h4>
            </div>
          </div>
          <div class="p-4 text-black" style="
                background-color: #f8f9fa;">
            <div class="d-flex justify-content-center text-center"
                    style="
                        display:flex;
                        flex-direction: row;
                        flex-wrap:wrap;
                ">
              <div>
                <p class="mb-1 h5" style="color:#AC0202;">{{ $receta->direccion}}</p>
                <p class="small text-muted mb-0">Dirección</p>
              </div>
              <div>
                <p class="mb-1 h5" style="color:#AC0202;">{{ $receta->ciudad->nombre}}</p>
                <p class="small text-muted mb-0">Ciudad</p>
              </div>
              <div>
                <p class="mb-1 h5" style="color:#AC0202;">{{ $receta->categoria->nombre}}</p>
                <p class="small text-muted mb-0">Categoría</p>
              </div>
              <div>
                <p class="mb-1 h5" style="color:#AC0202;">{{ $receta->apertura}}</p>
                <p class="small text-muted mb-0">Hora de apertura</p>
              </div>
              <div>
                <p class="mb-1 h5" style="color:#AC0202;">{{ $receta->cierre}}</p>
                <p class="small text-muted mb-0">Hora de cierre</p>
              </div>
            </div>
          </div>
          <div class="card-body p-4 text-black" >
            <div class="mb-5">
              <p class="lead fw-normal mb-1" style="color:#AC0202; padding-bottom: 1rem;">Descripción</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <!--<p class="font-italic mb-1">Web Developer</p>
                <p class="font-italic mb-1">Lives in New York</p>
                <p class="font-italic mb-0">Photographer</p>-->
                <p style="color:black;"> {!! $receta->descripcion !!}</p>
              </div>
            </div>
            <!---<div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Recent photos</p>
              <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
            </div>
            <div class="row g-2">
              <div class="col mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
            <div class="row g-2">
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
