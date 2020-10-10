<?php

include 'conexion_be.php';
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$consulta="SELECT * FROM regitro_usuarios WHERE usuario='$usuario' and contrasena='$contrasena'";
$resultado=mysqli_query($conexion, $consulta);
$filas=mysqli_num_rows($resultado);

if ($filas>0) {
    echo'
        <script>
            window.location = "../ingreso.html";
        </script>
    ';
    exit();
}
else{
    echo'
    <script>
        window.location = "../sesion.html";
        
    </script>
';
exit();
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>