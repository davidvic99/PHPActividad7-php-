<?php

    
    include('conexion.php');
    ?>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
<?php
    $equipoSelect = $_GET['nombreTeam'];
    
    $SelectIDequipo = mysqli_query($conexion, "SELECT `id_equipo` from `equipo` where `nombre` = '$equipoSelect'");
    foreach ($SelectIDequipo as $id) {
       $idTeam = $id['id_equipo'];
    }

    $consulta = mysqli_query($conexion, "SELECT `nombre`,`apellido`,`posicion`,`altura` from `jugador` where `equipo` = $idTeam");

    foreach ($consulta as $info) {
        $nombre[] = $info['nombre'];
        $apellido[] = $info['apellido'];
        $posicion[] = $info['posicion'];
        $altura[] = $info['altura'];
    }

    $cuenta2 = count($nombre);
    echo "<table>";
    echo "<th>Nombre</th><th>Apellido</th><th>Posicion</th><th>Altura</th>";
   
    for ($i=0; $i < $cuenta2; $i++) { 
       echo "<tr><td>$nombre[$i]</td><td>$apellido[$i]</td><td>$posicion[$i]</td><td>$altura[$i]<td></tr>";


    }
  
    echo "</table>";
    ?>
    </body>