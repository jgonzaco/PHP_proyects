<!DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Feedback 4</title>
    </head>
    <body>
<?php
        try{
            // Creo conexión
            $cone="mysql:host=localhost; dbname=prueba";
            $conexiondb= new PDO($cone,'root','');

             // Veo si existe un error en la conexión
            $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // if($_SERVER['REQUEST_METHOD']=='POST'){ // Verifico que los datos vienen de POST.
     
                //Creo las variables
                $id=$_POST['id'];
                $nombre=$_POST['nombre'];
                $numero=$_POST['numero'];
                $verificacion = true;

                // Realizo consulta, recojo datos y verifico si está repetido el ID.
                $consulta2 = $conexiondb->prepare('SELECT * FROM tabla');
                $consulta2->execute();
                $resultado = $consulta2->fetchAll();
                foreach($resultado as $result){
                    echo $verificacion;
                    if($result['id'] == $_POST['id']) {
                        $verificacion = false;
                        break;
                    }
                } 
                if($verificacion){
                     // Realizo consulta
                 $consulta1=$conexiondb->prepare('INSERT INTO tabla(id,nombre,numero) VALUES (?,?,?)'); 

                 // Enlazo variables y Ejecuto
                 $consulta1->bindParam(1,$id,PDO::PARAM_INT);
                 $consulta1->bindParam(2,$nombre,PDO::PARAM_STR);
                 $consulta1->bindParam(3,$numero,PDO::PARAM_INT);
                 $consulta1->execute();
                             
                 echo "Registro INSERTADO correctamente. <br>";
                 echo "<a href='principal.php'>Volver</a>";
                
                }else{
                    echo "Número de identificador repetido     " . $verificacion ;
                }
            
            

                        }catch(PDOException $e){ // Controlo excepción para que en el caso de que exista algún error me lo notifique.
                            $e->getMessage();
                        }finally{
                            $conexiondb=null; // Cierro conexión.
                        }

?>
        </body>
</html>