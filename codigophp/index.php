<?php
require("conecta.php");
$usuarios = $conn->query("Select * from usuarios");
$usuarios_assoc = $usuarios->fetchAll(PDO::FETCH_ASSOC);
print("<table class='users'>");
foreach($usuarios_assoc as $user){
    print("<td>");
    print($user["nombre"]);
    print("</td>");
    print("<td>");
    print($user["foto"]);
    print("</td>");
    print("</tr>");
}
print("</table>");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
</head>
<body>
    <a href="phpinfo.php">phpinfo()</a>
    <a href="xdebug_info.php">xdebug_info()</a>
    
    <a href="./login.php">Login</a>
    <a href="./registro.php">Registrarse</a>

</body>
</html>