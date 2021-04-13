<?php
session_start();
include('conexion.php');

$codigo = $_POST['codigo'];

if ($codigo == $_SESSION['captcha']) {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $consulta = $_POST["consulta"];


    $insertar = "INSERT INTO consultas(nombre, apellido, correo, consulta) VALUES ('$nombre','$apellido','$correo','$consulta')";

    $resultado = mysqli_query($base_datos, $insertar);

    if (!$resultado) {

        echo 'Error LPM';
    } else {

        echo 'Se inserto';
    }

    mysqli_close($base_datos);

    header('Location: captcha_formulario.php?consulta_enviada');
} else {
    header('Location: captcha_formulario.php?error');
}