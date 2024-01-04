<?php

require_once "./Vehiculo.php";// Se incluye la ruta del archivo de la interfaz vehículo

class moto implements vehiculo{// Creo la clase moto, implementando la interfaz vehículo.
private $velocidad=0;// Incializo la velocidad de la moto a 0.

// Para poder utilizar la interfaz vehículo y no me de error la clase, tengo que utilizar las dos funciones que me proporciona la interfaz: frenar y acelerar.

public function frenar($frenarMoto):string{// Implemento la función frerar.
    return "La moto ha frenado ya y va a ". $this->velocidad = ($this->velocidad - $frenarMoto) ." km/hora";// Retorno la frase que quiero añadiendo la actualización de la velocidad.
}

public function acelerar($acelerarMoto):string{// Implemento la función acelerar.
    $this->velocidad = ($this->velocidad + $acelerarMoto);// Actualizo la velocidad

    if($this->velocidad > vehiculo::VELOZMAXIMA){// Compruebo que al acelerar lo supera la velocidad máxima, establecida en la interfaz vehículo.
        return "La moto va por encima del nivel de velocidad establecido por ley ".$this->velocidad." km/hora";
    }else{
        return "La moto ha acelerado y va a ".$this->velocidad." km/hora";
    }
}
}

?>