<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="noRegistrado.php">
        <p>
            <label>Correo Eletrónico: </label> <input type="email" name="email">
        </p>

        <p>
            <label>Contraseña: </label> <input type="password" name="password">
        </p>

        <p>
            <label>Confirmar Contraseña: </label> <input type="password" name="confirmarpassword">
        </p>

        <p>
            <input type="submit" value="REGISTRO" name="registro">
        </p>

    </form>
    <a href="./login.php">Acceso: Ya estoy registrado en el sistema</a>
    <br>

    <?php

    //Como pone en el ejercicio se añade la función para poder encriptar en la tabla la contraseña
    function hashContrasenia($contrasenia)
    {
    return password_hash($contrasenia, PASSWORD_BCRYPT);
    }

    

if(isset($_POST["registro"])){// Si presiono registro me haces la conexión y el registro.
    try{
    //Me conecto a base de datos.
        $cone="mysql:host=localhost;dbname=acceso_usuarios";
        $conexiondb= new PDO($cone,"root","");
    // Verifico que no hay errores
        $conexiondb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        // Establezco variables
        $email=$_POST["email"];
        $password=$_POST["password"];
        $confirmarPassword=$_POST["confirmarpassword"];
        $verficacion=true;
        
        //Se verifica si existe el correo eletrónico en la base de datos para que no se repita correo.
        $consulta=$conexiondb->prepare("SELECT * FROM usuarios");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        foreach($resultado as $resul){
            if($resul["correo_electronico"] == $_POST["email"]) {
                $verficacion = false;
                break;
            }
        
        }


        if($verificacion=true){

                //Verifico que las dos contraseñas son idénticas para poder codificar contraseña
            $password1=password_hash($password, PASSWORD_BCRYPT);
            
            // Realizo consulta
        $consulta=$conexiondb->prepare('INSERT INTO usuarios(correo_electronico,contrasenia) VALUES (?,?)'); 

        // Enlazo variables y Ejecuto
        $consulta->bindParam(1,$email,PDO::PARAM_STR);
        $consulta->bindParam(2,$password1,PDO::PARAM_STR);
        $consulta->execute();
        

                    
        echo "REGISTRADO correctamente. <br>";
        echo "<a href='login.php'>Volver</a>";
       
       }else{
           echo "Número de identificador repetido" . $verficacion;
       }


    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
        
    ?>
</body>
</html>