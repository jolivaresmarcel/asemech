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
   <table style="margin:10px; margin-left: 120px; width: 100%;">
    <tr>
        <td style="width: 20%"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate(Request::root()."/valida/". $entradasEvento->id ) ) !!}" /></td>
        <td style="padding:20px; text-top;">
             <strong> {{ strtoupper($entradasEvento->evento->titulo) }} </strong>
            <div class="form-group mb-3 mb20">
                <strong>NOMBRE:</strong>
                {{ strtoupper($entradasEvento->user->nombre .' '. $entradasEvento->user->paterno) }}
            </div>
            <div class="form-group mb-3 mb20">
                <strong>RUT:</strong>
                {{ $entradasEvento->user->rut }}
            </div>
            <div class="form-group mb-3 mb20">
                <strong>FECHA:</strong>
                {{ $entradasEvento->evento->inicio }}
            </div>
            <div class="form-group mb-3 mb20">
                <strong>LUGAR DEL EVENTO:</strong>
                {{ strtoupper($entradasEvento->evento->lugar) }}
                
               
            </div>

        </td>
       
    </tr>
   </table>



</body>
</html>