<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class moto{
        private $cilindros=0;
        private $velocidad=0;

        public function acelerar(){
            $this->velocidad++;
        }

        public function frenar(){
            $this->velocidad--;
        }

        public function getVelocidad(){
            return $this->velocidad;
        }

        public function getCilindros(){
            return $this->cilindros;
        }

    }

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


    ?>
</body>
</html>