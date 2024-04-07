<!DOCTYPE html5>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <title>La Aplicación del Coleccionista</title>
</head>
<body>
    <h1>INICIO DE SESIÓN</h1>
    <?php
      session_start();// Inicializo sesión para poder realizar las operaciones que vienen a continuación
        if(isset($_POST["cerrar_sesion"])){ // Verifico que han seleccionado cerrar sesión para destruir la sesión. En caso contrario, está la siguiente condición.
            session_destroy();
        }
        else if(isset($_SESSION["coleccionista"])){ // Verifico que existe sesión coleccionista y lo envía directamente a la página del coleccionista para obligar al usuario a seleccionar cerrar sesión.
            header ("location:./php/perfil_coleccionista.php");
        }
        

    ?>
    <form method="get" action="login.php"> <!-- Realizo formulario que va a la página de registrado-->
        <p>
            <label>Correo Electrónico: </label><input type="email" name="email" required>
        </p>    

        <p>
            <label>Contraseña: </label><input type="password" name="password" required>
        </p>

        <p>
            <input type="submit" value="Iniciar sesión" name="sesion">
        </p>                
    </form>
    <a href="./php/noRegistrado.php">No estoy registrado. Ir al Registro</a>


        <?php
        // Se realiza validación de página. En el caso de que no exista errores, se enviará a la página de persona. Que es quien elije a dónde ir a usuario o trabajador.
        // Se realizan validaciones
        if($_SERVER['REQUEST_METHOD'] == 'GET'){// Se ejecuta el siguiente código al ser la solicitud del formulario de tipo get.
           
            //Creación de función validación email
            function validar_correo($correo){
            return filter_var($correo,FILTER_VALIDATE_EMAIL);
            }

            // Creación de función validación Contraseña
            function validar_contraseña($contraseña){
            return !(trim($contraseña)=='');
            }

            // Creación de variables junto a array error
            $errores=[];//incialializamos la variable errores para posteriormente introducir los posibles errores que pudiera haber introducido la persona usuaria.
            $correo=isset($_GET["email"])? $_GET["email"] : "";
            $contraseña=isset($_GET["password"])? $_GET["password"] : "";


            // función validación email
            if(!validar_correo($correo)){
                $errores[]="Introduzca un correo correcto";
            }

            // función validación contraseña
            if(!validar_contraseña($contraseña)){
                $errores[]="Introduzca una contraseña correcta";
            }

            if(isset($errores)){// Si hay errores, saca por pantalla los errores. Sino introduce al usuario registrado.
                echo "<ul class='errores'>";
                    foreach($errores as $error){
                        echo "<li>".$error."</li>";
                    }
                echo "</ul>";
                
            }

            if(!$errores){
                $cone="mysql:host=localhost; dbname=examen";

                $conexiondb = new PDO($cone,"root",""); //Realizo la conexión. No puse ninguna contraseña.
                $conexiondb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);// Veo posibles errores


                $consulta=$conexiondb->prepare("SELECT * FROM persona"); // Realizo la consulta.
                $consulta->execute(); // Ejecuto consulta. 

                $resultados = $consulta->fetchall(PDO::FETCH_ASSOC);//Hace que me saque toda las filas de la tabla.
                $verificacion = false; // Inicializo verificación a falso para poder utilizarlo posteriormente en el foreach.
                $id_persona=null;// creo una valiable id_persona (foreign key)
                
                foreach($resultados as $resul){// Recorro el correo electrónico y contraseña para ver si coinciden.
                    if(isset($_GET["email"]) && isset($_GET["password"]) && $_GET["email"]==$resul["correo_electronico"] && $_GET["password"]==$resul["contraseña"]){
                           $verificacion = true; // Me "guardo" toda la condición en la verificaci
                           $id_persona=$resul["id"];// Asigno al id_persona el id del coleccionista.
                    }
                }
                
                if($verificacion){// Si la verificación es correcta me lleva a perfil_coleccionista.php, sino me deja un mensaje de error.
                    session_start();// Se inicializa la sesión del usuario
                    $_SESSION["coleccionista"] = $id_persona;//Establezco la sesión al usuario.
                    header("location:./php/perfil_coleccionista.php");// Envía directamente al perfil del coleccionista                
                }else{
                    echo "Error, no coincide el usuario o contraseña";// En caso de que el usuario o contraseña no coincida, se dejará el siguiente mensaje.
                    }            
        }
    }

        ?>
</body>