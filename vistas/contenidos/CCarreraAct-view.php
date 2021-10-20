
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

<div class="modal" id="modalEditarActividad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 890px;max-width: 870px;">
        <div class="modal-content" style="width: fit-content;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Envio de actividad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container" style=" display: flex;flex-direction: row;width: 890px;">
                    <embed id="activityfile-view" type="application/pdf" style="width: 500px;  height: auto; border: solid 2px gray; margin-right:20px;">
                    <form method="post" >

                        <div class="form-group">
                            <label for="idAlEditActividad">No. de Control del Alumno</label>
                            <input class="form-control" type="text" placeholder="No. Control" id="idAlEditActividad" name="idAlEditActividad" readonly>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" placeholder="idEditActividad" id="idEditActividad" name="idEditActividad" readonly>
                        </div>
                        <div class="form-group">
                            <label for="idEditActividad">Nombre del tutorado</label>
                            <input class="form-control" type="text" placeholder="Nombre tutorado" id="nameAlEditActividad" readonly>
                        </div>
                        <div class="form-group">
                            <label for="idEditActividad">Nombre de la Actividad</label>
                            <input class="form-control" type="text" placeholder="Nombre Actividad" id="nameAcEditActividad" readonly>
                        </div>
                        <div class="form-group">
                            <label for="descEditActividad">Fecha Entrega de Actividad</label>
                            <input class="form-control" type="text" placeholder="Fecha Entrega" id="fechaEditActividad" name="desceditactiv" readonly>
                        </div>
                        <div class="form-group">
                            <label for="calEditActividad">Valoración</label>
                            <select id="calEditActividad" name="caleditact">
                                <option value="">Seleccióne una valoración</option>
                                <option value="10">Excelente</option>
                                <option value="9">Buena</option>
                                <option value="8">Regular</option>
                                <option value="5">Muy escaso</option>
                                <option value="no-check">Rechazar Actividad</option>
                            </select>
                            <abbr title="La valoración es acorde a la puntuación de la actividad"><i class="fas fa-question-circle primary"></i></abbr>
                        </div>
                        <div class="form-group" style="font-size: 13px; font-family: 'Open Sans', sans-serif">
                            <label><b>Relación calificación kardex:</b></label><br>
                            <label>0 Materias NA (Excelentes)</label><br>
                            <label>1 Materias NA (Buena)</label><br>
                            <label>2-3 Materias NA (Regular)</label><br>
                            <label>4 Materias NA (Muy escaso)</label>
                        </div>

                        <div class="form-group">
                            <label for="commentEditActividad">Agregar un comentario</label>
                            <textarea id="commentEditActividad" name="commeditact" maxlength="150"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Enviar revisión</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" id="btn-download" style="color: white;" >Descargar actividad Entregada</a>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['caleditact'])){
        require_once './controladores/actividadesController.php';
        $ins_actividad = new actividadesController();
        echo $ins_actividad->actualizar_calif_controlador();
    }
?>

<div class="register-photo">
    <div class="container" id="contain">
        <div class="col-md-12 search-table-col">
            <h2 class="text-center"><strong>Actividades Entregadas</strong></h2>
            <br>
            <?php
                        require_once './controladores/usuarioController.php';
                        $matricula=$_SESSION['matricula_sti'];
                        $ins_consulta = new usuarioController();

                        $tamaño= count($pagina);
                       // echo 'la longitud del arreglo es: '.$tamaño;
                        $actividades=null;
                        if($tamaño>1){
                            $ncontrol = $pagina[1];
                            //Visualización de actividades de tutorados asig. como coordinador
                            $actividades = $ins_consulta->datos_usuario_controlador("Consulta","","SELECT aa.Estatus,a.Nombre AS Activity,DATE_FORMAT(aa.Fecha,'%d-%m-%y'),
                                CONCAT(p.Nombre,' ',p.APaterno,' ',p.AMaterno) AS Nombre, t.NControl, aa.Actividades_idActividades as idAct
                                FROM trabajador tr INNER JOIN carrera c ON c.Areas_idAreas = tr.Areas_idAreas INNER JOIN tutorado t ON t.Carrera_idCarrera = c.idCarrera
                                INNER JOIN persona p ON p.idPersona = t.Persona_idPersona INNER JOIN actividades_asignadas aa ON aa.Tutorado_NControl = t.NControl
                                INNER JOIN actividades a ON a.idActividades = aa.Actividades_idActividades
                                 WHERE tr.Matricula = $matricula AND t.NControl=$ncontrol");
                        }else{
                            // Visualización de actividades de tutorados asig. como tutor
                            $actividades = $ins_consulta->datos_usuario_controlador("Consulta","","SELECT aa.Estatus,a.Nombre AS Activity,DATE_FORMAT(aa.Fecha,'%d-%m-%y'),
                            CONCAT(p.Nombre,' ',p.APaterno,' ',p.AMaterno) AS Nombre, t.NControl, aa.Actividades_idActividades as idAct
                            FROM trabajador_tutorados tt 
                            INNER JOIN tutorado t ON t.NControl= tt.Tutorado_NControl
                            INNER JOIN persona p ON p.idPersona = t.Persona_idPersona INNER JOIN actividades_asignadas aa ON aa.Tutorado_NControl = t.NControl
                            INNER JOIN actividades a ON a.idActividades = aa.Actividades_idActividades
                            WHERE tt.Trabajador_Matricula=$matricula;");
                        }
                        $actividades = $actividades->fetchAll();
            $total_act=count($actividades);
            //echo "<script>alert('$total_act')</script>";
            $valida=false;
            for($i=0;$i<$total_act;$i++) {
                if ($actividades[$i][0] == "En espera"){
                    $valida=true;
                    break;
                }
            }

            $justify = $valida ? 'space-between' : 'center';
            $messages="<div id='register-options' class='form-container' style='justify-content:$justify; align-items: center;'>
                                    <div class='list-decorate-act'><ul style='list-style: none;'>
                                        <li><div class='alert-act'></div>Actividad rechazadas</li>
                                        <li><div class='validate-act'></div>Actividad validada</li>
                                    </ul></div>";

            if($valida){
                $messages .="<div style='background-color: red; color: white; width: 350px; padding: 10px; border: solid 2px black;'>
                                <p>Atención: se han detectado Actividades sin revisar</p>
                            </div>";
            }
            $messages .="</div>";
            echo $messages;
            ?>
            <table class="table table-bordered table-hover tablas">
                <thead class="bg-primary bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1"><br><strong>Estado</strong><br></th>
                        <th id="trs-hd" class="col-lg-2"><br><strong>Actividad</strong><br></th>
                        <th id="trs-hd" class="col-lg-3"><br><strong>Fecha/Entrega</strong><br></th>
                        <th id="trs-hd" class="col-lg-2"><br><br><strong>Nombre</strong><br></th>
                        <th id="trs-hd" class="col-lg-2"><br><br><strong>NControl</strong><br></th>
                        <th id="trs-hd" class="col-lg-2"><br><strong>Acciones</strong><br></th>
                    </tr>
                </thead>
                <tbody>
                <?php





                    //echo "<script>alert('$total_act')</script>";
                    for($i=0;$i<$total_act;$i++) {
                        $fila = '<tr>';
                        if($actividades[$i][0]=="Validado") $fila = '<tr class="validate-act">';
                        elseif($actividades[$i][0]=="Rechazado") $fila = '<tr class="warning-act">';
                        $fila .='
                        <td><center>'.$actividades[$i][0].'</center></td>
                        <td><center>'.$actividades[$i][1].'</center></td>
                        <td><center>'.$actividades[$i][2].'</center></td>
                        <td><center>'.$actividades[$i][3].'</center></td>
                        <td><center>'.$actividades[$i][4].'</center></td>                        
                        <td>';
                        if($actividades[$i][0]!="Validado" && $actividades[$i][0]!="Rechazado"){
                            $fila .=' <center><abbr title="Click para revisar actividad">
                            <button data-toggle="modal" data-target="#modalEditarActividad" onclick="clickActividad('.$actividades[$i][5].','.$actividades[$i][4].')"><i class="fa fa-edit" style="font-size: 15px;"></i>
                            </button></abbr></center>';
                        }
                         $fila .='</td>
                                </tr>';
                        echo $fila;

                    }
                ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
<script>
    var server='<?php echo SERVERURL;?>';
    function clickActividad(idAct, Ncontrol){
        //alert('IdACT:'+idAct+'   NC:'+Ncontrol)
        var datos = new FormData();
        datos.append("idActividad_tutor",idAct);
        datos.append("ncontrolActividad_tutor",Ncontrol);
        $.ajax({
            url: `${server}/ajax/actividadAjax.php`,
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(respuesta){
                if(respuesta.hasOwnProperty('Titulo')){

                }else {
                    $("#idAlEditActividad").val(respuesta[0]);
                    $("#idEditActividad").val(respuesta[1]);
                    $("#nameAlEditActividad").val(respuesta[2]);
                    $("#nameAcEditActividad").val(respuesta[3]);
                    $("#fechaEditActividad").val(respuesta[4]);
                    $("#btn-download").attr("href", server + respuesta[5]);
                    $("#btn-download").attr("download", respuesta[0]+'_'+respuesta[3]+'.pdf');
                    $('#activityfile-view').attr("src", server + respuesta[5]);
                }
            }
        })
    }

</script>
