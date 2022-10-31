<?php
if(isset($_POST['nombre'])) {
    require("conecta.php");
    
    $usuarios = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE nombre = :usuarios AND contrasena = :contrasena";

    $datos = array(
        "usuarios" => $usuarios,
        "contrasena" => $contrasena
    );
    
    $stmt = $conn->prepare($sql);

    $stmt->execute($datos);
    if($stmt->rowCount() == 1){
        session_start();
        $_SESSION["usuarios"] = $usuarios;
        session_write_close();
        header("Location: index.php");
        exit(0);
    }
    header("Location: login.php");
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <label action="" method="post">Nombre: </label>
    <input type="text" id="nombre" name="nombre">
    <label for="">Contraseña: </label>
    <input type="password" id="contrasena" name="contrasena">
    <input type="submit" value="Login">
    </form>
    <a href="./registro.php">Registrarse</a>
</body>
</html>