<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5</title>
    </head>
    <body>
        <?php
        /*Generar un valor aleatorio entre 1 y 100. Luego mostrar si tiene 1,2 o 3 dígitos. */
        $num=rand(1,100);
        $a=0;
        while($num!=0){
            $num/10; // Divido el número entre 10 para que vaya "quitando" números y creo un contador $a para que me lleve la cuenta de las veces que elimino números.
            $a++;
        }
        echo "Los dígitos que tiene el valor aleatorio creado es ".$a;
        ?>
    </body>
</htlm>