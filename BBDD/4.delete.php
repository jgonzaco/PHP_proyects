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
            

            // Conexión con BD
            $conexion =new mysqli("localhost","root","","prueba",3306);

            //Consulta sql
            $consulta="DELETE FROM tabla WHERE idtabla='$idtabla'";

            //Ejecuto consulta
            $resultado=$conexion -> query($consulta);

            // Comprueba si está bien la consulta
            if($resultado==false){
                echo "Error en la eliminación";
            }else{
                if(mysqli_affected_rows($conexion)==0){
                    echo "No se ha podido eliminar un ID que no existe";
                }else{
                    echo "Se han eliminado ".mysqli_affected_rows($conexion)." registros";
                }
            }

            // Cerranmos
            $resultado -> free();
            $conexion -> close();

        ?>
    </body>
</html>