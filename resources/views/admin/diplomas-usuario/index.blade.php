@extends('layouts.app')

@section('template_title')
    Diplomas Usuarios
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
                                {{ __('Nómina para crear diplomas') }}
                            </span>

                            @if($id >0)
                             <div class="float-right">
                                <a href="CrearNomina\{{ $id }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                  {{ __('Refrescar nómina') }}
                                </a>
                              </div>
                              @endif
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
                                        {{-- <th>No</th> --}}
                                        
									<th >Evento</th>
									<th >Usuario</th>
                                    <th >Rut</th>
									<th >Plantilla Diploma</th>
									<th >Nota</th>
									<th >Asistencia</th>
							

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diplomasUsuarios as $diplomasUsuario)
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}
                                            
										<td >{{ $diplomasUsuario->evento->titulo }}</td>
										<td >{{ $diplomasUsuario->user->name }}</td>
                                        <td >{{ $diplomasUsuario->user->rut }}</td>
										<td >{{ $diplomasUsuario->diploma->descripcion }}</td>
										<td >{{ $diplomasUsuario->nota }}</td>
										<td >{{ $diplomasUsuario->asistencia }}</td>
									

                                            <td>
                                                <form action="{{ route('diplomas-usuarios.destroy', $diplomasUsuario->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('diplomas-usuarios.show', $diplomasUsuario->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a> --}}
                                                    @csrf
                                                    @if($diplomasUsuario->publicado==0)
                                                        <a class="btn btn-sm btn-success" href="{{ route('diplomas-usuarios.edit', $diplomasUsuario->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        <a class="btn btn-sm btn-secondary " href="/publicar/{{ $diplomasUsuario->id}}">Publicar diploma</a>
                                                        @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Seguro que deseas eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    @else
                                                        <a class="btn btn-sm btn-info" href="/DownloadDiploma/{{ $diplomasUsuario->id}}"><i class="fa fa-fw fas fa-award"></i> {{ __('Ver diploma') }}</a>
                                                   
                                                    
                                                    
                                                    @endif
                                                </form>
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
