<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="cookie.php">
    <ul>
        <?php
          setcookie("cookie","Esta es la cookie creada del primer ejercicio");
        ?>
       <li><label>Crear una cookie con una duración de</label><input type="number" name="numero"><label>segundos (entre 1 y 60)<input type="submit" value="crear" name="crear"></label></li>
       <li><label>Comprobar la cookie</label><input type="submit" value="comprobar" name="comprobar"></li> 
       <li><label>Destruir la cookie</label><input type="submit" value="destruir" name="destruir"></li> 
    </ul>    
    </form>

    
</body>
</html>