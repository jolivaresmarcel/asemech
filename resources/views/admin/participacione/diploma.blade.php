<!doctype html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <title>Diploma Fry</title>
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
  <style>
    body {
  margin: 0;
  /*background-image: url(https://1.bp.blogspot.com/-Hw5sPqZO3X0/TgeaXT3EHaI/AAAAAAAAA08/ZRRsuob-WDI/s1600/futurama-colash-1024x768-620.jpg);*/
  /* background-image: url(http://images2.fanpop.com/images/photos/3300000/Futurama-futurama-3305641-1024-768.jpg);*/
  /*background-image: url(https://wasabibd.github.io/test-repo/images/Futurama.png);*/
  background-size: cover;
  background-position: center;
  background-color: black;
 /* background-repeat: repeat-y;*/
}

#pagina {
  position: relative;
  background-image: url(https://wasabibd.github.io/test-repo/images/diploma.png);
  /*750x609px*/
  filter: sepia(0.8);
  margin: auto;
  width: 750px;
  height: 609px;
  z-index: 0;
}

h1 {
  position: relative;
  font-size: 65px;
  font-family: 'Great Vibes', cursive;
  text-align: center;
  top: 90px;
}

h2 {
  position: relative;
  font-size: 30px;
  font-family: 'Great Vibes';
  text-align: center;
  top: 48px;
}

p {
  position: relative;
  text-align: justify;
  margin: 0px 100px 0px 100px;
  top: 65px;
}

.tipo {
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
  position: relative;
  width: 350px;
  top: 65px;
  top: -220px;
  left: 180px;
  /*transform: rotate(80deg); /*NO PONER ESPACIO*/
  filter: opacity(0.3);
  /* Mas filtros??*/
  z-index: -5;
}

#firma {
  position: relative;
  font-family: 'Homemade Apple', cursive;
  line-height: 20px;
  top: 50px;
  left: 320px;
}
  </style>
  </head>
  
  <body>
    <div id="pagina">
  
      <h1>Diploma certificado</h1>
      <h2>Trabajador reconocido de Planet Express</h2>
  
      <p>A la atención de <strong>Philip J. Fry</strong>, que por sus reconocidos méritos en la empresa <em>Planet Express</em> que se listan a continuación, se le otorga el siguiente diploma que certifica que ha realizado satisfactoriamente su labor como
        <span class="tipo">repartidor</span>:</p>
  
      <ul class="lista">
        <li>Entrega de material de reparto en Omicron Persei 8 sin ser devorado.</li>
        <li>Mantenimiento del robot doblador <strong>Bender Rodríguez</strong>.</li>
        <li>Puntualidad de llegada al trabajo (duerme en él).</li>
        <li>Buena conducta con otros empleados y robots.</li>
      </ul>
  
      <div id="firma">
        <p>Atentamente,</p>
        <p>Profesor H. Farnsworth</p>
      </div>
  
      <img id="sello" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Futurama_Planet_Express.svg/220px-Futurama_Planet_Express.svg.png">
    </div>
  </body>
  
  </html>