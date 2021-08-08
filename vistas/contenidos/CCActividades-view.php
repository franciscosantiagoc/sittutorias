
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

        <div class="form-container">
            <p id="tit-activities"><strong>ACTIVIDADES</strong></p>
            <div class="col-md-12 search-table-col">
                <div class="form-group pull-right col-lg-4">
                    <button class="btn btn-primary btn-block border rounded" type="submit" >agregar NUEVA ACTIVIDAD</button>
                    <form class="form-neon"  method="POST" data-form="default" autocomplete="off">
                        <input type="hidden" name="modulo" value="CoordinadorCarrera">

                    </form>
                </div>

                <?php
                require_once './controladores/actividadesController.php';
                $ins_actividad = new actividadesController();
                $resultado='';
                $ncontrol='';
                $dat_info = $ins_actividad->consulta_de_actividad_controlador($resultado);

                ?>
                <div class="table-responsive table-bordered table  ">
                    <table class="table table-bordered table-hover tablas">
                        <thead class="bg-primary bill-header cs">
                        <tr class="text-center roboto-medium">
                            <th>#</th>
                            <th>Nombre de la actividad</th>
                            <th>Fecha Límite</th>
                            <th>Descripción</th>
                            <th>Periodo</th>
                            <th>ACTUALIZAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $contador=1;
                        foreach($dat_info as $rows){


                            echo '<tr class="text-center roboto-medium" >
                        <td>'.$contador.'</td>
                        <td>'.$rows['Nombre'].'</td>
                        <td>'.$rows['Fecha_registro'].'</td>
                        <td>'.$rows['Descripcion'].'</td>
                        <td>'.$rows['Semestrerealizacion_sug'].'</td>
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
    