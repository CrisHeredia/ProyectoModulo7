<?php
  $usuario = $_POST['username'];
  $password = $_POST['password'];
  $conexion = new mysqli('localhost','user_prueba','12345','agenda');
  $sql="SELECT * FROM usuarios WHERE Usuario='".$usuario."'";
  $result = $conexion->query($sql);
  $row = $result->fetch_assoc();
  $hash = $row['Contrasena'];
  if ($row=="") {
    echo "Usuario no se encuentra registrado";
  }else {
    if (password_verify($password,$hash)) {
      echo 'OK';
    } else {
      echo 'Contraseña incorrecta';
    }
  }
  //
  //echo $response;
  //echo "el usuario es: ".$usuario." y password: "'La contraseña no es válida.'
