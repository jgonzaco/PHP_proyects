<!DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Feedback 4</title>
    </head>
    <body>
        <?php
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';

                switch($opcion){
                    case 'Ver tabla': // OPCIÓN DE VER TABLA.
                        //Realizo conexión con BD
                        try{
                        $cone="mysql:host=localhost; dbname=prueba";
                        $conexiondb= new PDO($cone,'root','');

                        // Veo si existe un error en la conexión
                        $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Realizo consulta
                        $consulta1=$conexiondb->prepare('SELECT * FROM tabla');
                        $consulta1->execute();
                        
                        //Recorro la bd para mostrarlo por pantalla
                        $resultados=$consulta1->fetchall(PDO::FETCH_ASSOC);
                        foreach($resultados as $result){
                            echo "<table border=1><tr><td>$result[id]</td><td>$result[nombre]</td><td>$result[numero]</td></tr></table>";

                        }
                        
                        }catch(PDOException $e){
                            $e->getMessage();
                        }finally{
                            $conexiondb=null;
                        }

                        break;
                    case 'Añadir':
                    ?>
                    <h2> Formulario de inserción</h2>
                        <form method="post">
                            <p>
                                <label>IDTABLA:</label><input type="number" value="idtabla" name="id"><br>
                                <label>Nombre:</label><input type="text"  value="nombre" name="nombre"><br>
                                <label>numero:</label><input type="number"  value="numero" name="numero"><br>
                                <input type="submit" value="Insertar">
                            </p>
                        </form>';
                                     
                        <?php
                        try{
                            $cone="mysql:host=localhost; dbname=prueba";
                            $conexiondb= new PDO($cone,'root','');

                            // Veo si existe un error en la conexión
                            $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            if($_SERVER['REQUEST_METHOD']=='POST'){
                            //Declaro variables para posteriormente usarlas.
                            $idtabla=$_POST['id'];
                            $nombre=$_POST['nombre'];
                            $numero=$_POST['numero'];


                            // Realizo consulta
                            $consulta2=$conexiondb->prepare("INSERT INTO tabla (idtabla, nombre, numero) VALUES (?,?,?)");
                            

                            $consulta2->bindParam(1,$idtabla,PDO::PARAM_INT);
                            $consulta2->bindParam(2,$nombre,PDO::PARAM_STR);
                            $consulta2->bindParam(3,$numero,PDO::PARAM_INT);

                            $consulta2->execute();

                            echo "Registro insertado correctamente.";
                            }

                        }catch(PDOException $e){
                            echo "Información del error: ".$e->getMessage();
                        }finally{
                            $conexiondb=null;
                        }
                        break;
                    case 'Eliminar':
                        ?>
                        <h2> Formulario de Eliminación</h2>
                        <form method="post">
                            <p>
                                <label>IDTABLA:</label><input type="number"  name="idtabla"><br>
                                <input type="submit" value="Eliminar">
                            </p>
                        </form>
                        <?php
                        try{
                            $cone="mysql:host=localhost; dbname=prueba";
                            $conexiondb= new PDO($cone,'root','');

                            // Veo si existe un error en la conexión
                            $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Realizo consulta
                            $consulta3=$conexiondb->prepare("DELETE FROM tabla WHERE id=?");
                            $idtabla=isset($_POST['idtabla']) ? $_POST['idtabla']: "";


                            $consulta3->bindParam(1,$idtabla,PDO::PARAM_INT);

                            $consulta3->execute();


                        }catch(PDOException $e){
                            echo "Información del error: ".$e->getMessage();
                        }finally{
                            $conexiondb=null;
                        }
                        break;
                    case 'Actualizar':
                        echo 'luz';
                        break;
                    default: 
                        
                }
            }
        ?>
    </body>
</html>