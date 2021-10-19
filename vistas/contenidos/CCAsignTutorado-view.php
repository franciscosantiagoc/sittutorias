
<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador De Carrera"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador de Area"){
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
    <div class="modal" id="modalHistory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"  style="width: 700px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Historial de asignacion de tutorado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form>
                        <div class="form-group">
                            <label for="h_noctrl">No. de Control del Alumno</label>
                            <input class="form-control" type="text" placeholder="No Control" name="h_noctrl" id="h_noctrl" readonly>
                        </div>
                        <div class="form-group">
                            <label for="h_name">Nombre Completo</label>
                            <input class="form-control" type="text" placeholder="Nombre completo" name="h_name" id="h_name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="h_carr">Carrera</label>
                            <input class="form-control" type="text" placeholder="Carrera" name="h_carr" id="h_carr" readonly>
                        </div>
                    </form>
                </div>
                <div class="form-container">
                    <div class="table-responsive table-bordered table  ">
                        <table id="h_table" class="table table-bordered table-hover tablas" >
                            <thead class="bg-primary bill-header cs">
                                <tr class="text-center roboto-medium">
                                    <th>ID</th>
                                    <th>Matricula</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Fecha/Asignación</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal" id="modalVerCCTutorado" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Envio de actividad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <form action="" method="post" enctype="multipart/form-data">
                            <center><img src="" height="300px" id="ed_image"></center>
                            <div class="form-group">
                                <label for="v_noctrl">No. de Control del Alumno</label>
                                <input class="form-control" type="text" placeholder="No Control" name="v_noctrl" id="v_noctrl" readonly>
                            </div>
                            <div class="form-group">
                                <label for="v_nombre">Nombre</label>
                                <input class="form-control" type="text" placeholder="Nombre" name="v_nombre" id="v_nombre" readonly>
                            </div>
                            <div class="form-group">
                                <label for="v_apellidoP">Apellido Paterno</label>
                                <input class="form-control" type="text" placeholder="Apellido Paterno" id="v_apellidoP" name="v_apellidoP" readonly>
                            </div>
                            <div class="form-group">
                                <label for="v_apellidoM">Apellido Materno</label>
                                <input class="form-control" type="text" placeholder="Apellido Materno" id="v_apellidoM" name="v_apellidoM" readonly>
                            </div>
                            <div class="form-group">
                                <label for="v_Sel_Carrera">Carrera</label>
                                <select id="v_Sel_Carrera" name="v_Sel_Carrera" class="form-control" disabled>
                                    <?php
                                    require_once "./controladores/usuarioController.php";
                                    $ins_usuario = new usuarioController();
                                    $dat_info = $ins_usuario->datos_ta_controlador("idCarrera,Nombre","carrera",";");
                                    $dat_info=$dat_info->fetchAll();
                                    foreach($dat_info as $row){
                                        $id = $row['idCarrera'];
                                        $name_ca = $row['Nombre'];
                                        echo "<option value='$id'>$name_ca</option>";/**/
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="v_Sel_tutor">Tutor</label>
                                <input id="v_Sel_tutor" class="form-control" list="list-tutores">
                                <datalist id="list-tutores">
                                    <?php
                                    $dat_info = $ins_usuario->datos_ta_controlador("t.Matricula, CONCAT(p.Nombre,' ',p.APaterno,' ',p.AMaterno) as nombretutor","trabajador t, persona p"," WHERE p.idPersona=t.Persona_idPersona ORDER BY nombretutor;");
                                    $dat_info=$dat_info->fetchAll();
                                    foreach($dat_info as $row){
                                        /*$n=$dat_info->rowCount();*/
                                        $id = $row['Matricula'];
                                        $name_tu = $row['nombretutor'];
                                        echo "<option value='$id'>$name_tu</option>";
                                    }

                                    ?>
                                </datalist>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" id="ed_button" >Actualizar información</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="register-photo">
        <div class="form-container">
            <h2 class="text-center"><strong>Asignación</strong></h2>

            <div class="full-box tile-container">
            <?php
                require_once "./controladores/usuarioController.php";
                $ins_usuario = new usuarioController();
                $matricula = $_SESSION['matricula_sti'];
                $total_docentes = $ins_usuario->datos_usuario_controlador("Consulta","","SELECT t.Matricula FROM trabajador t,trabajador t2 WHERE t.Roll='Docente' AND t.Areas_idAreas=t2.Areas_idAreas AND t2.Matricula=$matricula;");
                $total_activos = $ins_usuario->datos_usuario_controlador("Consulta","","SELECT t.Matricula FROM trabajador t,trabajador t2 WHERE t.Roll='Docente' AND t.Disponibilidad=1 AND t.Areas_idAreas=t2.Areas_idAreas AND t2.Matricula=$matricula;");
            ?>

            <div class="tile">
                <div class="tile-tittle">Tutores</div>
                <div class="tile-icon">
                    <i class="fas fa-chalkboard-teacher fa-fw"></i>
                    <p><?php echo $total_docentes->rowCount(); ?> Registrados</p>
                    <p><?php echo $total_activos->rowCount(); ?> Activos</p>
                </div>
            </div>
            <?php
                $total_tutorados = $ins_usuario->datos_usuario_controlador("Consulta","","SELECT t.NControl FROM tutorado t,persona p,carrera c, trabajador tr WHERE p.idPersona=t.Persona_idPersona AND c.idCarrera=t.Carrera_idCarrera AND c.Areas_idAreas=tr.Areas_idAreas AND tr.Matricula=1114 ORDER BY p.APaterno;");
                $total_tutorados_asig = $ins_usuario->datos_usuario_controlador("Conteo","trabajador_tutorados",";");
            ?>

            <div class="tile">
                <div class="tile-tittle">Alumnos</div>
                <div class="tile-icon">
                    <i class="fas fa-user-graduate fa-fw"></i>
                    <p><?php echo $total_tutorados->rowCount(); ?> Registrados</p>
                    <p><?php echo $total_tutorados_asig->rowCount(); $resta=$total_tutorados->rowCount()-$total_tutorados_asig->rowCount();?> Asignados</p>
                </div>
            </div>
                <div id="register-options" class="form-container" <?php if($resta==0)echo 'style="justify-content:center;"';?>>
                    <button class="btn btn-primary" onclick="clickautoasig()" style="width: 350px; height: 40px; margin-bottom: 20px;">Asignación automatica</button >

                <?php

                    if($resta!=0) {
                        echo "
                        <div id='register-options'  style='background-color: red; color: white; width: 250px;'>
                            <p>Atención: se han detectado $resta alumnos sin asignar </p>
                        </div>";

                    }
                 ?>
                </div>
            <div class="col-md-12 search-table-col">
                <div class="table-responsive table-bordered table table-hover table-bordered results">
                <?php
                require_once './controladores/tutoradosController.php';
                $ins_actividad = new tutoradosController();
                $dat_info = $ins_actividad->consulta_asignacion_controlador();
                $dat_info = $dat_info -> fetchAll();
                ?>
                <div class="table-responsive table-bordered table  ">
                    <table class="table table-bordered table-hover tablas" >
                        <thead class="bg-primary bill-header cs">
                        <tr class="text-center roboto-medium">
                            
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>NControl</th>
                            <th>Carrera</th>
                            <th>Fecha/Asignación</th>
                            <th>Matricula</th>
                            <th>Tutor</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody >
                        <?php
                        /*print_r ($dat_info);*/
                         foreach ($dat_info as $rows){
                            echo '<tr class="text-center" >
                            <td>'.$rows['NombreTu'].'</td>
                            <td>'.$rows['APaternoTu'].'</td>
                            <td>'.$rows['AMaternoTu'].'</td>
                            <td>'.$rows['NControl'].'</td>
                            <td>'.$rows['NombreC'].'</td>
                             <td>'.$rows['fecha'].'</td>
                            <td>'.$rows['Matricula'].'</td>
                            <td>'.$rows['tutor'].'</td>
                            <td><center>
                                <abbr title="Click para editar la asignación">
                                    <button class="btnEditarActividad" onclick="clickasignacion('.$rows['NControl'].','.$rows['Matricula'].')" data-toggle="modal" data-target="#modalVerCCTutorado" >
                                        <i class="fa fa-edit" style="font-size: 15px;"></i>
                                    </button>
                                </abbr>
                              <abbr title="Ver historial de asignación del alumno">
                                <button class="btnEditarActividad" onclick="clickhistory('.$rows['NControl'].')" data-toggle="modal" data-target="#modalHistory" >
                                   <i class="fas fa-calendar-alt"></i>
                                </button>
                              </abbr>
                            </center></td>
                            
                            </tr>';
                        } 
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

    </div>
    <script type="text/javascript">
        function clickasignacion(ncontrol, matricula){
            var datos = new FormData();
            datos.append("asig_tutorado",ncontrol);
            datos.append("asig_tutor",matricula);
            $.ajax({
                url: "ajax/usuarioAjax.php",
                method: "post",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                success: function(resp){
                    if(resp.hasOwnProperty('Titulo')){
                        Swal.fire(resp.Titulo,resp.Texto,resp.Tipo)

                    }else{
                        $("#v_nombre").val(resp[0][0]);
                        $("#v_apellidoP").val(resp[0][1]);
                        $("#v_apellidoM").val(resp[0][2]);
                        $("#v_noctrl").val(resp[0][3]);
                        $("#v_Sel_Carrera option[value='"+resp[0][4]+"']").attr("selected",true);
                        $("#v_Sel_tutor").val(resp[0][5]);
                        //$("#v_Sel_tutor2 option[value='"+resp[0][5]+"']").attr("selected",true);
                    }
                }
            });
        }

        function clickhistory(ncontrol){
            var datos = new FormData();
            console.log('Tutorado selecionado: '+ncontrol);
            datos.append("hist_tutorado",ncontrol);
            $.ajax({
                url: "ajax/usuarioAjax.php",
                method: "post",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                success: function(resp){
                    if(resp.hasOwnProperty('Titulo')){
                        Swal.fire(resp.Titulo,resp.Texto,resp.Tipo);
                    }else{
                        console.log(resp);
                        $("#h_noctrl").val(resp.NControl);
                        $("#h_name").val(resp.Nombre);
                        $("#h_carr").val(resp.Carrera);
                        var table = $('#h_table').DataTable();
                        table.row().clear();
                        let data =resp.Tutores;

                        for (let i=0; i<data.length;i++){
                            table.row.add([data[i][0], data[i][1], data[i][2], data[i][3], data[i][4], data[i][5]]).draw(false);
                        }
                    }
                }
            });
        }

        function clickautoasig(){
            number="<?php echo  $_SESSION['matricula_sti'];?>";
            var datos = new FormData();
            datos.append("number_asignacion", number);
            $.ajax({
                url: "ajax/usuarioAjax.php",
                method: "post",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                success: function(respuesta){
                    Swal.fire(respuesta.Titulo,respuesta.Texto,respuesta.Tipo).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                    //console.log(respuesta)
                }
            });
        }

        $("#ed_button").click(function(e){
            e.preventDefault();
            var tut = $("#v_Sel_tutor").val();
            var ctrl = $("#v_noctrl").val();
            var datos = new FormData();
            datos.append("asig_ed_tut",tut);
            datos.append("asig_ed_noctrl",ctrl);
            Swal.fire({
                title: 'Advertencia',
                text: "Esta a punto de actualizar los datos del usuario ¿Desea continuar?",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "ajax/usuarioAjax.php",
                        method: "post",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'JSON',
                        success: function(respuesta){
                            //Swal.fire(respuesta.Titulo,respuesta.Texto,respuesta.Tipo);
                            console.log(respuesta.Tipo);
                            Swal.fire({
                                title: respuesta.Titulo,
                                text: respuesta.Text,
                                icon: respuesta.Tipo

                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */

                                window.location = window.location;

                            })
                        }
                    });
                }
            })
        })
    </script>
    