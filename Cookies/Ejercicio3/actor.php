<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        
        if(isset($_POST["actor"])){

            if(isset($_COOKIE["actriz"])){
                setcookie("actriz","Esta es la cookie de la actriz",time()-1);

                setcookie("actor","Esta es la cookie del actor",time()+20);

                echo "<p align='center'>Antonio Banderas</p>";
                echo "<br>";
                echo "<img src='antonio.jpg'/>";
                echo "<a href='./ejer3.php>volver</a>'";
            }else{

            setcookie("actor","Esta es la cookie del actor",time()+20);

                    echo "<p align='center'>Antonio Banderas</p>";
                    echo "<br>";
                    echo "<img src='antonio.jpg'/>";
                    echo "<a href='./ejer3.php>volver</a>'";
            }
        }
        
    ?>
</body>
</html>