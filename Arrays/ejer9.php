<!DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 6 Arrays</title>
    </head>
    <body>
        <?php
            /* 9. Array Bidimensional Crear un array con tres motos y sus características(marca,
            modelo, color) recorrer el array decir las características de la motos*/

           $array=[
                $coche1=['marca'=>'ford', 'modelo'=>'focus','color'=>'rojo'],
                $coche2=['marca'=>'seat', 'modelo'=>'ibiza','color'=>'azul'],
                $coche3=['marca'=>'renault', 'modelo'=>'captur','color'=>'blacno']
           ];

           foreach($array as $clave1){
            foreach($clave1 as $clave2 => $contenido){
                echo $clave2.' - '.$contenido."<br>";
            }
           }
echo '<br> <br>';

           $coches=count($array);

           for($i=0;$i<$coches;$i++){
            echo 'Marca: '.$array[$i]['marca'].'<br>';
            echo 'Modelo: '.$array[$i]['modelo'].'<br>';
            echo 'Color: '.$array[$i]['color'].'<br>';
           }
        ?>
        
    </body>
</html>