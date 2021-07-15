
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

include "./vistas/inc/navStudent.php"; 

?>

<div class="modal" id="modalInfoCCarrera" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Información de Coordinador de Carrera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <center><img src="" height="300px" id="image-info"></center>
                        <div class="form-group">
                            <label for="matriculaC">Matrícula</label>
                            <input class="form-control" type="text" placeholder="Matrícula" id="matriculaC" name="matriculaC" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nombreCoordinadorC">Nombre</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="nameCoordinadorC" name="nameCoordinadorC" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellidoP">Apellido Paterno</label>
                            <input class="form-control" type="text" placeholder="Apellido Paterno" id="apellidoP" name="apellidop" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input class="form-control" type="text" placeholder="Apellido Materno" id="apellidoM" name="apellidom" disabled>
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <input class="form-control" type="text" placeholder="Sexo" id="Sexo" name="sexo" disabled>
                        </div>
                        <div class="form-group">
                            <label for="numeroTelefono">Número de Teléfono</label>
                            <input class="form-control" type="text" placeholder="Número de Teléfono" id="numeroTelefono" name="numerotelefono" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" placeholder="Email" id="Email" name="email" disabled>
                        </div>
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <input class="form-control" type="text" placeholder="Carrera" id="Carrera" name="carrera" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="register-photo">
    <div class="form-container" id="contain">
        <div class="col-md-12 search-table-col">
            <p id="tit-activities"><strong>INFORMACIÓN</strong></p>

            <?php
            require_once './controladores/coordinadorescController.php';
            $ins_actividad = new coordinadorescController();
            $dat_info = $ins_actividad->consulta_coordinadoresc_controlador($_SESSION['NControl_sti']);

            ?>


            <div class="table-responsive table-bordered table table-hover table-bordered results">
                <div class="form-group">
                    <p><strong>Coordinador de Carrera</strong></p>
                </div><table class="table table-striped table-bordered nowrap tablas">
                    <thead class="bg-primary bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1">MATRÍCULA</th>
                        <th id="trs-hd" class="col-lg-2">NOMBRE</th>
                        <th id="trs-hd" class="col-lg-2">APELLIDO PATERNO</th>
                        <th id="trs-hd" class="col-lg-3">APELLIDO MATERNO<br></th>
                        <th id="trs-hd" class="col-lg-2">TELÉFONO</th>
                        <th id="trs-hd" class="col-lg-2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($dat_info as $row){
                        $idmatric = $row['Matricula'];
                        $name = $row['Nombre'];
                        $apellp = $row['APaterno'];
                        $apellm = $row['AMaterno'];
                        $sexo = $row['Sexo'];
                        $tel = $row['NTelefono'];
                        $correo = $row['Correo'];
                        $carrera = $row['Carrera_idCarrera'];


                        echo '
                                        <tr>
                                            <td>'. $idmatric .'</td>
                                            <td>'. $name .'</td>
                                            <td>'. $apellp .'</td>
                                            <td>'. $apellm .'</td>
                                            <td>'. $tel .'</td>
                                            <td><center><button class="btnVerInfo" onclick="clickActividad('.$idmatric.')" data-toggle="modal" data-target="#modalInfoCCarrera" ><i class="fas fa-eye" style="font-size: 15px;"></i></button>
                                            </center></td>
                                            
                                        </tr>
                                    ';
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function clickActividad(idInfo){
        var datos = new FormData();
        datos.append("idInformacion",idInfo);
        $imagenPrevisualizacion = document.querySelector("#image-info");

        $.ajax({
            url: "ajax/infoAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(respuesta){

                console.log(respuesta);/**/
                $("#matriculaC").val(respuesta[0][0]);
                $("#nameCoordinadorC").val(respuesta[0][1]);
                $("#apellidoP").val(respuesta[0][2]);
                $("#apellidoM").val(respuesta[0][3]);
                $("#Sexo").val(respuesta[0][4]);
                $("#numeroTelefono").val(respuesta[0][5]);
                $("#Email").val(respuesta[0][6]);
                $("#Carrera").val(respuesta[0][7]);

                var image = "<?php echo SERVERURL;?>"
                image = image +respuesta[0][8];
                $imagenPrevisualizacion.src = image;
                console.log("imagen coord:"+image);
            }
        }).fail( function( jqXHR, textStatus, errorThrown ) {
            console.log('error '+textStatus);
        });
    }

</script>