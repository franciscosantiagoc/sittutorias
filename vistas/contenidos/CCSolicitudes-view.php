
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



    <div class="register-photo">
        <div class="form-container" id="contain">
            <div class="col-md-12 search-table-col">
            <p id="tit-activities"><strong>Solicitudes</strong></p>

                    <?php
                    require_once './controladores/solicitudesController.php';
                    $ins_actividad = new solicitudesController();
                    $dat_info = $ins_actividad->consulta_solicitudes_controlador();

                    ?>
                <div class="table-responsive table-bordered table  ">
                    <table class="table table-bordered table-hover tablas">
                        <thead class="bg-primary bill-header cs">
                            <tr class="text-center roboto-medium">
                                <th>#</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO PATERNO</th>
                                <th>APELLIDO MATERNO</th>
                                <th>NÚMERO DE CONTROL</th>
                                <th>TIPO DE SOLICITUD</th>
                                <th>FECHA DE SOLICITUD</th>
                                <th>ESTADO</th>
                                <th>ACTUALIZAR</th>
                                <th>ELIMINAR</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $contador=1;
                        foreach($dat_info as $rows){
                            if($rows['estado'] == 1){
                                $estado='Revisado';
                            }else{
                                $estado='Pendiente';
                            }

                            echo '
                                            <tr class="text-center roboto-medium" >
                                            <td>'.$contador.'</td>
                                            <td>'.$rows['Nombre'].'</td>
                                            <td>'.$rows['APaterno'].'</td>
                                            <td>'.$rows['AMaterno'].'</td>
                                            <td>'.$rows['Tutorado_NControl'].'</td>
                                            <td>'.$rows['tipo_solicitud'].'</td>
                                            <td>'.$rows['fecha_solicitud'].'</td>
                                            <td>'.$estado.'</td>
                                            
                                            <td>
                                                <a href="#Actualizar" class="btn btn-success">
                                                    <i class="fas fa-sync-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form class="FormularioAjax" action="'.SERVERURL.'ajax/usuarioAjax.php"  method="POST" data-form="delete" autocomplete="off">
        
                                                    <button type="submit" class="btn btn-warning">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>';
                            $contador++;

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
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

    