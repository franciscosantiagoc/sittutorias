
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

include "./vistas/inc/navStudent.php" 
?>
    <div class="modal" id="modalEditarActividad" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <div class="form-group">
                                <label for="idAlEditActividad">No. de Control del Alumno</label>
                                <input class="form-control" type="text" name="idaleditactiv" value="<?php echo $_SESSION['NControl_sti'];?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="idEditActividad">ID de la Actividad</label>
                                <input class="form-control" type="text" placeholder="Nombre" id="idEditActividad" name="ideditactiv" readonly>
                            </div>
                            <div class="form-group">
                                <label for="idEditActividad">Nombre de la Actividad</label>
                                <input class="form-control" type="text" placeholder="Nombre" id="nameEditActividad" name="nameeditactiv" disabled>
                            </div>
                            <div class="form-group">
                                <label for="descEditActividad">Descripción de la Actividad</label>
                                <input class="form-control" type="text" placeholder="Descripcion" id="descEditActividad" name="desceditactiv" disabled>
                            </div>
                            <div class="form-group">
                                <label>Archivo</label>
                                <input type="file" name="activity-file" id="activity-file" accept=".pdf">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit" >Enviar actividad</button>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-primary btn-block" id="btn-download" >Descargar formato</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <p>Advertencia: El formato admitido es pdf</p>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_FILES['activity-file'])){
            /* if ($_FILES['activity-file']['name'] != null){
                echo '<script>alert("Envio form con archivo");</script>';
            }*/
            require_once "./controladores/actividadesController.php";

            $ins_actividad= new actividadesController(); 

            echo $ins_actividad->agregar_entregaactividad_controlador(); 
            
        } 
    ?>

    <div class="register-photo">
        <div class="form-container" id="contain">
            <div class="col-md-12 search-table-col">
                <p id="tit-activities"><strong>ACTIVIDADES ASIGNADAS</strong></p>
                <?php
                    require_once './controladores/actividadesController.php';
                    $ins_actividad = new actividadesController();
                    $dat_info = $ins_actividad->consulta_actividades_controlador($_SESSION['NControl_sti']);
                    
                ?>

                <div class="table-responsive table-bordered table table-hover table-bordered results">
                    <table class="table table-striped table-bordered nowrap tablas">
                        <thead class="bg-primary bill-header cs">
                            <tr>
                                <th id="trs-hd" class="col-lg-1">Nombre de la Actividad</th>
                                <th id="trs-hd" class="col-lg-2">Descripcion</th>
                                <th id="trs-hd" class="col-lg-2">Semestre Limite</th>
                                <th id="trs-hd" class="col-lg-3">Estado<br></th>
                                <th id="trs-hd" class="col-lg-2">Fecha de entrega</th>
                                <th id="trs-hd" class="col-lg-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($dat_info as $row){
                                    $idact = $row['idActividades'];
                                    $name = $row['Nombre'];
                                    $desc = $row['Descripcion'];
                                    $sem = $row['Semestrerealizacion_sug'];
                                    $stat = $row['Estado'];
                                    $format = $row['URLFormato'];

                                    echo '
                                        <tr>
                                            <td>'. $name .'</td>
                                            <td>'. $desc .'</td>
                                            <td>'. $sem .'</td>
                                            <td>'. $stat .'</td>
                                            <td><center><i class="fa fa-remove"></i></center></td>
                                            <td><center><button class="btnEditarActividad" onclick="clickActividad('.$idact.')" data-toggle="modal" data-target="#modalEditarActividad" ><i class="fa fa-edit" style="font-size: 15px;"></i></button>
                                            <abbr title="Click para descargar el formato"><a class="btn" href="'.SERVERURL.$format.'"><i class="fa fa-download" style="font-size: 15px;"></i></a></abbr>
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
function clickActividad(idAct){
    var datos = new FormData();
    datos.append("idActividad",idAct);
    /* datos.append("ncontrol",<?php echo $_SESSION['NControl_sti'];?>); */

    $.ajax({
        url: "ajax/actividadAjax.php",
        method: "post",
        data: datos,
        cache: false,
        contentType: false,
        processData: false, 
        dataType: 'JSON',
        success: function(respuesta){
            
            console.log(respuesta);/**/ 
            $("#idEditActividad").val(respuesta[0][0]);
            $("#nameEditActividad").val(respuesta[0][1]);
            $("#descEditActividad").val(respuesta[0][2]);
            var elemento = document.getElementById("btn-download");
            elemento.href = '<?php echo SERVERURL;?>' + respuesta[0][3];
        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        console.log('error '+textStatus);
    });
}

</script>




