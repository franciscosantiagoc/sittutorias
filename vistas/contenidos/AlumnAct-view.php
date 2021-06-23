
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
                        ...
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>

    <div class="register-photo">
        <div class="form-container" id="contain">
            <div class="col-md-12 search-table-col">
                <p id="tit-activities"><strong>ACTIVIDADES ASIGNADAS</strong></p>
                <!-- <div class="form-group pull-right col-lg-4">
                    <input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda">
                </div>
                <span class="counter pull-right"></span> -->
                <?php
                    require_once './controladores/actividadesController.php';
                    $ins_actividad = new actividadesController();
                    $dat_info = $ins_actividad->consulta_actividades_controlador($_SESSION['NControl_sti']);
                    
                ?>

                <div class="table-responsive table-bordered table table-hover table-bordered results">
                    <table class="table table-bordered table-hover tablas">
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

                                    echo '
                                        <tr>
                                            <td>'. $name .'</td>
                                            <td>'. $desc .'</td>
                                            <td>'. $sem .'</td>
                                            <td>'. $stat .'</td>
                                            <td><center><i class="fa fa-remove"></center></i></td>
                                            <td><center><a class="btnEditarActividad" idActividad="'.$idact.'" data-toggle="modal" data-target="#modalEditarActividad"><i class="fa fa-edit" style="font-size: 15px;"></i></a></center></td>
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
$(document).ready(function() {
    $(".btnAlEditarActividad").click(function(){
        var idAct = $(this).attr("idActividad");
        var nctrl = <?php echo $_SESSION['NControl_sti'];?>;
        console.log(idAct)

        /* var datos = new FormData();
        datos.append("idActividad",idActividad);
        datos.append("ncontrol",nctrl);

        $.ajax({
            url: "ajax/usuarioAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            /* dataType: "json", 
            success: function(respuesta){
                console.log(respuesta);
            }
        }); */
    })
})
</script>




