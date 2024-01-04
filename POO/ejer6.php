<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    class bicicleta{
            public $velocidadActual;
            private $platoActual;
            private $pinonActual;

            public function __construct($velocidadActual, $platoActual, $pinonActual) {
                $this->velocidadActual = $velocidadActual;
                $this->platoActual = $platoActual;
                $this->pinonActual = $pinonActual;
            }

            public function getVelocidad(){
                return $this->velocidadActual;
            }
            public function setVelocidad($velocidad){
                $this->velocidadActual=$velocidad;
            }

            public function getPlato(){
                return $this->platoActual;
            }
            public function setPlato($plato){
                $this->platoActual=$plato;
            }

            public function getpinon(){
                return $this->pinonActual;
            }
            public function setPinon($pinon){
                $this->pinonActual=$pinon;
            }
            
            public function acelerar(){
                if($this->velocidadActual > 100){
                    throw new Exception("La velocidad no puede superar los 100 km/h");
                }else{
                    $this->velocidadActual = $this->velocidadActual*2;
                }
            }

            public function frenar(){
                if($this->velocidadActual < 0){
                    throw new Exception("La velocidad no puede ser inferior a 0 km/h");
                }else{
                    $this->velocidadActual = $this->velocidadActual/2;
                }
            }

            function cambiarPlato(){
                $this->platoActual=1;
            }

            function cambiarpinon(){
                $this->pinonActual=1;
            }
    }

    class BicicletaMontana extends bicicleta{
        private $suspension;

        public function __construct($velocidadActual, $platoActual, $pinonActual,$suspension){
            parent::__construct($velocidadActual, $platoActual, $pinonActual);
            $this->suspension=$suspension;
        }

        public function cambiarSuspension($suspension){
            $this->suspension=$suspension;
        }

        public function getSuspension(){
            return $this->suspension;
        }

        public function reacelerar($velocidad) {
            $this->velocidadActual=$velocidad;
        }

        public function frenar(){
            $reduccion=$this->velocidadActual-10;
            return $reduccion;
        }

    }

$montana=new BicicletaMontana(23,1,2,"buena");
echo "La velocidad actual es ".$montana->getVelocidad().", su plato actual es ".$montana->getPlato().", su piñon es ".$montana->getPinon()." y su suspensión es ".$montana->getSuspension();

?>
    
</body>
</html>