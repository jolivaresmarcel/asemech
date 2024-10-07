<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <span class="card-title">Datos de entrada</span>
                    </div>
                    
                </div>

                
                <div class="card-body bg-white">
                    
                            
                            <div class="form-group mb-3 mb20">
                                <strong>Evento</strong>
                                {{ $entradasEvento->evento->titulo }}
                            </div>
                            <div class="form-group mb-3 mb20">
                                <strong>Nombre:</strong>
                                {{ $entradasEvento->user->nombre .' '. $entradasEvento->user->paterno }}
                            </div>
                            <div class="form-group mb-3 mb20">
                                <strong>Rut:</strong>
                                {{ $entradasEvento->user->rut }}
                            </div>
                            <div class="form-group mb-3 mb20">
                                <strong>Fecha Compra:</strong>
                                {{ $entradasEvento->fecha_compra }}
                            </div>

                </div>




            </div>
        </div>
            <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <span class="card-title">QR de validación</span>
                    </div>
              
                </div>

                
                <div class="card-body bg-white">
                    
                    {{QrCode::size(200)->email('hello@example.com')}}     
                   
                            <div class="form-group mb-2 mb20 text-center">
                                {!! QrCode::size(150)->generate(Request::root()."/valida/". $entradasEvento->id ) !!}
                                {{-- $entradasEvento->fecha_compra --}}
                            </div>

                </div>




            </div>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>