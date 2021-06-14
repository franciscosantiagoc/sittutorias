
    <?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador De Carrera" && "Coordinador De Area"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }/* else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        } */else  if($_SESSION['roll_sti'] == "Tutorado"){
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

        if(!isset($_SESSION['busqueda_CoordinadorArea']) && empty($_SESSION['busqueda_CoordinadorArea'])){

        ?>

        <div class="container" id="contain">
            <p id="tit-activities"><strong>Solicitudes</strong></p>

            <div class="col-md-12 search-table-col">
                <div class="form-group pull-right col-lg-4">
                    <!--Búsqueda-->

                    <form class="form-neon"  method="POST" data-form="default" autocomplete="off">
                        <input type="hidden" name="modulo" value="CoordinadorArea">
                        <div class="form-group">
                            <input type="text" class="form-control" name="busqueda_inicial" id="inputSearch_CAreaSolicitudes" onkeyup="doSearchCAreaSolicitudes()" placeholder="Dato de búsqueda">
                        </div>
                    </form>
                </div>

            </div>
            <?php }else{ ?>
                    <!-- Eliminar búsqueda -->
                    <div class="container">

                        <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/buscadorAjax.php"  method="POST" data-form="search" autocomplete="off">
                            <input type="hidden" name="modulo" value="CoordinadorArea">
                            <input type="hidden" name="eliminar_busqueda" value="eliminar">
                            <div class="container-fluid">
                                <div class="row justify-content-md-center">
                                    <div class="col-12 col-md-6">
                                        <p class="text-center" style="font-size: 20px;">
                                            Resultados de la busqueda <strong>"<?php echo $_SESSION['busqueda_CoordinadorArea']; ?>"</strong>
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
                            echo $ins_usuario->paginador_actividades_controlador($pagina[1],5,$_SESSION['roll_sti'],$_SESSION['id_sti'],$pagina[0],$_SESSION['busqueda_CoordinadorArea']);
                            ?>
                        </form>
                    </div>

                <?php }?>

                <div class="table-responsive table-bordered table  ">
                        <?php
                        require_once "./controladores/usuarioController.php";
                        $ins_usuario = new usuarioController();

                        // 0 es el índice que tiene la vista
                        echo $ins_usuario->paginador_solicitudes_controlador($pagina[1],5,$_SESSION['roll_sti'],$_SESSION['id_sti'],$pagina[0],"");
                        ?>
                </div>
            </div>



        <div class="container" >
            <div id="view-cambio" class="form-container">
                <form method="post">
                    <p id="tit-activities"><strong>Cambio Tutor</strong></p><img id="imgreg" src="./vistas/assets/img/alum3.jpg">
                    <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Paterno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Materno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Carrera"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Número de Control"></div>
                    <div class="form-group"><select class="form-control"><option value="" selected="">Seleccione Tutor</option><option value="13">Maribel Castillejos Toledo</option><option value="14">Sayonara Orozco Álvarez</option><option value="15">Alberto Martínez Regalado</option><option value="16">Luis Ángel Olivarez Pérez</option></select></div>
                    <div
                        class="form-group"><select class="form-control"><option value="" selected="">Tipo Solicitud</option><option value="13">Maribel Castillejos Toledo</option><option value="14">Sayonara Orozco Álvarez</option><option value="15">Alberto Martínez Regalado</option><option value="16">Luis Ángel Olivarez Pérez</option></select></div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit" >VALIDAR</button>
                        <button class="btn btn-primary btn-block" type="submit" >CANCELAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    