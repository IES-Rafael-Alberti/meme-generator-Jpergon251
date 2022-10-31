<?php
if(isset($_POST['nombre'])){

    require("conecta.php");

    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    $foto = $_FILES["foto"]["name"];

    file_put_contents("ejemplos/images/$foto", file_get_contents($_FILES["foto"]["tmp_name"]));

    $sql = "INSERT INTO usuarios (nombre, contrasena, foto) values (:nombre, :contrasena, :foto)";
    $datos = array(
        "nombre" => $nombre,
        "contrasena" => $contrasena,
        "foto" => $foto
    );

    $stmt = $conn->prepare($sql);

    if($stmt->execute($datos) != 1){
        print("No se pudo dar de alta");
        exit(0);
    }

    print("<br><img src='ejemplos/images/$foto' alt='Foto de perfil'><br>");

    exit(0);


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="">Nombre: </label>
    <input type="text" id="nombre" name="nombre">
    <label for="">Contraseña: </label>
    <input type="password" id="contrasena" name="contrasena">
    <label for="">Foto: </label>
    <input type="file" id="foto" name="foto">
    <label for=""><input type="submit" value="Enviar"></label>
    </form>
</body>
</html>