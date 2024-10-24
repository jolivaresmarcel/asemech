@extends('layouts.app')

@section('template_title')
    MisDiplomas 
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
                                {{ __('Mis diplomas') }}
                            </span>

                         
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
									<th >Nota</th>
									<th >Asistencia</th>
							

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diplomasUsuarios as $diplomasUsuario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $diplomasUsuario->evento->titulo }}</td>							
										<td >{{ $diplomasUsuario->nota }}</td>
										<td >{{ $diplomasUsuario->asistencia }}</td>
									

                                            <td>
                                               <a class="btn btn-sm btn-info" href="DownloadDiploma/{{ $diplomasUsuario->id}}"><i class="fa fa-fw fas fa-award"></i>  {{ __('Ver diploma') }}</a>
                                          
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $diplomasUsuarios->withQueryString()->links() !!}
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
