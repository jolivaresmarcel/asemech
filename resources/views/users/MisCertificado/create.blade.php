@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Certificado
@endsection

@section('content')
<br />
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Certificado de alumno regular</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('miscertificados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('users.miscertificado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
