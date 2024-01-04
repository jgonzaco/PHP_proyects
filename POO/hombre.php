<?php
include_once "ejer1.php";

    class hombre{
        protected $edad;
        protected $nombre;
        protected $dni;
        private $coche;
        const pais="España";

        public static $ciudad="Segovia";

        public static function cambiarCiudad($ciu){
            self::$ciudad=$ciu;
        }
    
    public function __construct($dni){
        $this->dni=$dni;
    }

    public function getDni(){
        return $this->dni;
    }

    }

    class nino extends hombre{
            private $numdientes;

            public function __construct($numdientes){
                $this->numdientes=$numdientes;
                parent::__construct("jhkdfhjasdhfj653");

            }

            public function mostrar(){
                echo $this->numdientes;
            }
    }
?>