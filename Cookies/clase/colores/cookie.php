<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET["crear"])){
            setcookie("cookie","Esta es la cookie creada del primer ejercicio",time()+$_GET["numero"]);
            if(isset($_COOKIE["cookie"])){
                echo "Cookie creada !!!";
                echo $_COOKIE["cookie"];
            }else{
                echo "Cookie no creada, revisa";
            }
        }elseif(isset($_GET["comprobar"])){

            if(isset($_COOKIE["cookie"])){
                echo "Comprobación !!! Su cookie continúa activa";
                echo $_COOKIE["cookie"];
            }else{
                echo "Comprobación !!! Su cookie NO SE ENCUENTRA CREADA";
            }
        }elseif(isset($_GET["destruir"])){
            

            if(isset($_COOKIE["cookie"])){
                setcookie("cookie","Esta es la cookie creada del primer ejercicio",time()-1);
            echo "Su cookie ha sido destruida";
            }else{
                echo "Mal !! Su cookie continúa creada";
            }

        }
    ?>
</body>
</html>