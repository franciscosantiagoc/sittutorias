
<?php

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Docente"){
        if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador de Carrera"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador de Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }

}

include "./vistas/inc/navTutor.php";
?>
<!-- Info CArea -->
<div class="modal" id="modalInfoCArea" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Información del Coordinador de Área</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <center><img src="" height="300px" id="image-infoCArea"></center>
                        <div class="form-group">
                            <label for="matriculaCA">Matrícula</label>
                            <input class="form-control" type="text" placeholder="Matrícula" id="matriculaCA" name="matriculaCA" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nombreCoordinadorCA">Nombre</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="nameCoordinadorCA" name="nameCoordinadorCA" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellidoPCA">Apellido Paterno</label>
                            <input class="form-control" type="text" placeholder="Apellido Paterno" id="apellidoPCA" name="apellidopca" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellidoMCA">Apellido Materno</label>
                            <input class="form-control" type="text" placeholder="Apellido Materno" id="apellidoMCA" name="apellidomca" disabled>
                        </div>
                        <div class="form-group">
                            <label for="sexoCA">Sexo</label>
                            <input class="form-control" type="text" placeholder="Sexo" id="SexoCA" name="sexoca" disabled>
                        </div>
                        <div class="form-group">
                            <label for="numeroTelefonoCA">Número de Teléfono</label>
                            <input class="form-control" type="text" placeholder="Número de Teléfono" id="numeroTelefonoCA" name="numerotelefonoCA" disabled>
                        </div>
                        <div class="form-group">
                            <label for="emailCA">Email</label>
                            <input class="form-control" type="text" placeholder="Email" id="EmailCA" name="emailca" disabled>
                        </div>
                        <div class="form-group">
                            <label for="areaCA">Área</label>
                            <input class="form-control" type="text" placeholder="Area" id="AreaCA" name="areaca" disabled>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info CCarrera -->
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
                            <label for="areaCC">Área</label>
                            <input class="form-control" type="text" placeholder="Area" id="AreaCC" name="areacc" disabled>
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
            require_once './controladores/jefesdController.php';
            require_once './controladores/coordinadorescController.php';
            $ins_actividad = new jefesdController();
            $ins_actividad2 = new coordinadorescController();
            $dat_info = $ins_actividad->consulta_jefesd_controlador();
            $dat_info2 = $ins_actividad2->consulta_coordinadoresc_controlador();

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
                                <td>Jefe de departamento</td>
                                <td>'. $tel .'</td>
                                <td><center><abbr title="Ver información"><button class="btnVerInfoCA" onclick="clickActividad('.$idmatric.')" data-toggle="modal" data-target="#modalInfoCArea" ><i class="fas fa-eye" style="font-size: 15px;"></i></button></abbr>
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
                                            <td>Coordinador de Carrera</td>
                                            <td>'. $tel .'</td>
                                            <td><center><abbr title="Ver información"><button class="btnVerInfo" onclick="clickVerCCarrera('.$idmatric.')" data-toggle="modal" data-target="#modalInfoCCarrera" ><i class="fas fa-eye" style="font-size: 15px;"></i></button></abbr>
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


<!-- Info CArea -->
<script type="text/javascript">
    function clickActividad(idInfoCA){
        var datos = new FormData();
        datos.append("idInfoCArea",idInfoCA);
        $imagenPrevisualizacion = document.querySelector("#image-infoCArea");
        $.ajax({
            url: "ajax/infoCAreaAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(respuesta){

                console.log(respuesta);/**/
                $("#matriculaCA").val(respuesta[0][0]);
                $("#nameCoordinadorCA").val(respuesta[0][1]);
                $("#apellidoPCA").val(respuesta[0][2]);
                $("#apellidoMCA").val(respuesta[0][3]);
                $("#SexoCA").val(respuesta[0][4]);
                $("#numeroTelefonoCA").val(respuesta[0][5]);
                $("#EmailCA").val(respuesta[0][6]);
                $("#AreaCA").val(respuesta[0][7]);

                var image = "<?php echo SERVERURL;?>";
                image = image +respuesta[0][8];
                $imagenPrevisualizacion.src = image;
                console.log("imagen coord:"+image);

            }
        }).fail( function( jqXHR, textStatus, errorThrown ) {
            console.log('error '+textStatus);
        });
    }

</script>

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
                $("#AreaCC").val(respuesta[0][7]);


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