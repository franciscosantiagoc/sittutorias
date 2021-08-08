    
<?php 
if(isset($_SESSION['roll_sti'])){
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
}

include "./vistas/inc/navStudent.php"; 


?>
    
    <div class="container" >
        <div class="row" id="row">
            <div class="col">
                <p><strong class="encabezado">ALUMNO</strong></p>
            </div>
        </div>
        <div class="row" id="row">
            <div class="col"><a href="<?php echo SERVERURL;?>AlumnAct"><img class="img-menu" style="background-image: url(vistas/assets/img/Icons/activities.png);"></a>
                <p><strong>Actividades</strong></p>
            </div>

                <div class="col"><a href="<?php echo SERVERURL;?>AlumnSolic"><img class="img-menu" style="background-image: url(vistas/assets/img/Icons/solicitudes.png);"></a><p><strong>Solicitudes</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>Edit-Perfil"><img class="img-menu" style="background-image: url(vistas/assets/img/Icons/perfil.png);"></a>
                <p><strong>Perfil</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>AlumnNotif"><img class="img-menu" style="background-image: url(vistas/assets/img/Icons/notification.png);"></a>
                <p><strong>Notificaciones</strong></p>
            </div>
            <div class="col"><a href="<?php echo SERVERURL;?>AlumnInfo"><img class="img-menu" style="background-image: url(vistas/assets/img/Icons/information.png);"></a>
                <p><strong>Contacto</strong></p>
            </div>
        </div>
    </div>