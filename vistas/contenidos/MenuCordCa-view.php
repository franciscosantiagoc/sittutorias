
<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador de Carrera"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador de Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        }else  if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }
}
  
include "./vistas/inc/navCoordinadorC.php" 

?>
       
    <div class="container" id="container-menu">
        <div class="row">
            <div class="col">
                <p><strong class="encabezado">Coordinador de Carrera</strong></p>
            </div>
        </div>
        <div class="row row-menu">
            <div class="col"><a href="<?php echo SERVERURL;?>CCTutores"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(vistas/assets/img/Icons/tutores.png);"></a>
                <p><strong>Gestion de Tutores</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>CCTutorados"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(vistas/assets/img/Icons/ver-tutorados.png);"></a>
                <p><strong>Gestion de Tutorados</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>CCAsignTutorado"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(vistas/assets/img/Icons/asignacion-tutorado.png);"></a>
                <p><strong>Asignacion de Tutorados</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>CCActividades"><img style="background-image: url(vistas/assets/img/Icons/activities.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Gestion de Actividades</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>Estadistics"><img style="background-image: url(vistas/assets/img/Icons/estadistic.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Estad??sticas</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>Edit-Perfil"><img style="background-image: url(vistas/assets/img/Icons/perfil.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Perfil</strong></p>
            </div>
            <!-- <div class="col"><a href="<?php echo SERVERURL;?>Notifications"><img style="background-image: url(vistas/assets/img/Icons/notification.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Notificaciones</strong></p>
            </div> -->
            <div class="col"><a href="<?php echo SERVERURL;?>CCInfo"><img style="background-image: url(vistas/assets/img/Icons/information.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Contacto</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>CCSolicitudes"><img style="background-image: url(vistas/assets/img/Icons/solicitudes.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Solicitudes</strong></p>
            </div>
        </div>
    </div>