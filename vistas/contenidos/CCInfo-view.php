
<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador de Carrera"){
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

<div class="register-photo">
    <div class="form-container" id="contain">
        <div class="col-md-12 search-table-col">
            <p id="tit-activities"><strong>INFORMACIÓN DE CONTACTO</strong></p>
            <?php
            require_once './controladores/jefesdController.php';
            $ins_actividad = new jefesdController();
            $dat_info = $ins_actividad->consulta_jefesd_controlador();

            ?>
            <div class="table-responsive table-bordered table table-hover table-bordered results">
                <div class="form-group">
                    <p><strong>Coordinador del Área</strong></p>
                </div>
                <table class="table table-striped table-bordered nowrap tablas">
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
                        echo '
                                        <tr>
                                            <td>'. $idmatric .'</td>
                                            <td>'. $name .'</td>
                                            <td>'. $apellp .'</td>
                                            <td>'. $apellm .'</td>
                                            <td>'. $tel .'</td>
                                            <td><center><button class="btnVerInfoCA" onclick="clickVerJefe('.$idmatric.')" data-toggle="modal" data-target="#modalInfoCArea" ><i class="fas fa-eye" style="font-size: 15px;"></i></button>
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
    function clickVerJefe(idInfoCA){
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