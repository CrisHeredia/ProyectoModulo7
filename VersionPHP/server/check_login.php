<?php
  $usuario = $_POST['username'];
  $password = $_POST['password'];

  $conexion = new mysqli('localhost','user_prueba','12345','agenda');
  if ($conexion->connect_error){
    $response['msg'] = 'Error: '.$conexion->connect_error;
  }else{
    $sql="SELECT * FROM usuarios WHERE Usuario='".$usuario."'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
    $hash = $row['Contrasena'];
    session_start();
    $_SESSION['userID'] = $row['ID'];
    if ($row == "") {
      $response['msg'] = 'Usuario no se encuentra registrado';
    }else {
      if (password_verify($password,$hash)) {
        $response['msg'] = 'OK';
      } else {
        $response['msg'] = 'Contraseña Incorrecta';
      }
    }
    $conexion->close();
  }
  echo json_encode($response);
?>
