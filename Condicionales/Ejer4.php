<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 4 deberes</title>
    </head>
    <body>
        <p>Escribe un programa que ordene tres números enteros generado aleatoriamente..</p>
        <?php
        $num1=rand(1,20);
        $num2=rand(1,20);
        $num3=rand(1,20);

        if($num1 < $num2 && $num1 < $num3 && $num3 > $num2){
            echo $num1." ".$num2." ".$num3;
        }else if($num1 < $num2 && $num2 > $num3 && $num3 > $num1){
            echo $num1." ".$num3." ".$num2;
        }else if($num1 < $num2 && $num1 > $num3 && $num2 > $num1){
            echo $num3." ".$num1." ".$num2;
        } else if($num1 > $num2 && $num2 < $num3 && $num1 < $num3){
            echo $num2." ".$num1." ".$num3;
        }else if($num1 > $num2 && $num1 > $num3 && $num2 > $num3){
            echo $num3." ".$num2." ".$num1;
        }else{
            echo $num2." ".$num3." ".$num1;
        }
        
        ?>
    </body>
</html>