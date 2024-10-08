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
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Eventos') }}
                        </span>

                        
                </div>

            </div>
        </div>
    </div>





    <div class="container-fluid">



    <div class="row">
    @foreach ($eventos as $eventos)
    <div class="m-1">
    <div class="card" style="width: 18rem;">
    <img src="/{{ $eventos->foto }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $eventos->titulo }}</h5>
      <p class="card-text">{{ $eventos->descripcion }}</p>
      
        <a class="btn btn-sm btn-primary " href="{{ route('ComprarEventos.show', $eventos->id) }}"><i class="fa fa-fw fa-eye"></i></a>
        {{-- <a class="btn btn-sm btn-success" href="{{ route('MisEventos.comprar', $eventos->id) }}"><i class="fa fa-fw fa-edit"></i></a> --}}
            
    
    </div>
  </div>
    </div>
  @endforeach
    </div>
</div>




@endsection
