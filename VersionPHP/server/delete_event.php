<?php
  $conexion = new mysqli('localhost','user_prueba','12345','agenda');
  if ($conexion->connect_error){
    $response['msg'] = 'Error: '.$conexion->connect_error;
  }else{
    $id = $_POST['id'];
    $sql="DELETE FROM eventos WHERE ID=$id";
    if ($result = $conexion->query($sql)){
      $response['msg'] = "OK";
      $conexion->close();
    }else{
      $response['msg'] = "Se presento un error en la eliminación del registro";
    }
  }
  echo json_encode($response);
 ?>
