
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


    <div class="register-photo">
        <div class="form-container">
            
                    <h2 class="text-center"><strong>Asignación</strong></h2>

                    <div class="full-box tile-container">
                    <?php 
                        require_once "./controladores/usuarioController.php";
                        $ins_usuario = new usuarioController();
                        $total_docentes = $ins_usuario->datos_usuario_controlador("Conteo","trabajador"," WHERE Roll='Docente';");
                        $total_activos = $ins_usuario->datos_usuario_controlador("Conteo","trabajador"," WHERE Roll='Docente' AND Disponibilidad='1';");
                    ?>

                    <div class="tile">
                        <div class="tile-tittle">Tutores</div>
                        <div class="tile-icon">
                            <i class="fas fa-chalkboard-teacher fa-fw"></i>
                            <p><?php echo $total_docentes->rowCount(); ?> Registrados</p>
                            <!-- <p><?php echo $total_activos->rowCount(); ?> Activos</p> -->
                        </div>
                    </div>
                    <?php
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","tutorado",";");
                    ?>
                    
                    <div class="tile">
                        <div class="tile-tittle">Alumnos</div>
                        <div class="tile-icon">
                            <i class="fas fa-user-graduate fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
                        </div>
                    </div>
            
            <div class="col-md-12 search-table-col">
                <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda"></div><span class="counter pull-right"></span>
                <div class="table-responsive table-bordered table table-hover table-bordered results">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary bill-header cs">
                            <tr>
                                <th id="trs-hd" class="col-lg-1">Nombre del tutorado</th>
                                <th id="trs-hd" class="col-lg-2">Numero de Control</th>
                                <th id="trs-hd" class="col-lg-3">Carrera</th>
                                <th id="trs-hd" class="col-lg-2">Nombre del Tutor</th>
                                <th id="trs-hd" class="col-lg-2">Estado</th>
                                <th id="trs-hd" class="col-lg-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Francisco Santiago de la Cruz</td>
                                <td>16190437</td>
                                <td>Ingenieria en Sistemas</td>
                                <td>Maribel Castillejos Toledo</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>
                            <tr>
                                <td>Luis Alberto Robles Parada</td>
                                <td>16190359&nbsp;<br><br><br></td>
                                <td>Ingenieria en Sistemas<br></td>
                                <td>Sayonara Orozco Alvarez</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>
                            <tr>
                                <td>Juan Carlos Fernandez Piñon</td>
                                <td>16190439</td>
                                <td>Ingenieria en Sistemas<br></td>
                                <td>-<br></td>
                                <td><i class="fa fa-remove"></i></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
    