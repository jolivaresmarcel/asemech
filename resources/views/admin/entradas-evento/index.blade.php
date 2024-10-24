@extends('layouts.app')

@section('template_title')
    Entradas Eventos
@endsection

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                   <div class="card-header" style="background-color: #001a3b; color:rgb(255, 255, 255);">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Entradas Eventos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('entradas-eventos.create') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
								
									<th >Evento</th>
									<th >Usuario</th>
									<th >Tipo Entrada</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entradasEventos as $entradasEvento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										
										<td >{{ $entradasEvento->evento->titulo }}</td>
										<td >{{ $entradasEvento->user->name }}</td>
										<td >{{ $entradasEvento->tiposEntrada->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('entradas-eventos.destroy', $entradasEvento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('entradas-eventos.show', $entradasEvento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('entradas-eventos.edit', $entradasEvento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Seguro que desea eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    <a class="btn btn-sm btn-secondary " href="{{'download/'.$entradasEvento->id}}"><i class="fa fa-fw fas fa-download"></i> Descargar Entrada</a>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $entradasEventos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection


@section('js')
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<script>
    $(document).ready( function () {
    $('#table').DataTable({
        "language":{
            "search":           "Buscar",
            "lengthMenu":       "Mostrar _MENU_ registros por página",
            "info":             "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty":        "Sin registros que mostar",
            "emptyTable":       "No hay registros",
            "loadingRecords":   "Cargando...",
            "paginate":     {
                                "previous":     "Anterior",
                                "next":         "Siguente",
                                "first":        "Primero",
                                "last":         "Último"

            }
       
            
        }


    });
} );
</script>
@endsection
