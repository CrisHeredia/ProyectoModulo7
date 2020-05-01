<?php
  session_start();
  $usuario = $_SESSION['userID'];
  if (isset($usuario)){
    $conexion = new mysqli('localhost','user_prueba','12345','agenda');
    if ($conexion->connect_error){
      $response['msg'] = 'Error: '.$conexion->connect_error;
    }else{
      $sql="SELECT * FROM eventos WHERE FKUsuario=$usuario";
      if($result = $conexion->query($sql)) {
        $i=0;
        while ($row = $result->fetch_assoc()){
          $response['eventos'][$i]['id'] = $row['ID'];
          $response['eventos'][$i]['title'] = $row['Titulo'];
          $response['eventos'][$i]['start'] = $row['FInicio'].'T'.$row['HInicio'];
          $response['eventos'][$i]['allDay'] = $row['Duracion'];
          $response['eventos'][$i]['end'] = $row['FFin'].'T'.$row['HFin'];
          $i++;
        }
        $response['msg'] = 'OK';
        $conexion->close();
      }else{
        $response['msg'] ="Se presento un error en la extracción de datos";
      }
    }
  }else{
    $response['msg'] = "No se ha iniciado una sesión";
  }
  echo json_encode($response);
?>
