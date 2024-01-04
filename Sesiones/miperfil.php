<DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>login.php</title>
    </head>
    <body>
        <?php
            session_start();

  

            if(isset($_SESSION['usuario']) && isset($_SESSION['password'])){
                echo 'Hola '. $_SESSION['usuario'];
                ?>
                <form method="post" action="logout.php">
                <input type="submit" value="Cerrar sesión">
                </form>
                <?php
            }elseif(isset($_POST['usuario']) && $_POST['password']){
                $_SESSION['usuario']=isset($_POST['usuario']) ? $_POST['usuario'] : "";
                $_SESSION['password']=isset($_POST['password']) ? $_POST['password'] : "";

                echo 'Hola '. $_SESSION['usuario'];
            ?>
                <form method="post" action="logout.php">
                <input type="submit" value="Cerrar sesión">
                </form>
            <?php
                
            }else{
                echo 'Usuario no registrado, vuelva a la página de login';
            ?>
                <form method="post" action="login.php">
                <input type="submit" value="Volver">
                </form>
            <?php

            }
           
            ?>   

        </form>
    </body>
</html>