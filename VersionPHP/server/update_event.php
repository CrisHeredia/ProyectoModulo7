<?php
  $conexion = new mysqli('localhost','user_prueba','12345','agenda');
  if ($conexion->connect_error){
    $response['msg'] = 'Error: '.$conexion->connect_error;
  }else{
    $id = $_POST['id'];
    $start_date = $_POST['start_date'];
    $sql="UPDATE eventos SET FInicio='$start_date',FFin='$start_date' WHERE ID=$id";
    if ($result = $conexion->query($sql)){
      $response['msg'] = "OK";
      $conexion->close();
    }else{
      $response['msg'] = "Se presento un error en la actualización del registro";
    }
  }
echo json_encode($response);
?>
