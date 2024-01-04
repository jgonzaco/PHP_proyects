<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
include_once "hombre.php";


$hombre1=new hombre("0254678A");

echo $hombre1->getDni();
echo hombre::$ciudad;

hombre::cambiarCiudad("Madrid");

echo hombre::pais;
    ?>
</body>
</html>