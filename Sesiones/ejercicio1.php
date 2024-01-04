<!DOCTYPE html>
<html>
    <head>
    <?php
        session_start();

        $_SESSION['variable1']=isset($_SESSION['variable1']) ? $_SESSION['variable1'] : 0;
        $_SESSION['variable2']=isset($_SESSION['variable2']) ? $_SESSION['variable2'] : 0;

        echo 'Variable 1: '.$_SESSION['variable1'];
        echo  '<br>';
        echo 'Variable 2: '.$_SESSION['variable2'];

        if(isset($_POST['contar'])){
            switch ($_POST['contar']){
                case 'suma variable 1':
                    $_SESSION['variable1']++;
                    break;

                case 'suma variable 2':
                    $_SESSION['variable2']++;
                    break;

                case 'resta variable 1':
                    $_SESSION['variable1']--;
                    break;

                case 'resta variable 2':
                      $_SESSION['variable2']--;
                      break;
                
                      case 'Eliminar':
                        session_destroy();
                        break;

            }
        }


        
    ?>
    <form method="post">
        <select name="contar">
            <option>Elige una opción</option>
            <option>suma variable 1</option>
            <option>suma variable 2</option>
            <option>resta variable 1</option>
            <option>resta variable 2</option>
            <option>Eliminar</option>
            <input type="submit" value="Enviar">
        </select>
    </form>
    </body>
</html>