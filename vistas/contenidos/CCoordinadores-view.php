
    <?php 

    if(isset($_SESSION['roll_sti'])){
        if($_SESSION['roll_sti'] != "Coordinador De Carrera" && $_SESSION['roll_sti'] != "Coordinador De Area"){
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

        <div id="importcsvregis" class="form-container">
            <form id="regisTutcsv" method="post">
                <h2 class="text-center"><strong>Coordinadores de Carrera</strong></h2>
                <div class="form-group"><input class="form-control" type="text" id="nameinput" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellidos"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Matrícula"></div>
                <div class="form-group"><select class="form-control"><option value="" selected="">Estado</option><option value="13">Activo</option><option value="14">Inactivo</option></select></div>
                <div class="form-group">           
                    <a class="btn btn-primary btn-block" href="<?php echo SERVERURL;?>Registro">REGISTRAR</a>
                </div>
            </form>

        </div>
        <div class="form-container" id="contain">
            <div class="col-md-12 search-table-col">

                <?php
                require_once './controladores/coordinadorescController.php';
                $ins_actividad = new coordinadorescController();
                $dat_info = $ins_actividad->consulta_coordinadoresc_controlador();

                ?>
                <div class="table-responsive table-bordered table  ">
                    <table class="table table-bordered table-hover tablas">
                        <thead class="bg-primary bill-header cs">
                            <tr class="text-center roboto-medium">
                                <th>#</th>
                                <th>MATRICULA</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO PATERNO</th>
                                <th>APELLIDO MATERNO</th>
                                <th>TELEFONO</th>
                                <th>ACTUALIZAR</th>
                                <th>ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $contador=1;
                        foreach ($dat_info as $rows){



                        echo '<tr class="text-center" >
                                <td>'.$contador.'</td>
                                <td>'.$rows['Matricula'].'</td>
                                <td>'.$rows['Nombre'].'</td>
                                <td>'.$rows['APaterno'].'</td>
                                <td>'.$rows['AMaterno'].'</td>
                                <td>'.$rows['NTelefono'].'</td>
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
                <div class="form-group" id="div-action"><button class="btn btn-primary bg-primary" id="btn-update" type="button">Actualizar</button><button class="btn btn-primary bg-primary" id="btn-cancel" type="button">CANCELAR</button></div>
            </form>
        </div>


    </div>
    