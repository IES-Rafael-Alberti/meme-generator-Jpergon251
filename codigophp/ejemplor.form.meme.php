<?php
//test_login...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="meme.php" method="post">
        <!-- Se crea campo oculto para trasladar el id del meme a la peticion post -->
        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
        <?php
         // bucle....
        ?>

        <input type="submit" value="Generar">
    </form>
</body>
</html>