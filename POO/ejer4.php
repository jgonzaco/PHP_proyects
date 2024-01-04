<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class animal{
            private $color;
            private $edad;
            private $peso;
            private $raza;
            private $sexo;

            private static $contar=0;

            public function __construct($raza){
                $this->raza=$raza;
                animal::$contar++;//Variable static que cuente los gatos
            }
            

            public function getColor(){
                return $this->color;
            }
            public function setColor($color){
                if($color=="amarillo"){
                    throw new Exception("Introduzca otro color. El amarillo no es válido") ;
                }else{
                    $this->color=$color;
                }
            }

            public function getEdad(){
                return $this->edad;
            }
            public function setEdad($edad){
                $this->edad=$edad;
            }

            public function getPeso(){
                return $this->peso;
            }
            public function setPeso($peso){
                $this->peso=$peso;
            }

            // Raza solo lectura
            public function getRaza(){
                return $this->raza;
            }
            
            public function getSexo(){
                return $this->sexo;
            }
            public function setSexo($sexo){
                $this->sexo=$sexo;
            }

            // Método comer
            public function comer($comida){
                if($comida=="pescado"){
                    $this->peso++;
                }else{
                    throw new Exception("El gato solo come pesacado !!");
                }
            }

            public function pelear($gato){
                return "Nuestro animal está pelenado con un ".$gato;
            }


            public function mostrarGatos(){
                echo "El número total de gatos es de: ".animal::$contar;
            }

            public function __toString(){
                return "La raza del gato es ".$this->raza. ", su color es ".$this->color.", la edad que tiene es de ".$this->edad.", su peso es de ".$this->peso." kg y su sexo es ".$this->sexo;
            }
            
        }

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



 
    ?>
</body>
</html>