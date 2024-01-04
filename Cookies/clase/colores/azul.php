<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        if(isset($_POST["azul"])){// Compruebo que viene del post azul.
            if(isset($_COOKIE["cookie"])){ // compruebo que existe la cookie.
                echo $_COOKIE["cookie"];
                echo "<br>";
                echo "Esta cookie, no tiene tiempo asignado tiempo por lo que tiene que pulsar en el botón de cambio de cookie o eliminar";
                echo "<style>body{background-color:blue}</style>";
            }else{
                echo "cookie no creada, revisa";// sino hay cookie que me avise con este mensaje.
            }
        }
    ?>
    <form method="post" action="verde.php">
        <label>Cambio de cookie: </label><input type="submit" value="verde" name="verde">
    </form>
    <form method="post" action="eliminar.php">
        <label>Elimnar cookie: </label><input type="submit" value="eliminar" name="eliminar">
    </form>
</body>
</html>