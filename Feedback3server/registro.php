<!DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Recepcion Feedback3</title>
    </head>
    <body>
        <h1><b>Los datos introducidos para el registro son:</b></h1>

        <?php
        // Comienzo de validación
            //Se verifica si viene de post
            if($_SERVER['REQUEST_METHOD']=='POST'){
                
            //Creacion de las funciones
                //Creación de función validación de nombre
                function val_nombre($nombre){
                    return !(trim($nombre)=='');
                }

                //Creación de validación de apellido
                function val_apellidos($apellidos){
                    return !(trim($apellidos)=='');
                }

                //Creacion de función validación teléfono
                function val_telefono($telefono){
                    return filter_var($telefono,FILTER_VALIDATE_INT) && $telefono >= 600000000 && $telefono <= 999999999 ;
                }

                //Creacion de función validación fecha nacimiento
                function val_fnacimiento($nacimiento){
                    return !(trim($nacimiento)=='/');
                }

                //Creación de función validación  email
                function val_correo($correo){
                    return filter_var($correo,FILTER_VALIDATE_EMAIL);
                }

                //Creación de función validación de dirección
                function val_direccion($direccion){
                    return !(trim($direccion)=='');
                }

            // Creación de variables junto a array error
                $errores=[];//incialializamos la variable errores para posteriormente introducir los posibles errores que pudiera haber introducido la persona usuaria.

            /* Inicializo variable nombre, apellidos, teléfono, nacimiento, correo y dirección, mediante un condicional ternario, diciendo si han escrito algo en el formulario, 
            me lo asignas a la variable, en el caso contrario la varible me la asignas a null */
                $nombre=isset($_POST['nombre']) ? $_POST['nombre'] : null; 
                $apellidos=isset($_POST['apellidos']) ? $_POST['apellidos'] : null; 
                $telefono=isset($_POST['telefono']) ? $_POST['telefono'] : null; 
                $nacimiento=isset($_POST['nacimiento']) ? $_POST['nacimiento'] : null; 
                $correo=isset($_POST['correo']) ? $_POST['correo'] : null; 
                $direccion=isset($_POST['direccion']) ? $_POST['direccion'] : null; 

        //Utiliación de las funciones creadas arriba.
                // función validación nombre
                if(!val_nombre($nombre)){
                    $errores[]= 'Introduzca su nombre';
                }else{
                    echo '<b>NOMBRE COMPLETO: </b>'.$nombre.' ';
                }

                //funcion validación apellidos
                if(!val_apellidos($apellidos)){
                    $errores[]= 'Introduzca sus apellidos';
                }else{
                    echo $apellidos.'<br>';
                }

                //funcion validación teléfono
                if(!val_telefono($telefono)){
                    $errores[]= 'Introduzca correctamente su teléfono con dígitos numéricos';
                }else{
                    echo '<b>TELÉFONO: </b>'.$telefono.'<br>';
                }

                //funcion validación fecha de nacimiento
                if(!val_fnacimiento($nacimiento)){
                    $errores[]= 'Introduzca su fecha de nacimiento';
                }else{
                    echo '<b>FECHA DE NACIMIENTO: </b>'.$nacimiento.'<br>';
                }

                //funcion validación correo electrónico
                if(!val_correo($correo)){
                    $errores[]= 'Introduzca adecuadamente su correo electrónico';
                }else{
                    echo '<b>EMAIL: </b>'.$correo.'<br>';
                }

                //funcion validación dirección
                if(!val_direccion($direccion)){
                    $errores[]= 'Introduzca su dirección de domicilio';
                }else{
                    echo '<b>DIRECCIÓN: </b>'.$direccion.'<br>';

                }
            }
            if(isset($errores)):
        ?>
            <ul class="errores">
            <?php
                foreach($errores as $error){
                    echo '<li>'.$error.'</li>';
                }
            ?>
        </ul>
        <?php endif;?>
    </body>
</html>