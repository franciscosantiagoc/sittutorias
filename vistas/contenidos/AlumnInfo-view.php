
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

?>
<!-- Ver Coordinador de carrera -->
<div class="modal" id="modalInfoCCarrera" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Información del Coordinador de Carrera</h5>
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
                            <label for="email">Area</label>
                            <input class="form-control" type="text" placeholder="Area" id="Area" name="area" disabled>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tutor-->
<div class="modal" id="modalInfoTutor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Información del Tutor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <center><img src="" height="300px" id="image-infoTutor"></center>
                        <div class="form-group">
                            <label for="matriculaTutor">Matrícula</label>
                            <input class="form-control" type="text" placeholder="Matrícula" id="MatriculaTutor" name="matriculatutor" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nombreTutor">Nombre</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="NameTutor" name="nametutor" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellidoPTutor">Apellido Paterno</label>
                            <input class="form-control" type="text" placeholder="Apellido Paterno" id="apellidoPTutor" name="apellidoptutor" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellidoMTutor">Apellido Materno</label>
                            <input class="form-control" type="text" placeholder="Apellido Materno" id="apellidoMTutor" name="apellidomtutor" disabled>
                        </div>
                        <div class="form-group">
                            <label for="sexoTutor">Sexo</label>
                            <input class="form-control" type="text" placeholder="Sexo" id="SexoTutor" name="sexotutor" disabled>
                        </div>
                        <div class="form-group">
                            <label for="numeroTelTutor">Número de Teléfono</label>
                            <input class="form-control" type="text" placeholder="Número de Teléfono" id="numeroTelefonoTutor" name="numerotelefonotutor" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" placeholder="Email" id="EmailTutor" name="emailtutor" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Area</label>
                            <input class="form-control" type="text" placeholder="Area" id="AreaTutor" name="areatutor" disabled>
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
            <p id="tit-activities"><strong>INFORMACIÓN DE CONTACTOS</strong></p>

            <?php
            require_once './controladores/coordinadorescController.php';
            require_once './controladores/tutoresController.php';
            $ins_actividad = new coordinadorescController();
            $ins_actividad2 = new tutoresController();

            $dat_info = $ins_actividad->consulta_coordinadoresc_controlador($_SESSION['NControl_sti']);
            $dat_info2 = $ins_actividad2->conocer_tutores_controlador($_SESSION['NControl_sti']);

            ?>


            <div class="table-responsive table-bordered table table-hover table-bordered results">
                <table class="table table-striped table-bordered nowrap tablas">
                    <thead class="bg-primary bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1">MATRÍCULA</th>
                        <th id="trs-hd" class="col-lg-2">NOMBRE</th>
                        <th id="trs-hd" class="col-lg-2">APELLIDO PATERNO</th>
                        <th id="trs-hd" class="col-lg-3">APELLIDO MATERNO<br></th>
                        <th id="trs-hd" class="col-lg-3">ROLL<br></th>
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
                        echo '
                            <tr>
                                <td>'. $idmatric .'</td>
                                <td>'. $name .'</td>
                                <td>'. $apellp .'</td>
                                <td>'. $apellm .'</td>
                                <td>Coordinador de Carrera</td>
                                <td>'. $tel .'</td>
                                <td><center><abbr title="Ver información"><button class="btnVerInfo" onclick="clickVerCCarrera('.$idmatric.')" data-toggle="modal" data-target="#modalInfoCCarrera" ><i class="fas fa-eye" style="font-size: 15px;"></i></button></abbr>
                                </center></td>
                                
                            </tr>
                        ';
                    }
                    foreach($dat_info2 as $row){
                        $idmatric = $row['Matricula'];
                        $name = $row['Nombre'];
                        $apellp = $row['APaterno'];
                        $apellm = $row['AMaterno'];
                        $sexo = $row['Sexo'];
                        $tel = $row['NTelefono'];
                        $correo = $row['Correo'];


                        echo '

                            <tr>
                                <td>'. $idmatric .'</td>
                                <td>'. $name .'</td>
                                <td>'. $apellp .'</td>
                                <td>'. $apellm .'</td>
                                <td>Tutor</td>
                                <td>'. $tel .'</td>
                                <td><center><abbr title="Ver información"><button class="btnVerInfo" onclick="clickVerTutor('.$idmatric.')" data-toggle="modal" data-target="#modalInfoTutor" ><i class="fas fa-eye" style="font-size: 15px;"></i></button></abbr>
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
    function clickVerCCarrera(idInfo){
        var datos = new FormData();
        datos.append("idInfCCar",idInfo);
        $imagenPrevisualizacion = document.querySelector("#image-info");

        $.ajax({
            url: "ajax/infoCCarreraAjax.php",
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
                $("#Area").val(respuesta[0][7]);


                var image = "<?php echo SERVERURL;?>"
                image = image +respuesta[0][8];
                $imagenPrevisualizacion.src = image;
                console.log("imagen coord:"+image);
            }
        });
    }

</script>

<!-- Ver tutor -->
<script type="text/javascript">
    function clickVerTutor(idInfoTutor){
        var datos = new FormData();
        datos.append("idInfoTutores",idInfoTutor);
        $imagenPrevisualizacion = document.querySelector("#image-infoTutor");

        $.ajax({
            url: "ajax/infoTutoresAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(respuesta){

                console.log(respuesta);/**/
                $("#MatriculaTutor").val(respuesta[0][0]);
                $("#NameTutor").val(respuesta[0][1]);
                $("#apellidoPTutor").val(respuesta[0][2]);
                $("#apellidoMTutor").val(respuesta[0][3]);
                $("#SexoTutor").val(respuesta[0][4]);
                $("#numeroTelefonoTutor").val(respuesta[0][5]);
                $("#EmailTutor").val(respuesta[0][6]);
                $("#AreaTutor").val(respuesta[0][7]);


                var image = "<?php echo SERVERURL;?>"
                image = image +respuesta[0][8];
                $imagenPrevisualizacion.src = image;
                console.log("imagen coord:"+image);
            }
        });
    }

</script>