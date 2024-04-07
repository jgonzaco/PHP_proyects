<?php
function validacion_productos($nombre,$descripcion,$precio,$categoria,$cantidad)
{
    // Se realiza validación de página.
    // Creación de función validación nombre
    function validar_nombre($nombre)
    {
        return !(trim($nombre) == '');
    }

    // Creación de función validación descripción
    function validar_descripcion($descripcion)
    {
        return !(trim($descripcion) == '');
    }

    // Creación de función validación precio
    function validar_precio($precio)
    {
        return filter_var($precio, FILTER_VALIDATE_INT);
    }

    // Creación de función validación categoria
    function validar_categoria($categoria)
    {
        return !(trim($categoria) == '');
    }

    // Creación de función validación cantidad
    function validar_cantidad($cantidad)
    {
        return filter_var($cantidad, FILTER_VALIDATE_INT);
    }

    //Creación variable de "errores":
    $errores = null;

    // Se realizan validaciones
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // función validación nombre
        if (!validar_nombre($nombre)) {
            $errores[] = "Introduzca un nombre correcto";
        }

        // función validación descripcion
        if (!validar_descripcion($descripcion)) {
            $errores[] = "Introduzca una descripción correcta";
        }

        // función validación precio
        if (!validar_precio($precio)) {
            $errores[] = "Introduzca una precio correcto";
        }

        // función validación categoría
        if (!validar_categoria($categoria)) {
            $errores[] = "Introduzca una categoría correcta";
        }

        // función validación cantidad
        if (!validar_precio($cantidad)) {
            $errores[] = "Introduzca una cantidad adecuada";
        }

        return $errores;
    }
}
?>