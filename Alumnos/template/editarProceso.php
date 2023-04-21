<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include ('/xampp/htdocs/Alumnos/model/conexion.php');
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $edad = $_POST['txtEdad'];
    $documento = $_POST ['txtDocumento'];

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, edad = ?, documentos = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $edad, $documentos, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>