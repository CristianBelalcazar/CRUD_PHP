<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"]) || empty($_POST["txtDocumento"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once('/xampp/htdocs/Alumnos/model/conexion.php');
    
    $nombre = $_POST["txtNombre"];
    $edad = $_POST["txtEdad"];
   $documento = $_POST["txtDocumento"];
    
    $sentencia = $bd->prepare("INSERT INTO persona(nombre,edad,documentos) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$edad,$documento]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>