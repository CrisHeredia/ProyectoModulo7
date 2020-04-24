<?php
  session_start();
  //$usuario = $_COOKIE['username'];
  $usuario =  $_SESSION['userID'];
  if (isset($usuario)){
    $conexion = new mysqli('localhost','user_prueba','12345','agenda');
    if ($conexion->connect_error){
      $response['msg'] = 'Error: '.$conexion->connect_error;
    }else{
      $titulo = $_POST['titulo'];
      $start_date = $_POST['start_date'];
      $allday = $_POST['allday'];
      $end_date = $_POST['end_date'];
      $end_hour = $_POST['end_hour'];
      $start_hour = $_POST['start_hour'];
      //$sql="SELECT * FROM usuarios WHERE Usuario='".$newusuario."'";
      //$result = $conexion->query($sql);
      // = $result->fetch_assoc();
      //$nroUsuario = $row['ID'];
      $sql="INSERT INTO eventos VALUES ($titulo,$start_date,$end_date,$start_hour,$end_hour,$allday,$userID)";
      if (mysqli_query($conexion,$sql)){
        $response['msg'] = "OK";
      }else{
        $response['msg'] = "<br> Error: ".$sql."<br>".mysqli_error($conexion);
      }
      //$conexion->close();
    }
  }else{
    $response['msg'] = "No se ha iniciado una sesión";
  }
  echo json_encode($response);
  echo $usuario;
 ?>
