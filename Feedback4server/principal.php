<!DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Feedback 4</title>
    </head>
    <body>
        <h1>Formulario de selección de Actividad</h1>
        <h2>Qué desea realizar en la base de datos ?</h2>
        <form action="insertar.php" method="post" >
            <h3>Insertar algún elemento ?</h3>
            <p>
            <label>IDTABLA:</label><input type="number" value="id" name="id"><br>
            <label>Nombre:</label><input type="text"  name="nombre"><br>
            <label>numero:</label><input type="number"  value="numero" name="numero"><br>
            <input type="submit" value="Insertar" name="insertar">
            </p>
        </form>

        <form action="eliminar.php" method="post" >
            <h3>Eliminar algún elemento por su ID</h3>
            <p>
            <label>IDTABLA:</label><input type="number" value="id" name="id"><br>
            <input type="submit" value="Eliminar" name="eliminar">
            </p>
        </form>

        
        <form action="actualizar.php" method="post" >
            <h3>Quiere actualizar algún datos ? Seleccione el ID y a continuación los datos que quiera modificar</h3>
            <p>
            <label>IDTABLA:</label><input type="number" value="id" name="id"><br>
            <label>Nombre:</label><input type="text" name="nombre"><br>
            <label>numero:</label><input type="number"  value="numero" name="numero"><br>
            <input type="submit" value="Modificar" name="modificar">
            </p>
        </form>

        
        <form action="ver.php" method="post" >
            <h3>Ver tabla</h3>
            <p>
            <input type="submit" value="VER" name="ver">
            </p>


    </body>
</html>