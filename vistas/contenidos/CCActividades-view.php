
<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador De Carrera"){
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
<script language="JavaScript" src="<?php echo SERVERURL;?>vistas/assets/js/registrocsv.js">
</script>

    <div class="register-photo">


        <?php

        if(!isset($_SESSION['busqueda_CoordinadorCarrera']) && empty($_SESSION['busqueda_CoordinadorCarrera'])){

        ?>
        <div class="container bg-white">
            <p id="tit-activities"><strong>ACTIVIDADES</strong></p>
            <div class="col-md-12 search-table-col">
                <div class="form-group pull-right col-lg-4">
                    <button class="btn btn-primary btn-block border rounded" type="submit" >agregar NUEVA ACTIVIDAD</button>
                    <form class="form-neon"  method="POST" data-form="default" autocomplete="off">
                        <input type="hidden" name="modulo" value="CoordinadorCarrera">
                        <div class="form-group">
                            <input type="text" class="form-control" name="busqueda_inicial" id="inputSearch_CCarreraActividades" onkeyup="doSearchCCActividades()" placeholder="Dato de búsqueda">
                        </div>
                    </form>
                </div>

            </div>
            <?php }else{ ?>
            <!-- Eliminar búsqueda -->
            <div class="container">

                <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/buscadorAjax.php"  method="POST" data-form="search" autocomplete="off">
                    <input type="hidden" name="modulo" value="CoordinadorCarrera">
                    <input type="hidden" name="eliminar_busqueda" value="eliminar">
                    <div class="container-fluid">
                        <div class="row justify-content-md-center">
                            <div class="col-12 col-md-6">
                                <p class="text-center" style="font-size: 20px;">
                                    Resultados de la busqueda <strong>"<?php echo $_SESSION['busqueda_CoordinadorCarrera']; ?>"</strong>
                                </p>
                            </div>
                            <div class="col-12">
                                <p class="text-center" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-raised btn-danger">
                                        ELIMINAR BÚSQUEDA
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                    require_once "./controladores/usuarioController.php";
                    $ins_usuario = new usuarioController();

                    // 0 es el índice que tiene la vista
                    echo $ins_usuario->paginador_actividades_controlador($pagina[1],5,$_SESSION['roll_sti'],$_SESSION['id_sti'],$pagina[0],$_SESSION['busqueda_CoordinadorCarrera']);
                    ?>
                </form>
            </div>

            <?php }?>
                <?php
                //listado
                require_once "./controladores/usuarioController.php";
                $ins_usuario = new usuarioController();

                // 0 es el índice que tiene la vista
                echo $ins_usuario->paginador_actividades_controlador($pagina[1],10,$_SESSION['roll_sti'],$_SESSION['id_sti'],$pagina[0],"");
                ?>

            </div>

        <div id="importcsvregis" class="form-container">
            <form method="post">
                <h2 class="text-center"><strong>Editar Actividad</strong></h2>
                <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Fecha Limite"></div>
                <div class="form-group"><select class="form-control"><option value="12">1er Semestre</option><option value="13">2do Semestre</option><option value="14">3er Semestre</option><option value="4">4to Smestre</option><option value="5">5to Semestre</option><option value="">6to Semestre</option><option value="" selected="">Semestre - Periodo a realizar</option></select></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Descripcion"></div>
        <div class="form-group file-select"><label>Archivo</label><input type="file" id="form-file" accept="image/*"></div>
        <div class="form-group" id="div-acciones"><button class="btn btn-primary" id="btn-save" type="submit" >GUARDAR</button><button class="btn btn-primary" id="btn-cancel" type="submit" >CANCELAR</button></div>
        </form>
    </div>
    </div>
    