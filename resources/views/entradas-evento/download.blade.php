<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  
    <div style="text-align:right">
        <img width="30%" src="vendor/adminlte/dist/img/logoAsemech.png"/>
    </div>
    <div style="text-align: center; font: arial;">
        
      <h1>  {{ $entradasEvento->evento->titulo }} </h1>
    


   <table style="width: 70%">
    <tr>
        <td style="width: 20%"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate(Request::root()."/valida/". $entradasEvento->id ) ) !!}" /></td>
        <td style="vertical-align: text-top">
            
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
            <div class="form-group mb-3 mb20">
                <strong>Lugar:</strong>
                {{ $entradasEvento->lugar }}
                
               
            </div>

        </td>
       
    </tr>
   </table>
</div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>