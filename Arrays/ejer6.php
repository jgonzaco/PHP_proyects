<!DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 6 Arrays</title>
    </head>
    <body>
        <?php
            /* 6. Escribe un programa que lea 5 números por teclado y que los almacene en un array.
            Rota los elementos de ese array, es decir, el elemento de la posición 0 debe pasar a la
            posición 1, el de la 1 ala 2, etc. El número que se encuentra en la última posición debe
            pasar a la posición 0. Finalmente, muestra el contenido del array. */

            if($_SERVER['REQUEST_METHOD']=='POST'){
                // Declaro que los números existen
                $numeros=$_POST['numeros'] ? $_POST['numeros'] : "";

                if($numeros!=""){
                    $numeros=explode(",",$numeros);
                }
                echo "has introducido " . count($numeros) . " números <br>";
                
                $ultimoNumero=array_pop($numeros);
    echo "rotamos el array<br/>";
    array_unshift($numeros,$ultimoNumero);
              echo $numeros;
            }

        ?>
        <h1>Introduzca 5 números sin comas por teclado y se mostrará al revés</h1>
        <form method="post">
            <p>
                <label>Escriba los 5 números:</label><br><textarea name="numeros" columns="10" rows="10"></textarea><br>
                <input type="submit" value="Enviar">
            </p>
        </form>
    </body>
</html>