<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Feedback 2 Desarrollo Entorno Cliente</title>
    </head>
    <body>
        <h1>Ejercicio Feedback 2</h1>
        <?php
        /* Dada la siguiente frase: “PHP es el lenguaje de programación de entorno servidor” realizar un programa que resuelva los siguientes apartados:
a) Indicar la posición de la palabra “programación”.
b) Reemplazar “entorno servidor” por “DES” y presentar la nueva frase en la página web.
c) Indicar si existe (SI EXISTE) o no existe (NO EXISTE) la palabra “PHP” en la frase anterior.
d) Indicar cuantas letras “a” hay en la frase inicial del enunciado. */

/* a) Indicar la posición de la palabra “programación”. */
        $frase='PHP es el lenguaje de programación de entorno servidor'; // Se inicializa la frase a una variable
        
        $busqueda = strpos($frase,'programación'); // Se realiza la función Strpos() para que me busque la palabra programación y me saque la posición.
        if($busqueda){ // Realizo el condicional para sacar la posición y en caso contrario que no esté decir que no ha sido encontrada.
            echo 'La palabra programación se encuentra en la posición: '.$busqueda;
        }else{
            echo 'Programación NO fue encontrada';
        }
        echo '<br>';


/* b) Reemplazar “entorno servidor” por “DES” y presentar la nueva frase en la página web. */
        $nuevo= str_replace('entorno servidor','DES',$frase); // La función str_replace() reemplaza entorno servidor por DES.
        echo $nuevo;
        echo '<br>';

/* c) Indicar si existe (SI EXISTE) o no existe (NO EXISTE) la palabra “PHP” en la frase anterior.*/
        if(strpos($frase,'PHP')!==false){ // Volvemos a poner la función para conocer si existe la palabra. Se utiliza el operador !== false debido a que la función te saca la posición o False, porque no ha encontrado la palabra, frase o letra.
            echo 'La palabra PHP SI existe'.'<br>';
        }else{
            echo 'La plabra PHP NO existe'.'<br>';
        }

/*d) Indicar cuantas letras “a” hay en la frase inicial del enunciado. */
$contador=0;        // Con el contador, controlamos las aes que existen.
        for($i=0;$i<strlen($frase);$i++){ // Se utiliza la función strlen() para conocer las a que existen en la frase. 
            if($frase[$i]==='a'){//creamos la condición para posteriormente utilizar el contador.
                $contador++; // aumentamos la aes.
            }
        }
        echo 'La frase proporcionada, dispone '.$contador.' de caracteres de a'; // Mostramos por pantalla.
        ?>
    </body>
</html>