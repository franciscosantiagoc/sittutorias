
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
            require_once "./controladores/actividadesController.php";

            $ins_actividad= new actividadesController(); 

            echo $ins_actividad->agregar_entregaactividad_controlador(); 
            
        } 
    ?>

    <div class="container">
        <div class="row" id="contain">
            <div class="col-lg-12">
                <p id="tit-activities"><strong>ACTIVIDADES ASIGNADAS</strong></p>
                <?php
                    require_once './controladores/actividadesController.php';
                    require_once './controladores/usuarioController.php';
                    $ins_actividad = new usuarioController();
                    $ncontrol=$_SESSION['NControl_sti'];

                    $dat_info = $ins_actividad->datos_usuario_controlador("Consulta","","SELECT FLOOR(TIMESTAMPDIFF(MONTH, g.fecha_inicio, CURDATE())/6) AS semester FROM tutorado t, generacion g WHERE g.idGeneracion=t.Generacion_idGeneracion AND t.NControl=$ncontrol");
                    $dat_info = $dat_info->fetch();
                    $semetre = (int)$dat_info['semester'];


                    $ins_actividad = new actividadesController();
                    $dat_info = $ins_actividad->consulta_actividades_controlador($ncontrol);

                    $valida=false;
                    foreach($dat_info as $row){
                        $isObligatorio = $row['Obligatorio'];
                        $sem = (int) $row['Semestrerealizacion_sug'];
                        $stat = $row['Estado'];
                        if($isObligatorio=='1' && $semetre > $sem && $stat=='No entregado'){
                            $valida=true;
                            break;
                        }
                    }
                    $justify = $valida ? 'space-between' : 'center';
                    $messages="<div id='register-options' class='form-container' style='justify-content:$justify; align-items: center;'>
                                    <div class='list-decorate-act'><ul style='list-style: none;'>
                                        <li><div class='alert-act'></div>Actividad obligatoria</li>
                                        <li><div class='warning-act'></div>Actividad Atrasada</li>
                                        <li><div class='deliver-act'></div>Actividad entregada</li>
                                        <li><div class='validate-act'></div>Actividad validada o concluida</li>
                                    </ul></div>";

                    if($valida){
                        $messages .="
                                
                                    <div style='background-color: red; color: white; width: 350px; padding: 10px; border: solid 2px black;'>
                                        <p>Atención: se han detectado Actividades importantes a entregar</p>
                                    </div>";
                    }
                    $messages .="</div>";
                    echo $messages;


                    
                ?>

                <!-- <div class="table-responsive table-bordered table table-hover table-bordered results"> -->
                    <table class="table table-bordered  display nowrap tablas">
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
                                    $sem =(int) $row['Semestrerealizacion_sug'];
                                    $stat = $row['Estado'];
                                    $format = $row['URLFormato'];
                                    $fecha_e = $row['Fecha'];

                                    $isObligatorio = $row['Obligatorio'];
                                    //echo "$sem $semetre $isObligatorio </br>";
                                    if($isObligatorio!='1' || ($isObligatorio=='1' &&   $semetre >= $sem)){
                                        $fila="<tr>";
                                        if($semetre-$sem>1 && $isObligatorio=='0'&& $stat=='No entregado')  $fila="<tr class='warning-act'>";
                                        elseif($semetre-$sem>1 && $isObligatorio=='1' && $stat=='No entregado') $fila="<tr class='alert-act'>";
                                        elseif($stat=='Validado')  $fila="<tr class='validate-act'>";
                                        elseif($stat=='En espera')  $fila="<tr class='deliver-act'>";
                                        $fila .= "
                                           
                                                <td>$name</td>
                                                <td>$desc</td>
                                                <td>$sem</td>
                                                <td>$stat</td>
                                                <td><center>$fecha_e</center></td>
                                                <td><center>";
                                        if($stat!='Validado') $fila .='<abbr title="Click para editar la actividad"><button class="btnEditarActividad" onclick="clickActividad('.$idact.')" data-toggle="modal" data-target="#modalEditarActividad" ><i class="fa fa-edit" style="font-size: 15px;"></i></button></abbr>';

                                        $fila .= '<abbr title="Click para descargar el formato"><a class="btn" href="'.SERVERURL.$format.'" download="'.$name.'.pdf"><i class="fa fa-download"    style="font-size: 15px;"></i></a></abbr>
                                                </center></td>
                                            </tr>';
                                        echo $fila;
                                    }
                                }
                            ?>
                            
                        </tbody>
                    </table>
                <!-- </div> -->
            </div>
        </div>
    </div>



<script type="text/javascript">
$('#activity-file').on('change', function(e){
    var ext = $( this ).val().split('.').pop();
    if ($( this ).val() != '') {
        if(ext == "pdf" /*|| ext == "csv"  || ext == "xlsx" */){
            Swal.fire("Exitoso","Archivo cargado: ." + ext+"","success");
        }else{
            $( this ).val('');
            Swal.fire("Advertencia","La extensión del archivo no esta permitida: ." + ext+"","error");
        }
    }
}); 



function clickActividad(idAct){
    var datos = new FormData();
    datos.append("idActividad",idAct);
    $.ajax({
        url: "ajax/actividadAjax.php",
        method: "post",
        data: datos,
        cache: false,
        contentType: false,
        processData: false, 
        dataType: 'JSON',
        success: function(respuesta){
            $("#idEditActividad").val(respuesta[0][0]);
            $("#nameEditActividad").val(respuesta[0][1]);
            $("#descEditActividad").val(respuesta[0][2]);
            var elemento = document.getElementById("btn-download");
            elemento.href = '<?php echo SERVERURL;?>' + respuesta[0][3];
        }
    });
}

</script>




