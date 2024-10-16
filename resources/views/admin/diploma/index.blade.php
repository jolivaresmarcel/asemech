@extends('layouts.app')

@section('template_title')
    Diplomas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Diplomas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('diplomas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
								
									<th >Descripción</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diplomas as $diploma)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
									
										<td >{{ $diploma->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('diplomas.destroy', $diploma->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="/{{ $diploma->fondo }}"><i class="fa fa-fw fa-eye"></i> Descargar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('diplomas.edit', $diploma->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Esta seguro que desea eliminar el diploma?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                   @if($diploma->es_borrable==0)
                                                    <a class="btn btn-sm btn-secondary " href="{{'CrearNomina/'.$diploma->id}}">Crear nomina para certificado</a>
                                                    @else
                                                    <a class="btn btn-sm btn-secondary " href="{{'CrearNomina/'.$diploma->id}}">Refrescar nomina</a>
                                                    <a class="btn btn-sm btn-info " href="diplomas-usuarios">Ver nomina</a>
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
                {!! $diplomas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
