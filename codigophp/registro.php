<?php
if(isset($_POST['nombre'])){

    require("conecta.php");

    $nombre = $_POST["nombre"];
    $contraseña = $_POST["contraseña"];
    $foto = $_FILES["foto"]["name"];


    $sql = "INSERT INTO usuarios (nombre,contraseña,foto) values(:nombre,:contrasena,:foto)";
    $datos = array(
        "nombre" => $nombre,
        "contrasena" => $contraseña,
        "foto" => $foto
    );

    $stmt = $conn->prepare($sql);

    if($stmt->execute($datos) != 1){
        print("No se pudo dar de alta");
        exit(0);
    }

    print("<br><img src='/fotos/$foto'><br>");

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
    <form action="">
    <label for="">Nombre: </label>
    <input type="text" id="nombre" name="nombre">
    <label for="">Contraseña: </label>
    <input type="password" id="contraseña" name="contraseña">
    <label for="">Foto: </label>
    <input type="file" id="foto" name="foto">
    <label for=""><input type="submit" value="Enviar"></label>

    </form>
</body>
</html>