<?php

abstract class figura{// Se inicializa la clase abstracta figura.
    protected $x;// Se inicializan las variables de la clase padre
    protected $y;

    public function __construct($x,$y){// Se crea el constructor padre
        $this->x=$x;
        $this->y=$y;
    }

   abstract protected function area():float;// Se describe la función abstracta de la clase padre. Se añade float para que salgan con decimales.
}



class circulo extends figura{// extendemos la clase padre a la hija.
    private $radio;// Se establecen las variables para que sean privadas a la clase hija nada más.
    

    public function __construct($x,$y,$radio){// se añaden variables de la clase padre más la de la hija.
        parent::__construct($x,$y);// Se recupera el constructor utilizando la palabra parent para poder utilizar el constructor padre.
        $this->radio=$radio;
    }
    public function area(): float {// Se añade comportamiento de la clase padre, pero añadiendo el área del círculo area= pi * radio al cuadrado.
        return pi() * pow($this->radio,2);
    }
}



class cuadrado extends figura{
    private $lado;

    public function __construct($x,$y,$lado){// se añaden variables de la clase padre más la de la hija.
        parent::__construct($x,$y);// Se recupera el constructor utilizando la palabra parent junto y nombrando al constructor.
        $this->lado=$lado;
    }

    public function area():float {// Se añade comportamiento de la clase padre, pero añadiendo el área del cuadrado area= lado * lado.
        return pow($this->lado,2);
    }
}

?>