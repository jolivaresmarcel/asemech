<!doctype html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <title>Diploma</title>
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="font/font.css" rel="stylesheet">
  <style type="text/css">



body {
  margin: 0;
  background-image: url(storage/{{$diploma->fondo}});
  background-size: 100%;
  /* background-image: url(https://1.bp.blogspot.com/-Hw5sPqZO3X0/TgeaXT3EHaI/AAAAAAAAA08/ZRRsuob-WDI/s1600/futurama-colash-1024x768-620.jpg); */
  /* background-image: url(http://images2.fanpop.com/images/photos/3300000/Futurama-futurama-3305641-1024-768.jpg);*/
  /*background-image: url(https://wasabibd.github.io/test-repo/images/Futurama.png);*/
  /* background-size: cover;
  background-position: center;
  background-color: while; */
 /* background-repeat: repeat-y;*/
}

#pagina {
  position: relative;
 
  /*750x609px*/
  /* filter: brightness(60%); sepia(0.8); */
  /* opacity: 0.5;  */
  margin: auto;
  width: 750px;
  height: 609px;
  z-index: 1;
}

h1 {
  position: relative;
  font-size: 45px;
  font-family: 'Homemade Apple', cursive;
  text-align: center;
  top: 190px;
  
}

h2 {
  position: relative;
  font-size: 30px;
  font-family: 'Verdana';
  text-align: center;
  top: 180px;
}

p {
  position: relative;
  text-align: center;
  margin: 0px 100px 0px 100px;
  top: 175px;
}

.tipo {
  opacity: none;
  font-weight: bold;
  text-transform: uppercase;
}

ul {
  position: relative;
  /* list-style-image: url("https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Futurama_Planet_Express.svg/220px-Futurama_Planet_Express.svg.png");*/
  margin: 0px 100px 0px 100px;
  text-align: center;
  top: 80px;
  font-size: smaller;
}

#sello {
  margin: auto;
  position: relative;
  width: 6%;
  /* height: 609px; */
 
  /* top: 65px;
  
  left: 180px; */
  /*transform: rotate(80deg); /*NO PONER ESPACIO*/
  /* filter: opacity(0.3); */
  /* Mas filtros??*/
   z-index: -5; 
}

#firma {
  position: relative;
  font-family: 'Homemade Apple', cursive;
  
  top: -160px;
  left: 850px;
}
  </style>
  </head>
  
  <body>
   
      {{-- @php
      $path = 'img/1.png';
      $type = pathinfo($path, PATHINFO_EXTENSION);
      $data = file_get_contents($path);
      $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
      @endphp
    
    <img id="sello" src="{{$base64}}"> --}}

  

    <div id="pagina">
      <h1>{{$diplomasUsuario->user->name}}</h1>
     
  
      <p>Asistencia {{$diplomasUsuario->asistencia}} nota {{$diplomasUsuario->nota}}</p>
  

      <img id="firma" src="img/logo.png"> 
   
      
    </div>
 
  </body>
  
  </html>