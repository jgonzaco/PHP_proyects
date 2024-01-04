<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      session_start();// Inicializo sesin para poder realizar las operaciones que vienen a continuación
        if(isset($_SESSION["usuario"]) && isset($_POST["cerrar_sesion"])){ // Verifico que existe  sesión y que han seleccionado cerrar sesión. Son los requisitos para destruir la sesión. En caso contrario, está la siguiente condición.
            session_destroy();
        }
        else if(isset($_SESSION["usuario"])){ // Verifico que existe sesión y lo envía directamente a la página de registrado.php para obligar al usuario a seleccionar cerrar sesión.
            header ("Location:registrado.php");
        }
    ?>
    <form method="post" action="registrado.php"> <!-- Realizo formulario que va a la página de registrado-->
        <p>
            <label>Correo Electrónico: </label><input type="email" name="email">
        </p>    

        <p>
            <label>Contraseña: </label><input type="password" name="password">
        </p>

        <p>
            <input type="submit" value="Iniciar sesión" name="sesion">
        </p>    
    </form>
    <a href="./noRegistrado.php">No estoy registrado. Ir al Registro</a>
    
</body>
</html>