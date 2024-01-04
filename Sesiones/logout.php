<DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>login.php</title>
    </head>
    <body>
        <?php
            session_start();
            session_destroy();

            echo 'Su sesión ha sido destruida';



        ?>
        <form method="post" action="login.php">
            <input type="submit" value="Pantalla Inicio" name="inicio">
        </form>
        </form>
    </body>
</html>