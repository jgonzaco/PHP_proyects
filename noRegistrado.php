<!DOCTYPE html5>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/noRegistrado.css">
    <title>Coleccionista No Registrado</title>
</head>
<body>
    
    <h1>PAGINA DE REGISTRO</h1>
<form method="post" action="./noRegistrado.php"> <!-- Realizo formulario no registrado-->
        <p>
            <label>Nombre: </label> <input type="text" name="nombre" required>
        </p>

        <p>
            <label>Primer apellido: </label> <input type="text" name="apellido1" required>
        </p>

        <p>
            <label>Segundo apellido: </label> <input type="text" name="apellido2" required>
        </p>

        <p>
            <label>Pais: </label> <input type="text" name="pais" required>
        </p>

        <p>
            <label>Municipio: </label> <input type="text" name="municipio" required>
        </p>

        <p>
            <label>Dirección: </label> <input type="text" name="direccion" required>
        </p>

        <p>
            <label>Teléfono: </label> <input type="number" name="telefono" required>
        </p>

        <p>
            <label>Correo: </label> <input type="email" name="correo" required>
        </p>

        <p>
            <label>contraseña: </label> <input type="password" name="contraseña"required>
        </p>

        <p>
            <input type="submit" value="REGISTRO" name="registro">
        </p>

    </form>
    <a href="../login.php">Ya estoy registrado</a>
    <br>

<?php

// Se realizan validaciones
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //SE CREAN LAS FUNCIONES

        // Creación de función validación nombre
        function validar_nombre($nombre){
            return !(trim($nombre)=='');
        }

        // Creación de función validación apellido1
        function validar_apellido1($apellido1){
            return !(trim($apellido1)=='');
        }

        // Creación de función validación apellido2
        function validar_apellido2($apellido2){
            return !(trim($apellido2)=='');
        }

        // Creación de función validación pais
        function validar_pais($pais){
            return !(trim($pais)=='');
        }

        // Creación de función validación Municipio
        function validar_municipio($municipio){
            return !(trim($municipio)=='');
        }

        // Creación de función validación Direccion
        function validar_direccion($direccion){
            return !(trim($direccion)=='');
        }
        
        //Valido que existe teléfono
        function validar_telefono($telefono){
            return filter_var($telefono,FILTER_VALIDATE_INT) && $telefono >= 600000000 && $telefono <= 999999999 ;
        }

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
    $nombre=isset($_POST["nombre"]) ? $_POST["nombre"] : "";// Utilizo operador ternario para que asignar nombres a las variables. En el caso de que se cumpla el isset, si es verdadero que hay un nombre en el formulario mantiene el nombre asignado, sino espacio en blanco. Así sucesivamente con las demás variables.
    $apellido1=isset($_POST["apellido1"])? $_POST["apellido1"] : "";
    $apellido2=isset($_POST["apellido2"])? $_POST["apellido2"] : "";
    $pais=isset($_POST["pais"])? $_POST["pais"] : "";
    $municipio=isset($_POST["municipio"])? $_POST["municipio"] : "";
    $direccion=isset($_POST["direccion"])? $_POST["direccion"] : "";
    $telefono=isset($_POST["telefono"])? $_POST["telefono"] : "";
    $email=isset($_POST["correo"])? $_POST["correo"] : "";
    $contraseña=isset($_POST["contraseña"])? $_POST["contraseña"] : "";
    

    // función validación nombre
    if(!validar_nombre($nombre)){
        $errores[]= "Introduzca su nombre";
    }

    // función validación apellido1
    if(!validar_nombre($apellido1)){
        $errores[]= "Introduzca su primer apellido";
    }

    // función validación apellido2
    if(!validar_nombre($apellido2)){
        $errores[]= "Introduzca su segundo apellido";
    }

    // función validación pais
    if(!validar_pais($pais)){
        $errores[]="Introduzca un país";
    }

    // función validación Municipio
    if(!validar_municipio($municipio)){
        $errores[]="Introduzca un Municipio";
    }

    // función validación Dirección
    if(!validar_direccion($direccion)){
        $errores[]="Introduzca una dirección";
    }
    
    // función validación Teléfono
    if(!validar_telefono($telefono)){
        $errores[]="Introduzca un teléfono correcto";
    }

    // función validación email
    if(!validar_correo($email)){
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

        try{// Utilizo try catch para poder controlar los errores en tiempo de ejecución.
            $cone="mysql:host=localhost;dbname=examen";
            $conexiondb=new PDO($cone,"root","");// Realizo conexión con BD
        
            $conexiondb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);// Verifico si hay errores
            
            // Establezco variables
            $nombre=isset($_POST["nombre"]) ? $_POST["nombre"] : "";// Utilizo operador ternario para que asignar nombres a las variables. En el caso de que se cumpla el isset, si es verdadero que hay un nombre en el formulario mantiene el nombre asignado, sino espacio en blanco. Así sucesivamente con las demás variables.
            $apellido1=isset($_POST["apellido1"])? $_POST["apellido1"] : "";
            $apellido2=isset($_POST["apellido2"])? $_POST["apellido2"] : "";
            $pais=isset($_POST["pais"])? $_POST["pais"] : "";
            $municipio=isset($_POST["municipio"])? $_POST["municipio"] : "";
            $direccion=isset($_POST["direccion"])? $_POST["direccion"] : "";
            $telefono=isset($_POST["telefono"])? $_POST["telefono"] : "";
            $email=isset($_POST["correo"])? $_POST["correo"] : "";
            $password=isset($_POST["contraseña"])? $_POST["contraseña"] : "";
            
            $verficacion=true;
            
            //Se verifica si existe el correo eletrónico en la base de datos para que no se repita correo.
            $consulta=$conexiondb->prepare("SELECT * FROM persona");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            foreach($resultado as $resul){
                if($resul["correo_electronico"] == $email) {
                    $verficacion = false;
                    break;
                }
            
            }
        
        
            if($verficacion==true){
        
                
                // Realizo consulta
            $consulta=$conexiondb->prepare('INSERT INTO persona(nombre,apellido1,apellido2,pais,municipio,direccion,telefono,correo_electronico,contraseña) VALUES (?,?,?,?,?,?,?,?,?)'); 
        
            // Enlazo variables y Ejecuto
            $consulta->bindParam(1,$nombre,PDO::PARAM_STR);
            $consulta->bindParam(2,$apellido1,PDO::PARAM_STR);
            $consulta->bindParam(3,$apellido2,PDO::PARAM_STR);
            $consulta->bindParam(4,$pais,PDO::PARAM_STR);
            $consulta->bindParam(5,$municipio,PDO::PARAM_STR);
            $consulta->bindParam(6,$direccion,PDO::PARAM_STR);
            $consulta->bindParam(7,$telefono,PDO::PARAM_STR);
            $consulta->bindParam(8,$email,PDO::PARAM_STR);
            $consulta->bindParam(9,$password,PDO::PARAM_STR);
            $consulta->execute();
                 
            echo "REGISTRADO correctamente. <br>";
            
        
            }else{
                echo "Número de identificador repetido" . $verficacion;
            }
        }catch(PDOException $e){// se realiza try catch para controlar errores en tiempo de ejecución.
            echo $e->getMessage();
        }finally{
            $conexiondb=null;// Cierro conexión.
        }

    }

}
?>

</body>
</html>