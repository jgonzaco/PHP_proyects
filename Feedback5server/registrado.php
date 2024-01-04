<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Añado la función para usarla posteriormente y ver si coinciden ambas contraseñas.
function coincidenContrasenias($contrasenia, $contraseniaBD)
    {
    return password_verify($contrasenia, $contraseniaBD);
    }


    //Verifico que los datos introducidos son coinciden para poder ir a la página de registrado.php

    // primero realizo la conexión a BBDD y posteriormente verifico si coincide el usuario y la contrasenia.
    try{
        $cone="mysql:host=localhost; dbname=acceso_usuarios";

        $conexiondb = new PDO($cone,"root",""); //Realizo la conexión. No puse ninguna contraseña.
        $conexiondb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);// Veo posibles errores


        $consulta=$conexiondb->prepare("SELECT * FROM usuarios"); // Realizo la consulta.
        $consulta->execute(); // Ejecuto consulta. 

        $resultados = $consulta->fetchall(PDO::FETCH_ASSOC);//Hace que me saque toda las filas de la tabla.
        $verificacion = false; // Inicializo verificación a falso para poder utilizarlo posteriormente en el foreach.
        session_start(); // inicializo sesión, para poder utilizarla en posteriores ocasiones.
        if(isset($_SESSION["usuario"])){// Al ser la página de usuario, compruebo que si existe el usuario, me ponga todo el contenido que quiero que vea una vez que se ha iniciado sesión.
            echo "SESION INICIADA CORRECTAMENTE - (Estás dentro del Sistema)<br><br>";
            echo "Tu correo es: ".$_SESSION["usuario"];
            echo "<form method='post' action='login.php'>";
            echo "<input type='submit' value='Cerrar sesion' name=cerrar_sesion>";
            echo "</form>";
            
        }else{
       foreach($resultados as $resul){// Recorro el correo electrónico y contraseña para ver si coinciden.
            if(isset($_POST["email"]) && isset($_POST["password"]) && $_POST["email"]==$resul["correo_electronico"] && coincidenContrasenias($_POST["password"],$resul["contrasenia"])){
                   $verificacion = true; // Me "guardo" toda la condición en la verificación.
            }
        }

        if($verificacion){// Si la verificación es verdadera, continúa con la sesión abierta y mostrando el contenido.
            $_SESSION["usuario"]= $_POST["email"];
            echo "SESION INICIADA CORRECTAMENTE - (Estás dentro del Sistema)<br><br>";
            echo "Tu correo es: ".$_SESSION["usuario"];
            echo "<form method='post' action='login.php'>";
            echo "<input type='submit' value='Cerrar sesion' name=cerrar_sesion>";
            echo "</form>";
            
        }else{ 
            if(isset($_POST["email"]) && isset($_POST["password"])){// En caso de que no coincida el mail y/o contraseña se escribe otro mensaje.
                echo "!! LOGIN INCORRECTO !!! Usuario o contraseña incorrecta <br>";
                echo "<a href='login.php'>Volver</a>";
            }else{
                header ("Location:login.php");// Y en el caso de que haya alguna persona que quiera acceder directamente a registrado.php que obligue a la persona a darse de alta.
            }
        }
    }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>
</body>
</html>