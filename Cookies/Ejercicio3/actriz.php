<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


       if(isset($_POST["actriz"])){
                if(isset($_COOKIE["actor"])){
                    setcookie("actor","Esta es la cookie del actor",time()-1);

                    setcookie("actriz","Esta es la cookie de la actriz",time()+20);
                    echo "<p align='center'>Inma Cuesta</p>";
                    echo "<br>";
                    echo "<br>";
                    echo "<img src='inma.jpg'/>";
                }else{

                setcookie("actriz","Esta es la cookie de la actriz",time()+20);
                    echo "<p align='center'>Inma Cuesta</p>";
                    echo "<br>";
                    echo "<br>";
                    echo "<img src='inma.jpg'/>";

            }

        }
        
    ?>
</body>
</html>