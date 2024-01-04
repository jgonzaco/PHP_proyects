<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicios Arrays</title>
    </head>
    <body>
        <h1>Ejercicio 1</h1>
        <?php
        /*
        1. Definir un array con 3 nombres de compañeros, recorrerlo con for y for each
        a. Añadir un elemento y borrar un elemento
        */
        $companieros = ['Nacho','Javi','Gema','Celia'];
        for($i = 0; $i < count($companieros);$i++){
            echo $companieros[$i]." ";
        }
        echo "<br>";

        foreach($companieros as $compa){
            echo $compa." ";
        }
        ?>
        <br>

        <h1>Ejercicio 2</h1>
        <?php
        /*
        2. Escriba un programa que muestre una tirada de un número de dados al azar entre 2 y
        7 e indique los valores.
        */
        $numDados=rand(2,7); // Saco el número de dados que se van a utilizar.
        echo 'El número de dados que se ha sacado han sido: '.$numDados.'<br>';

        echo 'Los números que ha sacado los dados han sido: '.'<br>';

        for($i = 0; $i < $numDados; $i++){ // Recorro los dados que me han salido 
            $numeros=rand(1,6); // Se crean las tiradas y se guardan.
            echo $numeros.' ';
        }

        ?>
        <br>

        <h1>Ejercicio 3</h1>
        <?php
        /*
        3. Define tres arrays de 20 números enteros cada una, con nombres “numero”,
        “cuadrado” y “cubo”. Carga el array “numero” con valores aleatorios entre 0 y 100. En
        el array “cuadrado” se deben almacenar los cuadrados de los valores que hay en el
        array “numero”. En el array “cubo” se deben almacenar los cubos de los valores que
        hay en “numero”. A continuación, muestra el contenido de los tres arrays dispuesto en
        tres columnas.
        */
        $num; // Inicializo variables
        $cuadrado;
        $cubo;

        for($i=0; $i < 20; $i++){
            $num[$i] = rand(0,100); //Para después convertirlas en arrays e ir poniendo números aleatorios.
            $cuadrado[$i] = pow($num[$i],2); // pow sirve para multiplica todos los arrays * 2
            $cubo[$i] = pow($num[$i],3);  // Lo mismo que arriba pero al cubo
            echo $num[$i]." ".$cuadrado[$i]." ".$cubo[$i]."<br>"; // ordeno números y los saco por pantalla.
        }
        
        // for($i=0; $i < 20; $i++){
        //     echo $num[$i]." ".$cuadrado[$i]." ".$cubo[$i]."<br>"; 
        // }

        ?>
        <br>

        <h1>Ejercicio 4</h1>
        <?php
        /*
        4. Almacenar en un vector asociativo la cantidad de dias que tiene cada mes del año.
        Luego accederlo por su nombre como subindice.
        */
        $meses = ['Enero' => 31, 
        'Febrero' => 28, 
        'Marzo' => 31, 
        'Abril' => 30, 
        'Mayo' => 31, 
        'Junio' => 30, 
        'Julio' => 31, 
        'Agosto' => 31, 
        'Septiembre' => 30, 
        'Octubre' => 31, 
        'Noviembre' =>30, 
        'Diciembre' => 31 ];
        echo $meses['Enero']."<br>";
        echo $meses['Febrero']."<br>";
        echo $meses['Marzo']."<br>";
        echo $meses['Abril']."<br>";
        echo $meses['Mayo']."<br>";
        echo $meses['Junio']."<br>";
        echo $meses['Julio']."<br>";
        echo $meses['Agosto']."<br>";
        echo $meses['Septiembre']."<br>";
        echo $meses['Octubre']."<br>";
        echo $meses['Noviembre']."<br>";
        echo $meses['Diciembre']."<br>";

        echo "<b> Recorrer con foreach </b><br>";
        foreach($meses as $clave =>$valor){
            echo $clave.': '.$valor.'<br>';
        }
        ?>
        <br>

        <h1>Ejercicio 5</h1>
        <?php
        /*
        5. Crear un vector asociativo que almacene las claves de acceso de 5 usuarios de un
        sistema. Acceder a cada componente por su nombre. Imprimir una componente del
        vector.
        */
        $claves = [
            'Juan' => 5674,
            'Pedro' => 'Nolose123',
            'Mercedes' => '1754Cdm',
            'Ramón' => 89765,
            'Gema' => 6543
        ];
        $nombre='Mercedes';
        if($claves[$nombre]){
            echo 'La contraseña de '.$nombre.' es: '.$claves[$nombre].'<br>';
        }

        echo 'La contraseña de Juan es '.$claves['Juan'].'<br>';
        ?>
        <br>

        <h1>Ejercicio 6</h1>
        <?php
        /*
        6. Array Bidimensional Crear un array con tres motos y sus características(marca,
        modelo, color) recorrer el array decir las características de la motos
        */
        $motos =[
            $moto1 = ['marca'=>'Harley Davidson', 'modelo' => 'Grand American Touring', 'color' => 'negro'],
            $moto2 = ['marca'=>'Ducati', 'modelo' => 'Superleggera V4', 'color' => 'blanco'],
            $moto3 = ['marca'=>'Aprilia', 'modelo' => 'RS 660 ', 'color' => 'blanco']
        ];
        echo 'Realizado con foreach <br>';
        foreach($motos as $moto){
            foreach($moto as $mot =>$valor){
                echo "$mot: $valor. ";
            }
            echo'<br>';
        }
        echo '<br>';


        echo 'Realizado con for <br>';
        $array = count($motos);

        for ($i = 0; $i < $array; $i++) {
        echo "marca: " . $motos[$i]['marca'] . '<br>';
        echo "modelo: " . $motos[$i]['modelo'] . '<br>';
        echo "color: " . $motos[$i]['color'] . '<br>';
        }

        ?>
        <br>
        
        <h1>Ejercicio 7</h1>
        <?php
        /*
        7. Estamos creado la web de una tienda online, en concreto, el código de un buscador de
        productos. Nos piden que creemos un script que solucione el problema de filtrado de
        productos, mostrando solo los productos que ha elegido filtrar el usuario. La
        información de los productos la tenemos en un Array multidimensional
        llamado $arrayProductos, en posiciones consecutivas (0, 1, 2, 3) y en cada una un array
        con dos datos, la categoría del producto y el nombre del producto.
        En la variable $categoria recibiremos el código de la categoria de productos a mostrar.
        <?php
        $array = array(
        0 => array( 'categoria' => 33, 'nombre' => 'Zapatos lala' ),
        1 => array( 'categoria' => 24, 'nombre' => 'Pantalones lolo' ),
        2 => array( 'categoria' => 33, 'nombre' => 'Zapatos lulu' ),
        3 => array( 'categoria' => 23, 'nombre' => 'Camiseta lili' ),
        ..............
        );
?>
        */
        ?>
        <br>
    </body>
</html>