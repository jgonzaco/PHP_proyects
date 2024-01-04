<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        setcookie("cookie","Ejercicio cambio de cookie y de color");
    ?>
<h1>Elige un color</h1>
<form method="post" action="azul.php">
    <label>Cookie color azul: </label><input type="submit" value="azul" name="azul">
</form>

<form method="post" action="verde.php">
    <label>Cookie color azul: </label><input type="submit" value="verde" name="verde">
</form>

</body>
</html>