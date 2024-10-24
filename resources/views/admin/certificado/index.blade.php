@extends('layouts.app')

@section('template_title')
    Certificados
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
                                {{ __('Certificados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('certificados.create') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
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
                                        
									<th >Usuario</th>
									<th >Estado</th>
									<th >Fecha Caducidad</th>
									

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($certificados as $certificado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $certificado->user->name }}</td>
										<td >
                                            @if($certificado->es_valido == 1)
                                            @if($certificado->fecha_caducidad>=now())
                                                Válido  
                                            @else
                                                Caducado
                                            @endif    
                                        @else
                                            @if($certificado->es_valido == -1)
                                                Por validar    
                                            @else
                                                Inválido
                                            @endif    
                                        @endif
                                        </td>
										<td >{{ $certificado->fecha_caducidad }}</td>
										
                                            <td>
                                                <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="/storage/{{ $certificado->archivo }}"><i class="fa fa-fw fa-eye"></i> Descargar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('certificados.edit', $certificado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Seguro que deseas eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $certificados->withQueryString()->links() !!}
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
