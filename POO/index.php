<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "ejer1.php";
    include_once "ejer2.php";
    include_once "ejer3.php";
    include_once "ejer4.php";
    require_once "ejer5.php";
    require_once "ejer6.php";

    // Ejercicio 1 clase moto

    $m1=new moto();
    $m2=new moto();

    echo "La moto 1 se tiene una velocidad actual de: ". $m1->getVelocidad()."<br>";
    echo "Acelero moto1". $m1->acelerar()."<br>";
    echo "Acelero moto1 otra vez". $m1->acelerar()."<br>";
    echo "Acelero moto1 otra vez". $m1->acelerar()."<br>";
    echo "Freno moto1". $m1->frenar()."<br>";
    echo "Velocidad de moto1 final: ". $m1->getVelocidad()."<br>";

    
    echo "La moto 2 se tiene una velocidad actual de: ". $m2->getVelocidad()."<br>";
    echo "Acelero moto2". $m2->acelerar()."<br>";
    echo "Acelero moto2 otra vez". $m2->acelerar()."<br>";
    echo "Freno moto2". $m2->frenar()."<br>";
    echo "Velocidad de moto2 final: ". $m2->getVelocidad()."<br>";
    echo "<br><br><br>";

    // Ejercicio 2 clase caballo
    $c1=new caballo();
    $c2=new caballo();
    $c3=new caballo();

// Caballo 1
    $c1->setNombre("Arturo");
    $c1->setColor("Castaño");
    $c1->setEdad(12);
    $c1->setCarrerasGanadas(25);
    $c1->setVelocidad(25);
// Actividad de caballo 1
    echo "El caballo 1 se llama ".$c1->getNombre().", su color es ".$c1->getColor().", la edad que tiene es ".$c1->getEdad().", las carreras que ha ganado han sido: ".$c1->getCarrerasGanadas()." y su velocidad actual es de: ".$c1->getVelocidad();
    echo "<br>";
    $c1->cabalgar();
    echo "<br>";
    $c1->cabalgar();
    echo "<br>";
    $c1->cabalgar();
    echo "<br>";
    echo $c1->relinchar();
    echo "<br>";
    $c1->cabalgar();
    echo "<br>";
    echo $c1->comer();
    echo "<br>";
    echo "La velocidad actual del caballo 1 es de ".$c1->getVelocidad();
    echo "<br>";
    echo "<br>";

// Caballo 2
    $c2->setNombre("Manolo");
    $c2->setColor("Blanco");
    $c2->setEdad(5);
    $c2->setCarrerasGanadas(12);
    $c2->setVelocidad(27);
// Actividad de caballo 2
    echo "El caballo 2 se llama ".$c1->getNombre().", su color es ".$c2->getColor().", la edad que tiene es ".$c2->getEdad().", las carreras que ha ganado han sido: ".$c2->getCarrerasGanadas()." y su velocidad actual es de: ".$c2->getVelocidad();
    echo "<br>";
    $c2->cabalgar();
    echo "<br>";
    $c2->cabalgar();
    echo "<br>";
    $c2->cabalgar();
    echo "<br>";
    $c2->cabalgar();
    echo "<br>";
    $c2->cabalgar();
    echo "<br>";
    echo $c2->relinchar();
    echo "<br>";
    $c2->cabalgar();
    echo "<br>";
    echo $c2->comer();
    echo "<br>";
    echo "La velocidad actual del caballo 2 es de ".$c2->getVelocidad();
    echo "<br>";
    echo "<br>";

// Caballo 3
    $c3->setNombre("Lentillo");
    $c3->setColor("azul");
    $c3->setEdad(12);
    $c3->setCarrerasGanadas(5);
    $c3->setVelocidad(12);
    // Actividad de caballo 3
    echo "El caballo 3 se llama ".$c3->getNombre().", su color es ".$c3->getColor().", la edad que tiene es ".$c3->getEdad().", las carreras que ha ganado han sido: ".$c3->getCarrerasGanadas()." y su velocidad actual es de: ".$c3->getVelocidad();
    echo "<br>";
    echo $c1->comer();
    echo "<br>";
    $c1->cabalgar();
    echo "<br>";
    $c1->cabalgar();
    echo "<br>";
    echo $c1->comer();
    echo "<br>";
    $c1->cabalgar();
    echo "<br>";
    echo $c1->relinchar();
    echo "<br>";
    $c1->cabalgar();
    echo "<br>";
    echo $c1->comer();
    echo "<br>";
    echo "La velocidad actual del caballo 1 es de ".$c1->getVelocidad();
    echo "<br>";
    echo "<br>";


    if($c1->getCarrerasGanadas() > $c2->getCarrerasGanadas() && $c1->getCarrerasGanadas() > $c3->getCarrerasGanadas()){
            echo "EL caballo 1 es el ganador de los otros caballos";
    }else if($c2->getCarrerasGanadas() > $c1->getCarrerasGanadas() && $c2->getCarrerasGanadas() > $c3->getCarrerasGanadas()){
        echo "El caballo 2 es el ganador de los otros caballos";
    }else{
        echo "El caballo 2 es el ganador de los otros caballos";
    }
    echo "<br><br><br>";
    // Ejercicio 3 clase contador
    $cuenta1=new contador(2);

    echo "Mi cuenta se encuentra en un inicio a: ".$cuenta1->getCont();
    echo "<br>";
    echo "Incremento: ".$cuenta1->incrementar();
    echo "<br>";
    echo "Decremento: ".$cuenta1->decrementar();
    echo "<br>";
    echo "Decremento: ".$cuenta1->decrementar();
    echo "<br>";
    echo "Decremento: ".$cuenta1->decrementar();
    echo "<br>";
    echo "Decremento: ".$cuenta1->decrementar();
    echo "<br>";
    echo "Decremento: ".$cuenta1->decrementar();
    echo "<br>";
    echo "Después veo como se encuentra la cuenta: ".$cuenta1->getCont();
    echo "<br>";
    echo "<br>";

    // actualizo contador
    echo "Actualizo contador a -25".$cuenta1->setCont(-25);
    echo "<br>";
    echo "Compruebo que la cuenta siga a 0: ".$cuenta1->getCont();
    echo "<br><br><br>";
    // Ejercicio 4 clase animal
    $gato=new animal("asiático");
    $gato2=new animal("siamés");
    
    // Comprobación de que funciona la excepción.
    //$gato->setColor("amarillo");
    //echo $gato->getColor();

    // Realización de objeto gato1
    $gato->setColor("negro");
    $gato->setEdad(8);
    $gato->setPeso(8.9);
    $gato->setSexo("femenino");

    //Compruebo la función __toString
    echo $gato;
    echo "<br>";

    // Número de gatos creados
    echo $gato->mostrarGatos();
    echo "<br>";


    // Compruebo función comer
    //$gato->comer("filetes");
    $gato->comer("pescado");
    echo "El gato se le ha dado de comer pescado, por lo que su peso actual es de: ".$gato->getPeso();
    echo "<br>";

    // Realización de objeto gato1
    $gato2->setColor("blanco");
    $gato2->setEdad(4);
    $gato2->setPeso(5.3);
    $gato2->setSexo("femenino");

    // Compruebo función pelear
    echo $gato->pelear($gato2);

    echo "<br><br><br>";
    // Ejercicio 5 clase libro
// Libro1
$libro1=new libro(["Manolito1","Manolito2","Manolito3"]);

$libro1->setIbsn("456");
$libro1->setTitulo("Manolitos");
$libro1->setAutor("Antonio Nunca");
$libro1->setNumPaginas(200);

echo $libro1;
echo "<br>";
echo $libro1->mostrarCapitulos();
echo "<br>";

// Libro2
$libro2=new libro(["La rueda","El Molino","El viento"]);

$libro2->setIbsn("5576");
$libro2->setTitulo("El molinillo");
$libro2->setAutor("Pepe");
$libro2->setNumPaginas(300);

echo $libro2;
echo "<br>";
echo $libro2->mostrarCapitulos();
echo "<br>";


// Libro3
$libro3=new libro(["Fuego","Tierra","Mar"]);

$libro3->setIbsn("500");
$libro3->setTitulo("Componentes");
$libro3->setAutor("Delia");
$libro3->setNumPaginas(600);

echo $libro3;
echo "<br>";
echo $libro3->mostrarCapitulos();
echo "<br>";

    echo "<br><br><br>";
    // Ejercicio 6 clase bicicleta

    $montana=new BicicletaMontana(23,1,2,"buena");
    echo "La velocidad actual es ".$montana->getVelocidad().", su plato actual es ".$montana->getPlato().", su piñon es ".$montana->getPinon()." y su suspensión es ".$montana->getSuspension();

    ?>
</body>
</html>