   
    <?php 
    
    if(isset($_SESSION['roll_sti'])){
        if($_SESSION['roll_sti'] != "Docente"){
            if($_SESSION['roll_sti'] == "Tutorado"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
            }else  if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
            }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
            }else  if($_SESSION['roll_sti'] == "Admin"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
            }
        }

    }

    include "./vistas/inc/navTutor.php"; 
    
    
    ?>  
        
    
    <div class="container" id="container-alummenu">
        <div class="row" id="row">
            <div class="col">
                <p><strong class="encabezado">TUTOR</strong></p>
            </div>
        </div>
        <div class="row" id="row">
            <div class="col"><a href="<?php echo SERVERURL;?>TutorTutorados"><img id="imgactivities" style="background-repeat: no-repeat;background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;background-image: url(vistas/assets/img/Icons/ver-tutorados.png);"></a>
                <p><strong>Tutorados</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>TutorAct"><img style="background-image: url(vistas/assets/img/Icons/solicitudes.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Actividades</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>TutorEditPerfil"><img style="background-image: url(vistas/assets/img/Icons/perfil.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Perfil</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>TutorNotif"><img style="background-image: url(vistas/assets/img/Icons/notification.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Notificaciones</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>TutorInfo"><img style="background-image: url(vistas/assets/img/Icons/information.png);background-size: cover;background-position: center;display: block;margin: auto;width: 200px;height: 200px;"></a>
                <p><strong>Información</strong></p>
            </div>
        </div>
    </div>
    