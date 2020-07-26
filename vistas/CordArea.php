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
    <?php include "inc/navCoordinadorA.php"; ?>
    <div class="container" id="container-alummenu">
        <div class="row" id="row">
            <div class="col">
                <p><strong class="encabezado">COORDINADOR DE AREA</strong></p>
            </div>
        </div>
        <div class="row" id="row">
            <div class="col"><a href="contenidos/TutorInfo-view.php"><img style="background-image: url(&quot;assets/img/Icons/coord.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Gestion de Coordinadores</strong></p>
            </div>
            <div class="col"><a href="CordCarrera/TutoresC.html"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(&quot;assets/img/Icons/tutores.png&quot;);"></a>
                <p><strong>Gestion de Tutores</strong></p>
            </div>
            <div class="col"><a href="CordCarrera/TutoradosC.html"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(&quot;assets/img/Icons/ver-tutorados.png&quot;);"></a>
                <p><strong>Gestion de Tutorados</strong></p>
            </div>
            <div class="col"><a href="CordCarrera/AsignacionTutorado.html"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(&quot;assets/img/Icons/solicitudes.png&quot;);"></a>
                <p><strong>Solicitudes</strong></p>
            </div>
            <div class="col"><a href="CordCarrera/ActividadesC.html"><img style="background-image: url(&quot;assets/img/Icons/activities.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Gestion de Actividades</strong></p>
            </div>
            <div class="col"><a href="VistaAlumnos/edit-perfil.html"><img style="background-image: url(&quot;assets/img/Icons/estadistic.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Estadísticas</strong></p>
            </div>
            <div class="col"><a href="CordCarrera/edit-perfilC.html"><img style="background-image: url(&quot;assets/img/Icons/perfil.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Perfil</strong></p>
            </div>
            <div class="col"><a href="#"><img style="background-image: url(&quot;assets/img/Icons/notification.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Notificaciones</strong></p>
            </div>
        </div>
    </div>

    <?php include "./inc/Script.php"; ?>
</body>

</html>