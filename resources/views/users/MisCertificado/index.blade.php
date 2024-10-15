@extends('layouts.app')

@section('template_title')
    Certificados
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Certificados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('miscertificados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar nuevo certificado') }}
                                </a>
                              </div>
                        </div>
                    </div>
                   
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @else
                        @if ($error !="")
                            <div class="alert alert-danger m-4">
                                <p>{{ $error }}</p>
                            </div>
                        @endif
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                  
                                        
							
									<th >Estado</th>
									<th >Fecha Caducidad</th>
									<th >Archivo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($certificados as $certificado)
                                        <tr>
                                   
											<td >
                                           
                                                    @if($certificado->es_valido == 1)
                                                        @if($certificado->fecha_caducidad>=now())
                                                            Valido  
                                                        @else
                                                            Cadudado
                                                        @endif    
                                                    @else
                                                        @if($certificado->es_valido == -1)
                                                            Por validar    
                                                        @else
                                                            Invalido
                                                        @endif    
                                                    @endif
                                            
                                            </td>
                                       <td >{{ $certificado->fecha_caducidad }}</td>

										                                            <td>
                                                <form action="{{ route('miscertificados.destroy', $certificado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="/{{ $certificado->archivo }}"><i class="fa fa-fw fa-eye"></i> Descargar</a>
                                                    @if($certificado->es_valido == -1)
                                                                                                        
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Deseas eliminar el certificado?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
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
                {{-- {!! $certificados->withQueryString()->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
