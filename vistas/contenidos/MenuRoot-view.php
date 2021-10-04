<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Admin"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador de Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        }else  if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador de Carrera"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
        }
    }
}

include "./vistas/inc/navRoot.php"; 
    
?>

    <div class="container" id="container-alummenu">
        <div class="row" id="row">
            <div class="col">
                <p><strong class="encabezado">COORDINADOR ROOT</strong></p>
            </div>
        </div>
        <div class="row" id="row">
            <div class="col"><a href="<?php echo SERVERURL;?>RootCoordinadoresAR"><img style="background-image: url(vistas/assets/img/Icons/jefedepart.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Gestion de Jefes de departamento</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>RootCoordinadoresCR"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(vistas/assets/img/Icons/coord.png);"></a>
                <p><strong>Gestion de Coordinadores</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>Estadistics"><img style="background-image: url(vistas/assets/img/Icons/estadistic.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Estadísticas</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>RootActividades"><img style="background-image: url(vistas/assets/img/Icons/activities.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Gestion de Actividades</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>RootOtros"><img style="background-image: url(vistas/assets/img/Icons/information.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Otros(Areas etc...)</strong></p>
            </div>
        </div>
    </div>