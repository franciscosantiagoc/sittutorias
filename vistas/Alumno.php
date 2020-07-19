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
    <?php include "inc/navStudent.php" ?>
    
    <div class="container" id="container-alummenu">
        <div class="row" id="row">
            <div class="col">
                <p><strong class="encabezado">ALUMNO</strong></p>
            </div>
        </div>
        <div class="row" id="row">
            <div class="col"><a href="VistaAlumnos/Actividades.html"><img id="imgactivities" style="background-image: url(&quot;assets/img/Icons/activities.png&quot;);background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Actividades</strong></p>
            </div>
            <div class="col"><a href="VistaAlumnos/Solicitudes.html"><img style="background-image: url(&quot;assets/img/Icons/solicitudes.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Solicitudes</strong></p>
            </div>
            <div class="col"><a href="VistaAlumnos/edit-perfil.html"><img style="background-image: url(&quot;assets/img/Icons/perfil.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Perfil</strong></p>
            </div>
            <div class="col"><a href="#"><img style="background-image: url(&quot;assets/img/Icons/notification.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Notificaciones</strong></p>
            </div>
            <div class="col"><a href="VistaAlumnos/information.html"><img style="background-image: url(&quot;assets/img/Icons/information.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Información</strong></p>
            </div>
        </div>
    </div>
    
    <?php include "inc/Script.php" ?>
</body>

</html>