<?php

require_once "./Vehiculo.php";// Se incluye la ruta del archivo de la interfaz vehículo

class coche implements vehiculo{ // Creo la clase coche, implementando la interfaz vehículo.
private $velocidad=0; // Incializo la velocidad del coche a 0.


// Para poder utilizar la interfaz vehículo y no me de error la clase, tengo que utilizar las dos funciones que me proporciona la interfaz: frenar y acelerar.

public function frenar($frenarCoche):string{// Implemento la función frerar.
    return "El coche ha frenado ya y va a ". $this->velocidad = ($this->velocidad - $frenarCoche) ." km/hora";// Retorno la frase que quiero añadiendo la actualización de la velocidad.
}

public function acelerar($acelerarCoche):string{// Implemento la función acelerar.
    $this->velocidad = ($this->velocidad + $acelerarCoche);// Actualizo la velocidad

    if($this->velocidad > vehiculo::VELOZMAXIMA){// Compruebo que al acelerar lo supera la velocidad máxima, establecida en la interfaz vehículo.
        return "El coche va por encima del nivel de velocidad establecido por ley: ".$this->velocidad." km/hora";
    }else{
        return "El coche ha acelerado y va a ".$this->velocidad." km/hora";
    }

}
}

?>