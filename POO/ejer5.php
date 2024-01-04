<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class libro{
            private $isbn;
            private $titulo;
            private $autor;
            private $numPaginas;

            private $capitulos;

            public function __construct($capitulos = ["capitulo 1", "capitulo 2", "capitulo 3"]) {
                $this->capitulos = $capitulos;
            }

            public function getIsbn(){
                return $this->isbn;
            }
            public function setIbsn($isbn){
                $this->isbn=$isbn;
            }

            public function getTitulo(){
                return $this->titulo;
            }
            public function setTitulo($titulo){
                $this->titulo=$titulo;
            }

            public function getAutor(){
                return $this->autor;
            }
            public function setAutor($autor){
                $this->autor=$autor;
            }

            public function getNumPaginas(){
                return $this->numPaginas;
            }
            public function setNumPaginas($numPaginas){
                $this->numPaginas=$numPaginas;
            }


            public function __toString(){
                return "El IBSN es ".$this->getIsbn().", su título es ".$this->getTitulo().", el autor es ".$this->getAutor()." y el número de páginas que tiene el libro es de ".$this->numPaginas;
            }

            public function mostrarCapitulos(){
                echo  "Capítulos:<br>";
                foreach($this->capitulos as $capi){
                    echo "- " . $capi . "<br>";
                }

    }
}
        // Libro1
        $libro1=new libro(["Manolito1","Manolito2","Manolito3"]);

        $libro1->setIbsn("456");
        $libro1->setTitulo("Manolitos");
        $libro1->setAutor("Antonio Nunca");
        $libro1->setNumPaginas(200);

        echo $libro1;
        echo "<br>";
        echo $libro1->mostrarCapitulos();
        echo "<br>";

        // Libro2
        $libro2=new libro(["La rueda","El Molino","El viento"]);

        $libro2->setIbsn("5576");
        $libro2->setTitulo("El molinillo");
        $libro2->setAutor("Pepe");
        $libro2->setNumPaginas(300);

        echo $libro2;
        echo "<br>";
        echo $libro2->mostrarCapitulos();
        echo "<br>";


        // Libro3
        $libro3=new libro(["Fuego","Tierra","Mar"]);

        $libro3->setIbsn("500");
        $libro3->setTitulo("Componentes");
        $libro3->setAutor("Delia");
        $libro3->setNumPaginas(600);

        echo $libro3;
        echo "<br>";
        echo $libro3->mostrarCapitulos();
        echo "<br>";
        



?>
</body>
</html>