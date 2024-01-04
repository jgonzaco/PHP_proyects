<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class contador{
            private $cont;

            public function __construct($cont){
                if($cont<0){
                    $this->cont=0;
                }else{
                    $this->cont=$cont;
                }
            }

            public function getCont(){
                if($this->cont < 0){
                    return $this->cont=0;
                }else{
                    return $this->cont;
                }   
            }
            public function setCont($cont){
                $this->cont=$cont;
                if($cont<0){
                    $this->cont=0;
                }
            }

            public function incrementar(){
                $this->cont++;
            }

            public function decrementar(){
                $this->cont--;
            }
        }

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




    ?>
</body>
</html>