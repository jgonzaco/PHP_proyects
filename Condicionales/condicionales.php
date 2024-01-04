<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Ejercicios de Condicionales </title>
    </head>
    <body>
        <h1>Ejercicio 1</h1>
        <?php
        /*
        1. Sabiendo que $dia=date("d"); devuelve el dia del mes, hacer un programa en
        el si el dia del mes es menor que 10 pongo activo si es mayor escriba no
        activo
        */
        $dia=date("d"); // Declaramos la función día

        echo "El día del mes de octubre es: ".$dia."<br>"; // Sacamos por pantalla el día para saber cual es y así poder intuir lo que se va a sacar.

        if($dia < 10){// iniciamos la condición
            echo "Activo"."<br>";
        }else{
            echo " No activo"."<br>";
        }
        ?>
        <br>

        <h1>Ejercicio 2</h1>
        <?php
        /*
        2. Generar un valor aleatorio entre 1 y 3. Luego imprimir en castellano el
        número (Ej. si se genera el 3 luego mostrar en la página el string "tres").
        */
        $num=rand(1,3); // Se crea función número aleatorio

        echo "El número creado es ".$num."<br>"; // primero lo saco en número para posteriormente verlo en letra.

        /*if($num == 1){ // Creamos las condiciones si es 1 = Uno, etc.con if - elseif - else (solución 1)
            echo "1 = Uno";
        }elseif ($num == 2){
            echo "2 = Dos";
        }else{
            echo "3 = Tres";
        }*/
        
        if($num == 1 || $num == 2 || $num== 3){ // Se realiza las concidiones con if anidados. Si es alguno de las condiciones entre en la condición. (solución 2)
            if($num == 1){
                echo "1 = Uno";
            }elseif ($num == 2){
                echo "2 = Dos";
            }else{
                echo "3 = Tres";
            }
        }

        ?>
        <br>
        <h1>Ejercicio 3</h1>
        <?php
        /*
        3. Realiza un programa generado un numero aleatoriamente entre 1 y 20 decir si
        es par y/o divisible entre 5.
        */
        $num=rand(1,20);

        if($num % 2 ==0){
            if($num % 5 == 0){
                echo $num." es par y divisible entre 5";
            }else{
                echo $num." solo es par";
            }
        }elseif($num % 5 == 0){
            echo $num." solo es divisible entre 5";
        }else{
            echo $num." no es par ni divisible entre 5";
        }
        ?>
        <br>
        <h1>Ejercicio 4</h1>
        <?php
        /*
        4. Escribe un programa que ordene tres números enteros generado aleatoriamente
        */
        $num1=rand(1,10); // Se crean los números aleatorios
        $num2=rand(1,10);
        $num3=rand(1,10);

        if($num1 > $num2){ // Colocamos los dos primeros números en el caso de que el numero 1 fuese mayor que el número 2.
            $intermedio = $num1;
            $num1 = $num2;
            $num2 = $intermedio;
        }

        if($num2 > $num3){ // Colocamos los dos últimos números en el caso de que el numero 2 fuese mayor que el número 3.
            $intermedio = $num2;
            $num2 = $num3;
            $num3 = $intermedio;
        }

        if($num1 > $num2){ // Volvemos a ordenar los dos primeros números, por si se ha descolocado el número 2 y fuese más pequenio que el 1, por lo que se vuelve a colocar.
            $intermedio = $num1;
            $num1 = $num2;
            $num2 = $intermedio;
        }

        echo "Los números colocados son: ".$num1." - ".$num2." - ".$num3;
        ?>
        <br>
        <h1>Ejercicio 5</h1>
        <?php
        /*
        5. Generar un valor aleatorio entre 1 y 100. Luego mostrar si tiene 1,2 o 3
        dígitos.
        */

        $num=rand(1,100);

        if($num<10){
            echo $num." tiene 1 dígito";
        }elseif($num<100){
            echo $num." tiene 2 dígitos";
        }else{
            echo $num." tiene 3 dígitos";
        }
        ?>
        <br>
        <h1>Ejercicio 6</h1>
        <?php
        /*
        6. Escribe un programa en que dado un número del 1 a 7 escriba el
        correspondiente nombre del día de la semana
        */
        $dia=rand(1,7);

        switch($dia){
            case 1:
                echo $dia." = Lunes";
                break;
        case 2:
            echo $dia." = Martes";
                break;
        case 3:
            echo $dia." = Miércoles";
                break;
        case 4:
            echo $dia." = Jueves";
                break;
        case 5:
            echo $dia." = Viernes";
                break;
        case 6:
            echo $dia." = Sábado";
                break;
        case 7:
            echo $dia." = Domingo";
                break;

        default;
        }
        ?>
        
    </body>
</html>