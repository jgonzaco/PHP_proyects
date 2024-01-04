<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['eliminar'])){
        
            setcookie("cookie","Ejercicio cambio de cookie y de color",time()-1);
            echo "Su cookie ha sido eliminada";

        }
    ?>
    <a href="./ejer2.php">Volver página de inicio</a>
</body>
</html>