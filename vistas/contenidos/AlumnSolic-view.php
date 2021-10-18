
    <?php 
    
    if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Tutorado"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador de Carrera"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador de Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }
}

include "./vistas/inc/navStudent.php";
require_once "./modelos/mainModel.php";

    
    ?>


    <!-- Realizar solicitud -->
    <div class="modal" id="modalAActividad" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Realizar solicitud</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <form method="post" >
                            <center><img src="" height="300px" id="image-infoTE"></center>
                            <div class="form-group">
                                <label for="idNControl">NControl</label>
                                <input class="form-control" type="text" placeholder="No Control" id="SNCtrl" name="snctrl" readonly>
                            </div>
                            <div class="form-group">
                                <label for="snombre">Nombre</label>
                                <input class="form-control" type="text" placeholder="Nombre" id="SNombre" name="snombre" readonly >
                            </div>
                            <div class="form-group">
                                <label for="sapaterno">Apellido Paterno</label>
                                <input class="form-control" type="text" placeholder="Apellido Paterno" id="SAPaterno" name="sapaterno" readonly>
                            </div>
                            <div class="form-group">
                                <label for="samaterno">Apellido Materno</label>
                                <input class="form-control" type="text" placeholder="Apellido Materno" id="SAMaterno" name="samaterno" readonly>
                            </div>
                            <div class="form-group">
                                <label for="samaterno">Carrera</label>
                                <input class="form-control" type="text" placeholder="Carrera" id="SCarrera" name="scarrera" readonly>
                            </div>
                            <label for="samaterno">Tipo de solicitud</label>
                            <select id="Mselect_Solicitud" class="form-control js-example-basic-single" name="Mselect_solictud" onchange="ShowDocente(this.value)">
                                <option value="" selected="">Seleccione el tipo de solicitud</option>
                                    <option value="1">Solicitar cambio de Tutor</option>
                                    <option value="2">Solicitar constancia</option>
                                    <option value="3">Solicitar revisión de actividad</option>

                            </select>

                            <?php
                            require_once './controladores/tutoresController.php';
                            $ins_actividad = new tutoresController();
                            $dat_info = $ins_actividad->consulta_tutores_controlador();
                            ?>
                            
                            <div class="form-container">
                                <div class="form-group" id="tutores">
                                    <label for="cambio_tutor" id="label_tutor" style="display: none">Ingrese Nombre/Matrícula</label>
                                    <input type="text" id="cambio_tutor" name="Cambio_Tutor" list="lista-tutores" style="display: none">
                                    <datalist id="lista-tutores">
                                        <?php
                                        foreach ($dat_info as $row) {
                                            $idmatric = $row['Matricula'];
                                            $name = $row['Nombre'];
                                            $apellp = $row['APaterno'];
                                            $apellm = $row['AMaterno'];
                                            echo '
                                                <option value="'.$idmatric.'">'.$name.' '.$apellp.' '.$apellm.'</option>';
                                        }
                                        ?>
                                    </datalist>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <input class="btn btn-primary btn-block" type="submit" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['snctrl']) && isset($_POST['Mselect_solictud']) ){
        require_once "./controladores/solicitudesController.php";
        $ins_solicitud= new solicitudesController();
        echo $ins_solicitud->registro_solicitud_controlador();
    }
    ?>

    <div class="register-photo">
        <div class="form-container">
            <p id="tit-activities"><strong>SOLICITUDES</strong></p>
            <?php
            require_once './controladores/tutoradosController.php';
            $ins_actividad = new tutoradosController();
            $dat_info = $ins_actividad->consulta_gral_tutorados_controlador($_SESSION['NControl_sti']);
            $ncontrl=$_SESSION['NControl_sti'];

            require_once './controladores/solicitudesController.php';
            $ins_lib = new solicitudesController();
            $consultalib = $ins_lib->valida_liberacion();
            $disabled = $consultalib ? "disabled" : "";

            echo '
                    <div class="form-container" style="display: flex; flex-direction: row; justify-content: space-around">
                        <center>
                            <button class="btn btn-primary btn-block border rounded" onclick="clickSolic('.$ncontrl.')" data-toggle="modal" data-target="#modalAActividad" '.$disabled.' >REALIZAR SOLICITUD</button>
                        </center>
                    </div>             
                    
                ';
            if($consultalib){
                echo '  

                    <br><div id="register-options" class="form-container" style="justify-content: center; align-items: center;">
                        <div style="background-color: mediumseagreen; color: white; width: 350px; padding: 10px; border: solid 2px black;">
                           <p>Felicidades: Has culminado correctamente la actividad de Tutorías, a continuación podras descargar tu constancia.</p>
                        </div> 
                    </div><br>
                      <div class="form-container" style="display: flex; flex-direction: row; justify-content: space-around">
                      
                        <center>
                            <a href="'. SERVERURL.'FormatConstancia" class="btn btn-primary btn-block border rounded"  >DESCARGAR CONSTANCIA</a>
                        </center>
                      </div><br> 
                ';
            }
            require_once './controladores/solicitudesController.php';
            $ins_solicitudes = new solicitudesController();
            $dat_info = $ins_solicitudes->consulta_solicitudtutorado_controlador();


            ?>
            <div class="col-md-12 search-table-col">
                <div class="table-responsive table-bordered table ">
                    <table class="table table-bordered table-hover tablas">
                        <thead class="bg-primary bill-header cs">
                            <tr class="text-center roboto-medium">
                                <th>No.</th>
                                <th>Id de solicitud</th>
                                <th>Tipo de solicitud</th>
                                <th>Fecha de solicitud</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $contador=1;
                        foreach ($dat_info as $row){
                            $idsolicitud = $row['idSolicitud'];
                            $tipo_solic = $row['tipo_solicitud'];
                            $fecha_solic = $row['fecha_solicitud'];

                            $estado = $row['estado'];
                            if($estado == 0) $estado = "En espera";
                            elseif ($estado == 1) $estado = "Validado";
                            else $estado = "Rechazado";

                            echo '<tr>
                                    <td>'.$contador.'</td>
                                    <td>'. $idsolicitud.'</td>
                                    <td>'. $tipo_solic.'</td>
                                    <td>'. $fecha_solic.'</td>
                                    <td>'. $estado .'</td>  
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


    <script type="text/javascript">
        function clickSolic(noctrl){
            var datos = new FormData();
            datos.append("idtutorado_solic",noctrl);

            $.ajax({
                url: "ajax/solicitudAjax.php",
                method: "post",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                success: function(respuesta){
                    console.log(respuesta);/**/
                    $("#SNCtrl").val(respuesta[0][0]);
                    $("#SNombre").val(respuesta[0][1]);
                    $("#SAPaterno").val(respuesta[0][2]);
                    $("#SAMaterno").val(respuesta[0][3]);
                    $("#SCarrera").val(respuesta[0][4]);




                }
            });

        }

        function ShowDocente(value){
            let select_tutor = document.querySelector("#cambio_tutor");
            let label_tutor = document.querySelector("#label_tutor");
            if(value ==  1){
                select_tutor.style.display = "";
                label_tutor.style.display = "";

            }else{
                select_tutor.style.display = "none";
                label_tutor.style.display = "none";

            }

        }


    </script>
