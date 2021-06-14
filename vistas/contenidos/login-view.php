<?php 
if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] == "Admin"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
    }else if($_SESSION['roll_sti'] == "Docente"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
    }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
    }else  if($_SESSION['roll_sti'] == "Tutorado"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
    }else  if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
    }/**/
}
include "./vistas/inc/navInicial.php"; ?>

<div class="login-clean"
   style="background-image: url(<?php echo SERVERURL; ?>vistas/assets/img/entrada-tec.png);background-size: 100% 100%;background-repeat: no-repeat;height: 900px;">
   <form class='' action='' method="post" autocomplete="off" style="margin-top: 120px;">
      <h2 class="sr-only">Login Form</h2>
      <div class="illustration"><i class="icon ion-ios-contact-outline" style="color: rgb(238,75,40);"></i></div>
      <div class="form-group">
         <input class="form-control" type="text" pattern="[0-9-]{4,10}" name="numcont" placeholder="Num Control">
      </div>
      <div class="form-group">
         <input class="form-control" type="password" name="pass" placeholder="Contraseña">
      </div>
      <div class="form-group">
         <button class="btn btn-primary btn-block" type="submit"
            style="background-color: rgb(238,75,40);">ACCEDER</button>
      </div>
      <a class="forgot" href="#">Olvidaste tu contraseña?</a>
   </form>
</div>

<?php
        if(isset($_POST['numcont']) && isset($_POST['pass'])){
            require_once "./controladores/loginControlador.php";

            $ins_login= new loginControlador();

            echo $ins_login->iniciar_sesion_controlador();
        }
    ?>

