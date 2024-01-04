<!DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Feedback 4</title>
    </head>
    <body>
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
                
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
                        echo "<b> <a href=principal.php>Volver</a>";
                        }catch(PDOException $e){
                            $e->getMessage();
                        }finally{
                            $conexiondb=null;
                        }
                    }
    
    ?>
        </body>
</html>