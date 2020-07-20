<!DOCTYPE html>
<html>
<?php 
    
    $COMPAN="Sistema de Gestion de Tutorias";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $COMPAN;?></title>
    
    <?php include "inc/styles.php" ?>
    
</head>

<body>
    
        
    <?php include "inc/navTutor.php" ?>  
        
    
    <div class="container" id="container-alummenu">
        <div class="row" id="row">
            <div class="col">
                <p><strong class="encabezado">TUTOR</strong></p>
            </div>
        </div>
        <div class="row" id="row">
            <div class="col"><a href="VistaTutores/Tutorados.html"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(&quot;assets/img/Icons/ver-tutorados.png&quot;);"></a>
                <p><strong>Tutorados</strong></p>
            </div>
            <div class="col"><a href="VistaTutores/ActividadesT.html"><img style="background-image: url(&quot;assets/img/Icons/solicitudes.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Actividades</strong></p>
            </div>
            <div class="col"><a href="VistaTutores/edit-perfilT.html"><img style="background-image: url(&quot;assets/img/Icons/perfil.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Perfil</strong></p>
            </div>
            <div class="col"><a href="#"><img style="background-image: url(&quot;assets/img/Icons/notification.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Notificaciones</strong></p>
            </div>
            <div class="col"><a href="VistaTutores/informationT.html"><img style="background-image: url(&quot;assets/img/Icons/information.png&quot;);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Información</strong></p>
            </div>
        </div>
    </div>
    
    
    <?php include "inc/Script.php" ?>
</body>

</html>