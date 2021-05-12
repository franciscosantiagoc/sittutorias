
<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador De Carrera" || $_SESSION['roll_sti'] != "Coordinador De Area"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
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


    <div class="register-photo">
        <div>
            <div id="importcsvregis" class="form-container">
                <form id="regisTutcsv" method="post">
                    <h2 class="text-center"><strong>Tutores</strong></h2>
                    <div class="form-group"><input class="form-control" type="text" id="nameinput" placeholder="Nombre" name="name"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellidos"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Carrera"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Numero de Control"></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" >Buscar</button></div>
                <div class="form-group">
                
                <a class="btn btn-primary btn-block" href="<?php echo SERVERURL;?>Registro">REGISTRAR</a>
                
                </div>
                <div class="form-group"><div class="team-boxed">

    <div class="container">
        <div class="intro">
            <h2 class="text-center">Tutores </h2>
        </div>
     
        <?php
        require_once "./controladores/usuarioController.php";
        $ins_usuario = new usuarioController();

        // 0 es el índice que tiene la vista
        echo $ins_usuario->paginador_usuario_controlador($pagina[1],10,$_SESSION['roll_sti'],$_SESSION['id_sti'],$pagina[0],"");
        ?>
        



    </div>
</div></div>

            </form>
            </div>
            <div id="cont-visdat" class="form-container">
                <form method="post"><img id="imgreg" src="./vistas/assets/img/tutores.jpg">
                    <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Paterno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Materno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Fecha Nacimiento"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Sexo"></div>
                    <div class="form-group"><input class="form-control" type="tel" placeholder="Número de Telefono"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Dirección"></div>
                    <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Area"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Matrícula"></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="button">Actualizar</button></div>
                </form>
            </div>
        </div>
    </div>
    

   
</div>
    