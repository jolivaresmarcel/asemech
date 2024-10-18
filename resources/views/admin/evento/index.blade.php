@extends('layouts.app')

@section('template_title')
    Eventos
@endsection

@section('content')
   

    <br>


    @if ($message = Session::get('success'))
    <div class="alert alert-success m-4">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <p>{{ $message }}</p>
       
      </div>
    </div>
@endif


    <div class="row">
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header" style="background-color: #001a3b; color:rgb(255, 255, 255);">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Eventos') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('eventos.create') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                              {{ __('Crear nuevo evento') }}
                            </a>
                         
                    </div>
                </div>

            </div>
        </div>
    </div>





    <div class="container-fluid">



    <div class="row">
    @foreach ($eventos as $eventos)
    <div class="m-1">
    <div class="card" style="width: 18rem;">
    <img src="/storage/{{ $eventos->foto }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{strtoupper( $eventos->titulo )}}</h5>
      {{-- <p class="card-text">{{ $eventos->descripcion }}</p> --}}
      <br /><br>
      <div class="text-right">
      <form action="{{ route('eventos.destroy', $eventos->id) }}" method="POST">        
        <a class="btn btn-sm btn-primary" alt="Ver Evento" href="{{ route('eventos.show', $eventos->id) }}"><i class="fa fa-fw fa-eye"></i></a>
        <a class="btn btn-sm btn-success" alt="Editar Evento" href="{{ route('eventos.edit', $eventos->id) }}"><i class="fa fa-fw fa-edit"></i></a>
        <a class="btn btn-sm btn-secondary" alt="Asistencia" href="{{ route('participaciones.index', $eventos) }}"><i class="far fa-id-card"></i></a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estas seguro que deseas eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i></button>
    </form>
  </div>
    </div>
  </div>
    </div>
  @endforeach
    </div>
</div>




@endsection
