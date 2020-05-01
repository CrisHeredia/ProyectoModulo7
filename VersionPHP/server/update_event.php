<?php
  /*$conexion = new mysqli('localhost','user_prueba','12345','agenda');
  if ($conexion->connect_error){
    $response['msg'] = 'Error: '.$conexion->connect_error;
  }else{
    $id = $_POST['id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $start_hour = $_POST['start_hour'];
    $end_hour = $_POST['end_hour'];
    $sql="UPDATE eventos SET FInicio='$start_date',FFin='$end_date',HInicio='$start_hour',HFin='$end_hour' WHERE ID=$id";
    if ($result = $conexion->query($sql)){
      $response['msg'] = "OK";
      $conexion->close();
    }else{
      $response['msg'] = $sql;
      //$response['msg'] = "Se presento un error en la actualización del registro";
    }
  }
echo json_encode($response);

UPDATE `eventos` SET `ID`=[value-1],`Titulo`=[value-2],`FInicio`=[value-3],`FFin`=[value-4],`HInicio`=[value-5],`HFin`=[value-6],`Duracion`=[value-7],`FKUsuario`=[value-8] WHERE 1
*/ ?>
