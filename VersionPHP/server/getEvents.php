<?php
  session_start();
  $usuario =  $_SESSION['userID'];
  if (isset($usuario)){
    $conexion = new mysqli('localhost','user_prueba','12345','agenda');
    if ($conexion->connect_error){
      $response['msg'] = 'Error: '.$conexion->connect_error;
    }else{
      $sql="SELECT * FROM usuarios WHERE Usuario='".$usuario."'";
      $result = $conexion->query($sql);
      $row = $result->fetch_assoc();
      $nroUsuario = $row['ID'];
      //$userID = $_SESSION['userID'];
      $sql="SELECT * FROM eventos WHERE FKUsuario='".$nroUsuario."'";
      $result = $conexion->query($sql);
      $row = $result->fetch_assoc();
      $nroUsuario = $row['FKUsuario'];
      $i=0;
      while ($nroUsuario = $row) {
        $response['eventos'][$i]['titulo'] = $row['Titulo'];
        $response['eventos'][$i]['start_date'] = $row['FInicio'];
        $response['eventos'][$i]['allDay'] = $row['Duracion'];
        $response['eventos'][$i]['end_date'] = $row['FFin'];
        $response['eventos'][$i]['end_hour'] = $row['HInicio'];
        $response['eventos'][$i]['start_hour'] = $row['HFin'];
        $response['eventos'][$i]['Usuario'] = $row['FKUsuario'];
        $i++;
      }
      $response['msg'] = 'OK';
      //$response['msg'] = $userID;
      //$conexion->close();
    }
  }else {
    $response['msg'] = "No se ha iniciado una sesión";
  }
  echo json_encode($response);
 ?>
