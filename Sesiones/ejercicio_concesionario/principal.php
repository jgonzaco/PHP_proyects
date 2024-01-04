<!DOCTYPE html5>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div id="uno" class="col-xs-6 col-lg-6"> <!-- Comienzo de bootstrap -->  
            
            <h3><u>Productos</u></h3> 

            <form method="post" action="principal.php">
                <div> <!-- Producto 1 -->            
                    <p> <img src="./clio.jpg"> </p>
                    <p>Renault Clio</p>
                    <p>
                        <?php
                            session_start();// Incialializo creación de sesión.
                            $_SESSION["precio1"]=545; // precio de sesión/producto 1.
                        
                            if(isset( $_SESSION["precio1"])){ // Verifico que exista.
                                echo "Precio: ".$_SESSION["precio1"]."€";
                            }else{
                                echo "Sesión del producto 1 no existe";
                            }
                        ?>
                    </p>

                    <p>
                        <input type="submit" value="Comprar" name="comprar1">
                    </p>
                </div>

                <div> <!-- Producto 2 -->            
                    <p> <img src="./megane.jpg" action="principal.php"> </p>
                    <p>Renault Megane</p>
                    <p>
                        <?php
                            $_SESSION["precio2"]=406;

                            if(isset( $_SESSION["precio2"])){
                                echo "Precio: ".$_SESSION["precio2"]."€";
                            }else{
                                echo "Sesión del producto 2 no existe";
                            }

                            
                        ?>
                    </p>

                    <p>
                        <input type="submit" value="Comprar" name="comprar2">
                    </p>
                </div>

                <div> <!-- Producto 3 -->            
                    <p> <img src="./captur.jpg" action="principal.php"> </p>
                    <p>Renault captur</p>
                    <p>
                        <?php
                            $_SESSION["precio3"]=180;

                            if(isset( $_SESSION["precio3"])){
                                echo "Precio: ".$_SESSION["precio3"]."€";
                            }else{
                                echo "Sesión del producto 3 no existe";
                            }
                        ?>
                    </p>

                    <p>
                        <input type="submit" value="Comprar" name="comprar3">
                    </p>
                </div>

            </form>    
            
            </div>
            <div id="uno" class="col-xs-6 col-lg-6">
            <h3><u>Carrito</u></h3> 
                <?php
            echo "<p>";
                $_SESSION["unidad1"]=isset($_SESSION["unidad1"]) ? $_SESSION["unidad1"] : 0; // Realización de aparación de primer coche + realización de variable unidad.
                if(isset($_POST["comprar1"])){
                    $_SESSION["unidad1"]++;
                }else if(isset($_POST["eliminar1"])){
                    $_SESSION["unidad1"]--;
                }
                if(isset($_SESSION["unidad1"]) && $_SESSION["unidad1"]>0){
                        echo "<img src='./clio.jpg'>";
                        echo "<br>";
                        echo "Precio: ".$_SESSION["precio1"]."€";
                        echo "<br>";
                        echo "Unidades: ".$_SESSION["unidad1"];
                        echo "<form method='post' action='principal.php'>";
                        echo "<input type='submit' value='eliminar' name='eliminar1'>";
                        echo "</form>";
                    }
                echo "</p>";

                echo "<p>";
                $_SESSION["unidad2"]=isset($_SESSION["unidad2"]) ? $_SESSION["unidad2"] : 0; // Realización de aparación de segundo coche + realización de variable unidad.
                if(isset($_POST["comprar2"])){
                    $_SESSION["unidad2"]++;
                }else if(isset($_POST["eliminar2"])){
                    $_SESSION["unidad2"]--;
                }
                if(isset($_SESSION["unidad2"]) && $_SESSION["unidad2"]>0){
                        echo "<img src='./megane.jpg'>";
                        echo "<br>";
                        echo "Precio: ".$_SESSION["precio2"]."€";
                        echo "<br>";
                        echo "Unidades: ".$_SESSION["unidad2"];
                        echo "<form method='post' action='principal.php'>";
                        echo "<input type='submit' value='eliminar' name='eliminar2'>";
                        echo "</form>";
                    }
                echo "</p>";

                echo "<p>";
        
                $_SESSION["unidad3"]=isset($_SESSION["unidad3"]) ? $_SESSION["unidad3"] : 0; // Realización de aparación de tercer coche + realización de variable unidad.
                if(isset($_POST["comprar3"])){
                    $_SESSION["unidad3"]++;
                }else if(isset($_POST["eliminar3"])){
                    $_SESSION["unidad3"]--;
                }
                if(isset($_SESSION["unidad3"]) && $_SESSION["unidad3"]>0){
                        echo "<img src='./captur.jpg'>";
                        echo "<br>";
                        echo "Precio: ".$_SESSION["precio3"]."€";
                        echo "<br>";
                        echo "Unidades: ".$_SESSION["unidad3"];
                        echo "<form method='post' action='principal.php'>";
                        echo "<input type='submit' value='eliminar' name='eliminar3'>";
                        echo "</form>";
                    }
                echo "</p>";

                $precio = ($_SESSION["precio1"] * $_SESSION["unidad1"]) + ($_SESSION["precio2"] * $_SESSION["unidad2"]) + ($_SESSION["precio3"] * $_SESSION["unidad3"]);

                echo "Precio total: ".$precio."€";

                ?>
            </div>
        </div>
    </div>
</body>
</html>