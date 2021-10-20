
<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador de Area"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador de Carrera"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
        }else  if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }
}

include "./vistas/inc/navCoordinadorA.php"; 

?>
    <div class="container" id="container-menu">
        <div class="row">
            <div class="col">
                <p><strong class="encabezado">Coordinador de Area</strong></p>
            </div>
        </div>
        <div class="row row-menu">
            <div class="col"><a href="<?php echo SERVERURL;?>CCoordinadores"><img style="background-image: url(vistas/assets/img/Icons/coord.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Gestion de Coordinadores</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>CCTutores"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(vistas/assets/img/Icons/tutores.png);"></a>
                <p><strong>Gestion de Tutores</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>CCTutorados"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(vistas/assets/img/Icons/ver-tutorados.png);"></a>
                <p><strong>Gestion de Tutorados</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>CCSolicitudes"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(vistas/assets/img/Icons/solicitudes.png);"></a>
                <p><strong>Solicitudes</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>CCActividades"><img style="background-image: url(vistas/assets/img/Icons/activities.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Gestion de Actividades</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>Estadistics"><img style="background-image: url(vistas/assets/img/Icons/estadistic.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Estadísticas</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>Edit-Perfil"><img style="background-image: url(vistas/assets/img/Icons/perfil.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Perfil</strong></p>
            </div>
            <!-- <div class="col"><a href="<?php echo SERVERURL;?>Notifications"><img style="background-image: url(vistas/assets/img/Icons/notification.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Notificaciones</strong></p>
            </div> -->
        </div>
    </div>
