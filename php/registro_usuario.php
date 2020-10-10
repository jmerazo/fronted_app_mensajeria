<?php

include 'conexion_be.php';

$usuario_regis = $_POST['usuario_regis'];
$contra_regis = $_POST['contra_regis'];
$correo_regis = $_POST['correo_regis'];
$cel_regis = $_POST['cel_regis'];

$query = "INSERT INTO regitro_usuarios(usuario, contrasena, correo, celular)
VALUES('$usuario_regis', '$contra_regis', '$correo_regis', '$cel_regis')";
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM regitro_usuarios WHERE usuario='$usuario_regis' ");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo'
        <script>
            alert("Este Usuario no se encuentra disponible");
            window.location = "../registro.html";
        </script>
    ';
    exit();
}
$verificar_correo = mysqli_query($conexion, "SELECT * FROM regitro_usuarios WHERE correo='$correo_regis' ");
if(mysqli_num_rows($verificar_correo) > 0){
    echo'
        <script>
            alert("Este correo ya se encuentra registrado");
            window.location = "../registro.html";
        </script>
    ';
    exit();
}
$ejecutar = mysqli_query($conexion, $query);

if($ejecutar)
{
    echo '
    <script>
        window.location = "../sesion.html";
    </script>
    ';
}else{
    echo '
    <script>
        window.location = "../registro.html";
    </script>
    ';
}
?>