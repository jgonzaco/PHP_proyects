<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        if(isset($_POST["borrar"])){
            setcookie("actor","Esta es la cookie del actor",time()-1);
            setcookie("actriz","Esta es la cookie de la actriz",time()-1);
        
                echo "Cookie eliminada";
            
        }


    ?>
</body>
</html>