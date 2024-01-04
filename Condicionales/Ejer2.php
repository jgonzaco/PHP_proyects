<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2 deberes</title>
    </head>
    <body>
        <p>2. Generar un valor aleatorio entre 1 y 3. Luego imprimir en castellano el
        número (Ej. si se genera el 3 luego mostrar en la página el string "tres").</p>
        <?php
        $num=rand(1,3);
        switch($num){
            case 1:
                echo "La página es UNO";
                break;
            case 2:
                echo "La página es DOS";
                break;
            case 3:
                echo "La página es TRES";
                break;
            default;
        }
        
        ?>
    </body>
</html>