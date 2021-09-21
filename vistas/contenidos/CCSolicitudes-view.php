
    <?php

    if(isset($_SESSION['roll_sti'])){
        //if($_SESSION['roll_sti'] != "Coordinador De Carrera" && $_SESSION['roll_sti'] != "Coordinador De Area"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else    if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }if($_SESSION['roll_sti'] == "Coordinador de Area"){
            include "./vistas/inc/navCoordinadorA.php";
        }else if($_SESSION['roll_sti'] == "Coordinador de Carrera"){
            include "./vistas/inc/navCoordinadorC.php";
        }
        //}
    }

    ?>

    <div class="modal" id="modalValid_Solic" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Solicitud</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <form method="post">
                            <div class="form-group">
                                <input class="form-control" type="hidden"  id="idSolic" name="idsolic" readonly>
                            </div>
                            <div class="form-group">
                                <label for="idSolicCtrl">No. de Control del Alumno</label>
                                <input class="form-control" type="text" placeholder="No Control" id="Solic_Nctrl" name="solic_nctrl" readonly>
                            </div>
                            <div class="form-group">
                                <label for="idSolicNombre">Nombre</label>
                                <input class="form-control" type="text" placeholder="Nombre" id="Solic_Nombre" name="solic_nombre" readonly>
                            </div>
                            <div class="form-group">
                                <label for="idSolicAP">Apellido Paterno</label>
                                <input class="form-control" type="text" placeholder="Apellido Paterno" id="Solic_ApellidoP" name="solic_apellidoP" disabled>
                            </div>
                            <div class="form-group">
                                <label for="idSolicAM">Apellido Materno</label>
                                <input class="form-control" type="text" placeholder="Apellido Materno" id="Solic_ApellidoM" name="solic_apellidoM" disabled>
                            </div>
                            <div class="form-group">
                                <label for="carreraSolic">Carrera</label>
                                <input class="form-control" type="text" placeholder="Carrera" id="Solic_carrera" name="solic_carrera" disabled>
                            </div>

                            <div class="form-group">
                                <label for="idSolicTipo">Tipo de solicitud</label>
                                <input class="form-control" type="text" placeholder="Tipo de solicitud"  id="Solic_Tipo" name="solic_tipo" readonly>
                            </div>
                            <div class="form-group">

                                <select id="Validar_Solic" name="validar_solic" class="form-control">
                                    <option value="1">Validar</option>
                                    <option value="2">Rechazar</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" id="ed_button" >Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['solic_nombre']) && isset($_POST['idsolic']) ){
        require_once "./controladores/solicitudesController.php";

        $ins_usuario= new solicitudesController();

        echo $ins_usuario->validacion_solicitud_controlador();
        //echo '<script> alert("envio validacion")</script>';
    }
    ?>


    <div class="register-photo">
        <div class="form-container">
            <p id="tit-activities"><strong>SOLICITUDES</strong></p>
            <?php
            require_once './controladores/solicitudesController.php';
            $ins_solicitudes = new solicitudesController();
            $dat_info = $ins_solicitudes->consulta_solicitudes_controlador();
            ?>
            <div class="col-md-12 search-table-col">
                <div class="table-responsive table-bordered table  ">
                    <table class="table table-bordered table-hover tablas">
                        <thead class="bg-primary bill-header cs">
                            <tr class="text-center roboto-medium">
                                <th>No.</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO PATERNO</th>
                                <th>APELLIDO MATERNO</th>
                                <th>NÚMERO DE CONTROL</th>
                                <th>TIPO DE SOLICITUD</th>
                                <th>FECHA DE SOLICITUD</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $contador=1;
                        foreach($dat_info as $rows){
                            $estado = $rows['estado'];
                            if($estado == 0) $estado = "En espera";
                            elseif ($estado == 1) $estado = "Validado";
                            else $estado = "Rechazado";

                            echo '
                                            <tr class="text-center roboto-medium" >
                                                <td>'.$contador.'</td>
                                                <td>'.$rows['Nombre'].'</td>
                                                <td>'.$rows['APaterno'].'</td>
                                                <td>'.$rows['AMaterno'].'</td>
                                                <td>'.$rows['NControl'].'</td>
                                                <td>'.$rows['tipo_solicitud'].'</td>
                                                <td>'.$rows['fecha_solicitud'].'</td>
                                                <td>'.$estado.'</td>
                                                
                                                <td><center>
                                                    <button class="btnEditarActividad" onclick="clickSolicitud('.$rows['NControl'].',\''.$rows['idSolicitud'].'\')" data-toggle="modal" data-target="#modalValid_Solic" >
                                                        <i class="fa fa-edit" style="font-size: 15px;"></i>
                                                    </button>
                                            </center></td>
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
        function clickSolicitud(noctrl,idsolic){

            var datos = new FormData();
            datos.append("solic_tutorado",noctrl);
            datos.append("id_solicitud",idsolic);
           // alert(idsolic);
            $.ajax({
                url: "ajax/solicitudAjax.php",
                method: "post",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                success: function(respuesta){
                    console.log(respuesta);
                        $("#Solic_Nctrl").val(noctrl);
                        $("#idSolic").val(idsolic);
                        $("#Solic_Nombre").val(respuesta[0][0]);
                        $("#Solic_ApellidoP").val(respuesta[0][1]);
                        $("#Solic_ApellidoM").val(respuesta[0][2]);
                        $("#Solic_carrera").val(respuesta[0][3]);
                        $("#Solic_Tipo").val(respuesta[0][4]);
                }
            });
        }
    </script>