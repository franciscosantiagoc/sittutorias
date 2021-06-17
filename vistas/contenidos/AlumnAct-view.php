
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

include "./vistas/inc/navStudent.php" 
?>

    <div class="register-photo">
        <div class="form-container" id="contain">
            <div class="col-md-12 search-table-col">
                <p id="tit-activities"><strong>ACTIVIDADES ASIGNADAS</strong></p>
                <!-- <div class="form-group pull-right col-lg-4">
                    <input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda">
                </div>
                <span class="counter pull-right"></span> -->
                <?php
                    require_once './controladores/actividadesController.php';
                    $ins_actividad = new actividadesController();
                    $dat_info = $ins_actividad->consulta_actividades_controlador($_SESSION['NControl_sti']);
                    
                ?>

                <div class="table-responsive table-bordered table table-hover table-bordered results">
                    <table class="table table-bordered table-hover tablas">
                        <thead class="bg-primary bill-header cs">
                            <tr>
                                <th id="trs-hd" class="col-lg-1">Nombre de la Actividad</th>
                                <th id="trs-hd" class="col-lg-2">Descripcion</th>
                                <th id="trs-hd" class="col-lg-2">Semestre Limite</th>
                                <th id="trs-hd" class="col-lg-3">Estado<br></th>
                                <th id="trs-hd" class="col-lg-2">Fecha de entrega</th>
                                <th id="trs-hd" class="col-lg-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($dat_info as $row){
                                    $idact = $row['idActividades'];
                                    $name = $row['Nombre'];
                                    $desc = $row['Descripcion'];
                                    $sem = $row['Semestrerealizacion_sug'];
                                    $stat = $row['Estado'];

                                    echo '
                                        <tr>
                                            <td>'. $name .'</td>
                                            <td>'. $desc .'</td>
                                            <td>'. $sem .'</td>
                                            <td>'. $stat .'</td>
                                            <td><center><i class="fa fa-remove"></center></i></td>
                                            <td><center><button class="btn btn-success bg-primary" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></center></td>
                                        </tr>
                                    ';
                                }
                            ?>
                            
                            <!-- <tr>
                                <td>Análisis Foda</td>
                                <td>18/05/2020</td>
                                <td>-</td>
                                <td><i class="fa fa-check"></i><br><br></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>
                            <tr>
                                <td>Entrevista</td>
                                <td>10/06/2020</td>
                                <td>-</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-container">
            <form method="post">
                <h2 class="text-center"><strong>Editar Actividad</strong></h2>
                <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Fecha Limite"></div>
                <div class="form-group"><input  class="form-control" type="text" placeholder="Fecha de Entrega"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Descripcion"></div>
                <div class="form-group"><label>Archivo</label><input type="file" id="form-file"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" >Enviar actividad</button></div>
            </form>
        </div>
    </div>

