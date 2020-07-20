<!DOCTYPE html>
<html>
<?php 
    include "../config/APP.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo COMPANY;?></title>
    
    <?php include "inc/styles.php" ?>
</head>

<body>
    <?php include "inc/navRoot.php"; ?>

    <div class="container" id="container-alummenu">
        <div class="row" id="row">
            <div class="col">
                <p><strong class="encabezado">COORDINADOR ROOT</strong></p>
            </div>
        </div>
        <div class="row" id="row">
            <div class="col"><a href="VistaRoot/CoordinadoresAR.html"><img style="background-image: url(&quot;assets/img/Icons/jefedepart.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Gestion de Jefes de departamento</strong></p>
            </div>
            <div class="col"><a href="VistaRoot/CoordinadoresCR.html"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(&quot;assets/img/Icons/coord.png&quot;);"></a>
                <p><strong>Gestion de Coordinadores</strong></p>
            </div>
            <div class="col"><a href="VistaRoot/EstadisticosR.html"><img style="background-image: url(&quot;assets/img/Icons/estadistic.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Estadísticas</strong></p>
            </div>
        </div>
    </div>
    <?php include "inc/Script.php" ?>
</body>

</html>