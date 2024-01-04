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
    <?php
        if(isset($_COOKIE["idioma_seleccionado"])){
                if($_COOKIE["idioma_seleccionado"]=="es"){
                    header("Location:espanol.php");
                }elseif($_COOKIE["idioma_seleccionado"]=="in"){
                    header("Location: english.php");
                }
        }
    ?>
    <h2 align="center">Elige idioma</h2>
    <div class="container-fluid">
        <div class="row">
            <div align="center" id="uno" class="col-sm-6 col-lg-6"><a href="creaCookie.php?idioma=es"><img src="/7.Cookies/practica1/image/espana.png"></a></div>
            <div align="center" id="uno" class="col-sm-6 col-lg-6"><a href="creaCookie.php?idioma=in"><img src="/7.Cookies/practica1/image/ingles.jpg"></a></div>
        </div>
    </div>
</body>
</html>