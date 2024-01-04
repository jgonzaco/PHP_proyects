<!DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio propuesto BD recpecion</title>
    </head>
    <body>
        <h1>Información solicitada</h1>

        <?php
            //Creo la variable que viene de la página anterior
            $busqueda=$_POST['buscar'];

            //1. Conexión con BD
            $conexion = new mysqli("localhost","root","","prueba",3306);

            //2. Compruebo si es correcta la conexión
            if($conexion -> connect_errno){
                echo "No se ha podido conectar, revise la sintaxis ".$conexion->connect_errno;
            }else{
                echo "La conexión ha sido correcta <br>";
            }

            //3. Realizo la consulta
            $consulta="SELECT * FROM tabla WHERE nombre LIKE '%$busqueda%'";

            //4. Ejecuto la consulta
            $linea=$conexion ->query($consulta);

            //5. Saco la información
            while($resultado=mysqli_fetch_array($linea)){
                echo $resultado['idtabla'].' '.$resultado['nombre'].' '.$resultado['numero'].'<br>';
            }

            //6. Cierro BD
            $linea -> free();
            $conexion ->close();
        ?>
        
    </body>
</html>