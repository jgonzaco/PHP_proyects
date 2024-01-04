<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert</title>
    </head>
    <body>
        <h1>Inserción de documentación</h1>
        <?php
            //Creación de las variables
            $idtabla=$_POST['idtabla'];
            $nombre=$_POST['nombre'];
            $numero=$_POST['numero'];

            // Conexión con BD
            $conexion =new mysqli("localhost","root","","prueba",3306);

            //Consulta sql
            $consulta="INSERT INTO tabla (idtabla, nombre,numero) VALUES ('$idtabla','$nombre','$numero')";

            //Ejecuto consulta
            $resultado=$conexion -> query($consulta);

            // Comprueba si está bien la consulta
            if($resultado==false){
                echo "Error en la consulta";
            }else{
                echo "Consulta registrada <br><br>";

                echo "<table><tr><td>id</td><td>nombre</td><td>numero</td></tr>";
                echo "<tr><td>$idtabla</td><td>$nombre</td><td>$numero</td></tr></table>";
            }

            // Cerranmos
            $resultado -> free();
            $conexion -> close();

        ?>
    </body>
</html>