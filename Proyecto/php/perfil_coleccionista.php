<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/perfil_coleccionista.css">
    <title>Perfil coleccionista</title>
</head>
<body>

<h1>PERFIL DEL COLECCIONISTA</h1> <!--Fomulario para la realización de CRUD-->

<form method="post" action="./crud.php">
    <input type="submit" value="Insertar Producto" name="insertar"> &nbsp;
    <input type="submit" value="Eliminar Producto" name="eliminar"> &nbsp;
    <input type="submit" value="Actualizar Producto" name="actualizar">
</form>
<br>


<?php

session_start();// Se inicia sesión.

if (isset($_SESSION["coleccionista"])){// Verifico si existe la sesión coleccionista
try{
    $cone="mysql:host=localhost; dbname=examen";
    $conexiondb= new PDO($cone,'root','');// Conecto con BD

    // Veo si existe un error en la conexión
    $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recuperar el valor de $_SESSION["coleccionista"]
    $coleccionista = $_SESSION["coleccionista"];

    // Preparo y Realizo consulta
    $consulta1 = $conexiondb->prepare("SELECT * FROM productos WHERE persona_id = :coleccionista");// Se realiza el escape de la variable php escapando mediante el uso de los dos puntos.
    $consulta1->bindParam(':coleccionista', $coleccionista, PDO::PARAM_INT);
    $consulta1->execute();
    
    //Recorro la bd para mostrarlo por pantalla los productos que dispone ese coleccionista
    $resultados=$consulta1->fetchall(PDO::FETCH_ASSOC);


    // Muestro en una tabla los productos que ha introducido la persona
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Categoría</th><th>Cantidad</th></tr>";
    foreach ($resultados as $result) {
        echo "<tr><td>$result[nombre]</td><td>$result[descripcion]</td><td>$result[precio]</td><td>$result[categoria]</td><td>$result[cantidad]</td></tr>";
    }
    echo "</table>";
    
    
    if(isset($_COOKIE['ultima_accion'])){// Se evalúa que existe la cookie ultima_accion
        $texto = $_COOKIE['ultima_accion']; // Se asigna cookie a variable
        echo $texto;// Se muestra por pantalla la última acción realizada
    }

    // Formulario para cerrar sesión
    echo"<br>";
    echo "<form method='post' action='../login.php'>";
    echo "<input type='submit' value='Cerrar sesion' name=cerrar_sesion>";
    echo "</form>";
    }catch(PDOException $e){
        echo $e->getMessage();// En caso de error muestra mensaje
    }finally{// Cierro conexión.
        $conexiondb=null;
    }
}else{
    echo "No hay sesión";// En caso de que no haya sesión coleccionista, te muestra este mensaje.
}

?>

</body>
</html>