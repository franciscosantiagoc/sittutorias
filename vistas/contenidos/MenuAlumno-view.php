    
    <?php 
    if($_SESSION['roll_sti'] != "Tutorado"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }
    
    include "./vistas/inc/navStudent.php" ?>
    
    <div class="container" id="container-alummenu">
        <div class="row" id="row">
            <div class="col">
                <p><strong class="encabezado">ALUMNO</strong></p>
            </div>
        </div>
        <div class="row" id="row">
            <div class="col"><a href="<?php echo SERVERURL;?>AlumnAct"><img id="imgactivities" style="background-image: url(vistas/assets/img/Icons/activities.png);background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Actividades</strong></p>
            </div>

                <div class="col"><a href="<?php echo SERVERURL;?>AlumnSolic"><img style="background-image: url(vistas/assets/img/Icons/solicitudes.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a><p><strong>Solicitudes</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>AlumnEditPerfil"><img style="background-image: url(vistas/assets/img/Icons/perfil.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Perfil</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>AlumnNotif"><img style="background-image: url(vistas/assets/img/Icons/notification.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Notificaciones</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>AlumnInfo"><img style="background-image: url(vistas/assets/img/Icons/information.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Información</strong></p>
            </div>
        </div>
    </div>