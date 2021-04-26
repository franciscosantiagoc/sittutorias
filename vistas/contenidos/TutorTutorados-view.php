
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

    <div class="register-photo">
        <div id="importcsvregis" class="form-container">
            <form id="regisTutcsv" method="post">
                <h2 class="text-center"><strong>Tutorados</strong></h2><div class="team-boxed">
    <div class="container">
        
       
        <?php
            require_once "./controladores/usuarioController.php";
            $ins_usuario = new usuarioController();

            // 0 es el índice que tiene la vista
            echo $ins_usuario->paginador_usuario_controlador($pagina[1],10,$_SESSION['roll_sti'],$_SESSION['id_sti'],$pagina[0],"");
            ?>
    
    </div>
</div></form>
        </div>
        <div id="cont-visdat" class="form-container">
            <form method="post"><img id="imgreg" src="./vistas/assets/img/alum3.jpg">
                <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Paterno"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Materno"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Fecha Nacimiento"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Sexo"></div>
                <div class="form-group"><input class="form-control" type="tel" placeholder="Número de Telefono"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Dirección"></div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Carrera"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Numero de Control"></div>
            </form>
        </div>
    </div>
