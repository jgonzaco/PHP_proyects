<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class caballo{
            private $nombre;
            private $color;
            private $edad;
            private $carrerasGanadas;
            private $velocidad;

            public function getNombre(){
                return $this->nombre;
            }
            public function setNombre($nombre){
                $this->nombre=$nombre;
            }

            public function getColor(){
                return $this->color;
            }
            public function setColor($color){
                $this->color=$color;
            }

            public function getEdad(){
                return $this->edad;
            }
            public function setEdad($edad){
                $this->edad=$edad;
            }

            public function getCarrerasGanadas(){
                return $this->carrerasGanadas;
            }
            public function setCarrerasGanadas($carrerasGanadas){
                $this->carrerasGanadas=$carrerasGanadas;
            }

            public function getVelocidad(){
                return $this->velocidad;
            }
            public function setVelocidad($velocidad){
                $this->velocidad=$velocidad;
            }


            public function cabalgar(){
                $this->velocidad++;
                echo "cabalgando";
            }

            public function relinchar(){
                return "El caballo relincha";
            }

            public function comer(){
                return "El caballo está comiendo";
            }


        }

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
        
?>
</body>
</html>