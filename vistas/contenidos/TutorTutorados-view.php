
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
                <div class="form-container" id="contain">
                    <div class="col-md-12 search-table-col">
                        <div class="intro">
                            <h2 class="text-center"><strong>Tutorados</strong></h2>
                            
                        </div>
                        <?php
                        require_once './controladores/tutoradosController.php';
                        $ins_actividad = new tutoradosController();
                        $dat_info = $ins_actividad->consulta_tutorados_controlador($_SESSION['matricula_sti']);
                        ?>
                        <div class="table-responsive table-bordered table  ">
                            <table class="table table-bordered table-hover tablas">
                                <thead class="bg-primary bill-header cs">
                                <tr class="text-center roboto-medium">
                                    <th>#</th>
                                    <th>NCONTROL</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO PATERNO</th>
                                    <th>APELLIDO MATERNO</th>
                                    <th>TELEFONO</th>
                                    <th>FECHA ASIGNADA</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador=1;
                                foreach ($dat_info as $rows){
                                    echo '<tr class="text-center" >
                        <td>'.$contador.'</td>
                        <td>'.$rows['NControl'].'</td>
                        <td>'.$rows['Nombre'].'</td>
                        <td>'.$rows['APaterno'].'</td>
                        <td>'.$rows['AMaterno'].'</td>
                        <td>'.$rows['NTelefono'].'</td>
                        <td>'.$rows['fecha_asig'].'</td>
                        
				    </tr>';
                                    $contador++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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
