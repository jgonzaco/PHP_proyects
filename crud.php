<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/crud.css">
    <title>CRUD</title>
</head>
<body>
<?php
include "./validacion.php";//Se llama al archivo de "validación.php" para poder utilizar la función de validación.


if (isset($_POST["insertar"])) { // Si viene desde post insertar mostrar formulario
    echo "<form action='crud.php' method='post' >
                <h3>Insertar nuevo producto</h3>
                
                <label>Nombre:</label><input type='text' name='nombre' required><br><br>
                <label>Descripción:</label><input type='text' name='descripcion' required><br><br>
                <label>Precio:</label><input type='number' name='precio' required ><br><br>
                <label>Categoría:</label><input type='text' name='categoria' required><br><br>
                <label>Cantidad:</label><input type='number' name='cantidad' required><br><br>
                <input type='submit' value='introducir' name='introducir' required>
                <a href='./perfil_coleccionista.php'>Volver</a>
                
            </form>";

} else if (isset($_POST["introducir"])) {// Si se selecciona introducir, se producirá el siguiente código.
    session_start();// Se inicia sesión.

    // Se inicializan variables
    $id_persona = $_SESSION["coleccionista"];

    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null;
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : null;
    $precio = isset($_POST["precio"]) ? $_POST["precio"] : null;
    $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : null;
    $cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : null;

    $errores = validacion_productos($nombre, $descripcion, $precio, $categoria, $cantidad);// Se utiliza función de validación del archivo "validacion.php" para validar los datos insertados por la persona para insertar el producto.
    
    if (isset($errores)) {// Si hay errores, saca por pantalla los errores. Sino introduce al usuario registrado.
        echo "<div>
            <form action='crud.php' method='post' >
                <h3>Insertar nuevo producto</h3>
        
                <label>Nombre:</label><input type='text' name='nombre' value=$nombre required><br><br>
                <label>Descripción:</label><input type='text' name='descripcion' value=$descripcion required><br><br>
                <label>Precio:</label><input type='number' name='precio' value=$precio required><br><br>
                <label>Categoría:</label><input type='text' name='categoria' value=$categoria required><br><br>
                <label>Cantidad:</label><input type='number' name='cantidad' value=$cantidad required><br><br>
                <input type='submit' value='introducir' name='introducir'>
                <a href='./perfil_coleccionista.php'>Volver</a>
                
            </form>";
        echo "<ul class='errores'>";// Se recorren errores y se muestran.
        foreach ($errores as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul></div>";
    } else {
        setcookie('ultima_accion','Última acción realizada INSERTAR');// Se inicializa cookie para poder utilizarla en perfil_coleccionista
        try {
            $cone = "mysql:host=localhost; dbname=examen";
            $conexion = new PDO($cone, "root", "");// Se establece conexión con Base de datos
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// Veo errores

             // Preparo y Realizo consulta de inserción productos
            $consulta2 = $conexion->prepare("INSERT INTO productos(nombre, descripcion, precio, categoria, cantidad, persona_id) VALUES (?,?,?,?,?,?)");
            $consulta2->bindParam(1, $nombre);
            $consulta2->bindParam(2, $descripcion);
            $consulta2->bindParam(3, $precio);
            $consulta2->bindParam(4, $categoria);
            $consulta2->bindParam(5, $cantidad);
            $consulta2->bindParam(6, $id_persona);
            $consulta2->execute();
            header("location:./perfil_coleccionista.php");// En el caso de que sea correcta la introducción, llevará a la vista del coleccionista.
        } catch (PDOException $e) {
            echo "Error al insertar el registro: " . $e->getMessage();// Se muestran errores que pudieran haber
        } finally {
            $conexion = null;// Cierro conexión
        }
    }
} else if (isset($_POST["eliminar"])) { // Si existe post eliminar, se producirá el siguiente código.
    // Formulario para eliminar fila. La eliminación de la fila, se realiza mediante el ID.
    echo "<form action='crud.php' method='post' >
                <h3>Eliminar algún producto por su NOMBRE</h3>
                <p>
                <label>NOMBRE:</label><input type='text' name='nombre'required><br>
                <input type='submit' value='Eliminar' name='eliminar'> &nbsp;
                <a href='./perfil_coleccionista.php'>Volver</a>
                </p>
            </form>";
    if (isset($_POST["nombre"])) {// Si existe post nombre, se producirá el siguiente código.
        try {
            $cone = "mysql:host=localhost; dbname=examen";
            $conexion = new PDO($cone, 'root', '');

            // Veo si existe un error en la conexión
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Creo las variables
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;

            if ($nombre !== null) {// Si nombre no es null realizo siguiente condición
                session_start();
                $coleccionista = $_SESSION["coleccionista"];
                $consulta1 = $conexion->prepare("SELECT * FROM productos WHERE persona_id = :coleccionista");// Se realiza el escape de la variable php escapando mediante el uso de los dos puntos.
                $consulta1->bindParam(':coleccionista', $coleccionista, PDO::PARAM_INT);
                $consulta1->execute();
                //Recorro la bd para mostrarlo por pantalla los productos que dispone ese coleccionista
                $resultados = $consulta1->fetchall(PDO::FETCH_ASSOC);

                $verificacion = false;
                foreach ($resultados as $resul) {// Recorro el correo electrónico y contraseña para ver si coinciden.
                    if (isset($_POST["nombre"]) && $_POST["nombre"] == $resul["nombre"]) {
                        $verificacion = true; // Me "guardo" toda la condición en la verificación
                    }
                }
                
                if ($verificacion) {
                    setcookie('ultima_accion','Última acción realizada ELIMINAR'); // Se inicializa cookie para poder utilizarla en perfil_coleccionista
                    // Realizo consulta
                    $consulta3 = $conexion->prepare('DELETE FROM productos WHERE nombre = ?');

                    // Enlazo variables y Ejecuto
                    $consulta3->bindParam(1, $nombre, PDO::PARAM_STR);
                    $consulta3->execute();
                    header("location:./perfil_coleccionista.php");// En el caso de que sea correcta la eliminación, llevará a la vista del coleccionista.
                } else {
                    echo "No has proporcionado un nombre válido.";// Mensaje, si no se facilita un nombre igual al de la tabla productos.
                }
            } else {
                echo "No has proporcionado ningún nombre.";// Mensaje si no se ha introduci ningún nombre.
            }

        } catch (PDOException $e) { // Controlo excepción para que en el caso de que exista algún error me lo notifique.
            $e->getMessage();
        } finally {
            $conexion = null;// Cierro conexión BD
        }

    }


} else if (isset($_POST["actualizar"])) { // Si se selecciona el botón actualizar desde perfil coleccionaista, se producirá el siguiente formulario.
    echo "<form action='crud.php' method='post' >
                <h3>¿Quieres actualizar algún datos ? Seleccione el NOMBRE:</h3>
                <p>
                <label>Nombre:</label><input type='text' name='nombre' required><br><br>
                <input type='submit' value='Modificar' name='modificar'> &nbsp;
                <a href='./perfil_coleccionista.php'>Volver</a>
                </p>
            </form>";

}


else if (isset($_POST["modificar"])) {// Al seleccionar en el formulario modificar se introduce los valores con ese nombre
    if (isset($_POST["nombre"])) {// Si existe el post nombre, se realiza la siguient condición 
        try {
            $cone = "mysql:host=localhost; dbname=examen";
            $conexion = new PDO($cone, 'root', '');

            // Veo si existe un error en la conexión
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Creo las variables
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;

            if ($nombre !== null) {// Si nombre no es null, se realiza la siguiente condición
                session_start();
                $coleccionista = $_SESSION["coleccionista"];
                $consulta1 = $conexion->prepare("SELECT * FROM productos WHERE persona_id = :coleccionista");// Se realiza el escape de la variable php escapando mediante el uso de los dos puntos.
                $consulta1->bindParam(':coleccionista', $coleccionista, PDO::PARAM_INT);
                $consulta1->execute();
                //Recorro la bd para mostrarlo por pantalla los productos que dispone ese coleccionista
                $resultados = $consulta1->fetchall(PDO::FETCH_ASSOC);

                $verificacion = false;
                foreach ($resultados as $resul) {// Recorro el correo electrónico y contraseña para ver si coinciden.
                    if (isset($_POST["nombre"]) && $_POST["nombre"] == $resul["nombre"]) {
                        $verificacion = true; // Me "guardo" toda la condición en la verificaci
                    }
                }
                if ($verificacion) {
                    $nombre=$_POST["nombre"];// Se inicializa variable nombre.

                    //Para que me salga con el nombre introducido anteriormente, ponemos en la propiedad value del input del nombre el nombre pasado por post.
                    echo "<form action='crud.php' method='post' >
                <h3>Introduzca los datos a cambiar:</h3>
                <p>
                <label>Nombre:</label><input type='text' name='nombre' value=$nombre required><br><br>
                <label>Descripción:</label><input type='text' name='descripcion' required><br><br>
                <label>Precio:</label><input type='number' name='precio' required><br><br>
                <label>Categoría:</label><input type='text' name='categoria' required><br><br>
                <label>Cantidad:</label><input type='number' name='cantidad' required><br><br>
                <input type='submit' value='Actualizar' name='update'> &nbsp;
                <a href='./perfil_coleccionista.php'>Volver</a>
                </p>
            </form>";
                } else {
                    // Si dato introducido no coincide con valor correspondiente a su sesión de la tabla producto, aparece de nuevo el formulario de introducción de nombre.
                    echo "<form action='crud.php' method='post' >
                <h3>¿Quieres actualizar algún datos ? Seleccione el NOMBRE:</h3>
                <p>
             
                <label>Nombre:</label><input type='text' name='nombre' required><br><br>
                <input type='submit' value='Modificar' name='modificar'> &nbsp;
                <a href='./perfil_coleccionista.php'>Volver</a>
                </p>
            </form>";
                    echo "No has proporcionado un nombre válido.";// Mensaje de error.
                }
            } else {
                // Si dato introducido no coincide con valor correspondiente a su sesión de la tabla producto, aparece de nuevo el formulario de introducción de nombre.
                echo "<form action='crud.php' method='post' >
                <h3>¿Quieres actualizar algún datos ? Seleccione el NOMBRE:</h3>
                <p>
             
                <label>Nombre:</label><input type='text' name='nombre' required><br><br>
                <input type='submit' value='Modificar' name='modificar'> &nbsp;
                <a href='./perfil_coleccionista.php'>Volver</a>
                </p>
            </form>";
                echo "No has proporcionado ningún nombre.";// Mensaje de error
            }

        }catch (PDOException $e) { // Controlo excepción para que en el caso de que exista algún error me lo notifique.
            echo $e->getMessage(); 
        } finally {
            $conexion = null;// Cierro conexión BD
        }
 }

}
else if(isset($_POST["update"])){// Si existe el post update, se realiza la siguiente condición
    try {
        setcookie('ultima_accion','Última acción realizada MODIFICAR');// Se inicializa cookie para poder utilizarla en perfil_coleccionista
        $cone = "mysql:host=localhost; dbname=examen";
        $conexion = new PDO($cone, 'root', '');// Conexión a BD

        // Veo si existe un error en la conexión
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Creo las variables
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null;
        $descripcion = $_POST["descripcion"] ? $_POST["descripcion"] : null;
        $precio = $_POST["precio"] ? $_POST["precio"] : null;
        $categoria = $_POST["categoria"] ? $_POST["categoria"] : null;
        $cantidad = $_POST["cantidad"] ? $_POST["cantidad"] : null;

        // Realizo consulta
        $consulta4 = $conexion->prepare('UPDATE productos SET nombre= ?, descripcion= ?, precio= ?, categoria= ?, cantidad= ? WHERE nombre= ?');

        // Enlazo variables y Ejecuto
        $consulta4->bindParam(1, $nombre, PDO::PARAM_STR);
        $consulta4->bindParam(2, $descripcion, PDO::PARAM_STR);
        $consulta4->bindParam(3, $precio);
        $consulta4->bindParam(4, $categoria, PDO::PARAM_STR);
        $consulta4->bindParam(5, $cantidad, PDO::PARAM_INT);
        $consulta4->bindParam(6, $nombre, PDO::PARAM_STR);
        $consulta4->execute();

        header("location:./perfil_coleccionista.php");


    } catch (PDOException $e) {// Controlo excepción para que en el caso de que exista algún error me lo notifique.
        echo $e->getMessage();
    } finally {
        $conexion = null;// Cierro conexión BD
    }
}


?>
</body>
</html>