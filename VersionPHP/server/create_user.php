<?php
  $conexion = new mysqli('localhost','user_prueba','12345','agenda');
  if ($conexion->connect_error){
    echo 'Error: '.$conexion->connect_error;
  }else{
    $password1 = password_hash('abc123', PASSWORD_DEFAULT);
    $password2 = password_hash('def456', PASSWORD_DEFAULT);
    $password3 = password_hash('ghi789', PASSWORD_DEFAULT);
    $sql="INSERT INTO usuarios VALUES (1,'p_rodriguez@hotmail.com','Patricia Rodriguez','$password1','1985-08-31'),
                                      (2,'m_aguilera@gmail.com','María Aguilera','$password2','1980-12-28'),
                                      (3,'jj_jaramillo@gmail.com','Juan José Jaramillo','$password3','1983-10-12')";
    if (mysqli_query($conexion,$sql)){
      echo "<br> Se crearon los registros correctamente";
    }else{
      echo "<br> Error: ".$sql."<br>".mysqli_error($conexion);
    }
    $conexion->close();
  }
?>
