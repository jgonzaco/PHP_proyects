<?php
interface vehiculo{// Se crea la interfaz vehículo
    const  VELOZMAXIMA=120;// Se crea una constante con una velocidad máxima de 120 km para poder utilizarla en los siguientes archivos.

    public function frenar($numFrenar):string;// Se crean las funciones de frenar y acelerar en las clases coche y moto.
    public function acelerar($numAcelerar):string;

}
?>
