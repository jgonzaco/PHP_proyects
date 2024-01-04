<?php
    require_once "./Coche.php";
    require_once "./Moto.php";


    
     $coche1 = new Coche();
     $coche2 = new Coche();
     $coche3 = new Coche();
     $moto1 = new Moto();
     $moto2 = new Moto();
     $moto3 = new Moto();


    $coches=[$coche1,$coche2,$coche3];// Creo el array de los objetos
    $motos=[$moto1,$moto2,$moto3];



    foreach($coches as $coche){
        echo get_class($coche)."<br>";// Función php para poder saber el tipo de clase que proviene.
        echo $coche->acelerar(100)."<br>";// Introduzco valores en las funciones para comprobar que funciona.
        echo $coche->frenar(20)."<br>";
        echo $coche->acelerar(50)."<br>";
        echo $coche->acelerar(10)."<br>";
        
    }


?>