<!DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio propuesto BD</title>
    </head>
    <body>
        <h1>Formulario Select</h1>
        <form method="post" action="2.select.php">
            <label>Búsqueda:</label> <input type="text" name="buscar">
            <input type="submit" name="enviado" value="Buscar">
        </form>

        <hr>

        <h1>Formulario inserción</h1>
        <form method="post" action="3.insert.php">
            <label>idtabla:</label> <input type="text" name="idtabla">
            <label>Nombre:</label> <input type="text" name="nombre">
            <label>Número:</label> <input type="text" name="numero">
            <input type="submit" name="enviado" value="Insertar">
        </form>

        <hr>
        <h1>Formulario Eliminar</h1>
        <form method="post" action="4.delete.php">
            <label>idtabla:</label> <input type="text" name="idtabla">
            <input type="submit" name="enviado" value="Eliminar">
        </form>

        <hr>

        <h1>Formulario Actualización</h1>
        <form method="post" action="5.1.lectura.php">
            <label>Nombre:</label> <input type="text" name="nombre">
            <input type="submit" name="enviado" value="Actualizar">
        </form>


    </body>
</html>