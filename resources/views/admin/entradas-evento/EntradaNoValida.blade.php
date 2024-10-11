@extends('layouts.app')

@section('template_title')
    {{ $entradasEvento->name ?? __('Show') . " " . __('Entradas Evento') }}
@endsection

@section('content')
<br />
    <section class="content container-fluid">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    

                    
                    <div class="card-body bg-danger">
                        
                                
                                <div class="form-group mb-3 mb20 text-center bg-error">
                                   LA ENTRADA NO ES VALIDA
                                </div>
                              
                    </div>




                </div>
            </div>
                

            </div>
        </div>

        
    </section>
@endsection
