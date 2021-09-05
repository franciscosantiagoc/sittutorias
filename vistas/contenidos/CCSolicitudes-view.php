
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




    <div class="register-photo">
        <div class="form-container">
            <p id="tit-activities"><strong>SOLICITUDES</strong></p>
            <?php


            echo '
                    <div class="form-container" style="display: flex; flex-direction: row; justify-content: space-around">
                       
                    </div>             
                    
                
                ';

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
                                                
                                                <td>
                                                    <abbr title="Actualizar"><a href="#Actualizar" class="btn btn-success">
                                                        <i class="fas fa-sync-alt"></i>
                                                    </a></abbr>
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
    </div>


    <script type="text/javascript">
        function clickSolic(noctrl){
            var datos = new FormData();
            datos.append("idtutorado_solic",noctrl);

            $.ajax({
                url: "ajax/usuarioAjax.php",
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
