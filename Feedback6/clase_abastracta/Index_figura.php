<?php

require_once "./Figura.php";// Se añade el archivo de las clases con require_once, que en el caso de que exista errores, no funcionará el programa. 
// La creación de los objetos es para comprobar que se ha realizado bien la implementación del programa.

$circulo = new circulo(0,0,9);// Se crean los objetos.
$cuadrado = new cuadrado(0,0,5);

echo "El área del círculo es de ".$circulo->area()."<br>";// Se implementan las funciones para calcular las áreas del círculo y del cuadrado.
echo "El área del cuadrado es de ".$cuadrado->area();

?>