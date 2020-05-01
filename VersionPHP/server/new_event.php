<?php
session_start();
$usuario = $_SESSION['userID'];
if (isset($usuario)){
    $conexion = new mysqli('localhost','user_prueba','12345','agenda');
    if ($conexion->connect_error){
      $response['msg'] = 'Error: '.$conexion->connect_error;
    }else{
      $titulo = $_POST['titulo'];
      $start_date = $_POST['start_date'];
      $allday = $_POST['allDay'];
      $end_date = $_POST['end_date'];
      $end_hour = $_POST['end_hour'];
      $start_hour = $_POST['start_hour'];
      $sql="INSERT INTO eventos VALUES ("'"$titulo"','"$start_date"','"$end_date"','"$start_hour"','"$end_hour"','"$allday"','"$usuario)";
      if ($result = $conexion->query($sql)){
        $response['msg'] = "OK";
        $conexion->close();
      }else{
        $response['msg'] = $sql;
        //$response['msg'] = "Se presento un error en la inserción de datos";
      }
    }
  }else{
    $response['msg'] = "No se ha iniciado una sesión";
  }
  echo json_encode($response);
 ?>
