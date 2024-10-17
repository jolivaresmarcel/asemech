@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Evento
@endsection

@section('content')
<br>
    <section class="content container-fluid">
                <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header" style="background-color: #001a3b; color:rgb(255, 255, 255);">
                        <span class="card-title bg">{{ __('Update') }} Evento</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('eventos.update', $evento->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.evento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
