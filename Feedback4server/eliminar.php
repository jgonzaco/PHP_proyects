<!DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Feedback 4</title>
    </head>
<?php
        try{
            // Creo conexión
            $cone="mysql:host=localhost; dbname=prueba";
            $conexiondb= new PDO($cone,'root','');

             // Veo si existe un error en la conexión
            $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if($_SERVER['REQUEST_METHOD']=='POST'){ // Verifico que los datos vienen de POST.
     
                //Creo las variables
                $id=$_POST['id'];
                

                 // Realizo consulta
                 $consulta1=$conexiondb->prepare('DELETE FROM tabla WHERE id = ?'); 

                // Enlazo variables y Ejecuto
                $consulta1->bindParam(1,$id,PDO::PARAM_INT);
                $consulta1->execute();
                            
                echo "Registro ELIMINADO correctamente. <br>";
                echo "<a href='principal.php'>Volver</a>";
            }
            

                        }catch(PDOException $e){ // Controlo excepción para que en el caso de que exista algún error me lo notifique.
                            $e->getMessage();
                        }finally{
                            $conexiondb=null; // Cierro conexión.
                        }

?>
        </body>
</html>