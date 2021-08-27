
<?php 
if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Docente"){
        if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }

}
include "./vistas/inc/navTutor.php"; 

?>
<div class="modal" id="modalVerTutorTutorados" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Informacion del Tutorado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <center><img src="" height="300px" id="ver_image"></center>
                        <div class="form-group">
                            <label for="id_Ver_Tutorado">No. de Control del Alumno</label>
                            <input class="form-control" type="text" placeholder="No Control" id="Ver_nctrl_tutdo" name="ver_noctrl_tutdo"  readonly>
                        </div>
                        <div class="form-group">
                            <label for="Nombre_Tut">Nombre</label>
                            <input class="form-control" type="text" placeholder="Nombre"  id="Ver_nombre_tutdo" name="ver_nombre_tutdo" readonly>
                        </div>
                        <div class="form-group">
                            <label for="apellidoP_Tut">Apellido Paterno</label>
                            <input class="form-control" type="text" placeholder="Apellido Paterno" id="Ver_apellidoP_tutdo" name="ver_apellidop_tutdo" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellidoM_Tut">Apellido Materno</label>
                            <input class="form-control" type="text" placeholder="Apellido Materno" id="Ver_apellidoM_tutdo" name="ver_apellidoM_tutdo" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tel_Tut">Teléfono</label>
                            <input class="form-control" type="text" placeholder="Teléfono" id="Ver_tel_tutdo" name="ver_email_tutdo" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email_Tut">Correo</label>
                            <input class="form-control" type="text" placeholder="Correo" id="Ver_email_tutdo" name="ver_email_tutdo" disabled>
                        </div>
                        <div class="form-group">
                            <label for="carrera_Tut">Carrera</label>
                            <input class="form-control" type="text" placeholder="Carrera" id="Ver_carrera_tutdo" name="ver_carrera_tutdo" disabled>
                        </div>

                        <div class="form-group">
                            <label for="generacion_Tut">Generación</label>
                            <input class="form-control" type="text" placeholder="Generación" id="Ver_generacion_tutdo" name="ver_generacion_tutdo" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modalDescargarLista" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Descargar lista de tutorados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="<?php echo SERVERURL;?>FormatTutorTutorado" method="post">
                        <div class="form-group">
                            <input type="hidden" name="format_tutortutorado_matricula" value="<?php echo $_SESSION['matricula_sti'];?>">
                        </div>
                        <div class="form-group">
                            <label for="ed_Sel_generacion">Generación escolar</label>
                            <select id="ed_Sel_generacion" class="form-control" name="format_tutortutorado_gener">

                                <option value="all">Todos</option>
                                <?php
                                require_once "./controladores/usuarioController.php";
                                $ins_usuario = new usuarioController();
                                $dat_info = $ins_usuario->datos_ta_controlador("idgeneracion, DATE_FORMAT(fecha_inicio,'%M %Y') as date_ini, DATE_FORMAT(fecha_fin,'%M %Y') as date_fin","generacion",";");
                                $dat_info=$dat_info->fetchAll();
                                foreach($dat_info as $row){
                                    /*$n=$dat_info->rowCount(); */
                                    $id = $row['idgeneracion'];
                                    $da_in = $row['date_ini'];
                                    $da_fn = $row['date_fin'];
                                    echo "<option value='$id'>$da_in-$da_fn</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Generar documento</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="register-photo">

    <div id="importcsvregis" class="form-container">
            <div class="form-container" id="contain">
                <div class="col-md-12 search-table-col">
                    <div class="intro">
                        <h2 class="text-center"><strong>Tutorados</strong></h2>
                    </div>
                    <div class="form-group pull-right col-lg-4">
                        <button class="btn btn-primary btn-block border rounded"  data-toggle="modal"  data-target="#modalDescargarLista" type="submit" >DESCARGAR LISTA DE TUTORADOS</button>
                    </div>

                    <?php
                    require_once './controladores/tutoradosController.php';
                    $ins_actividad = new tutoradosController();
                    $dat_info = $ins_actividad->consulta_tutorados_controlador($_SESSION['matricula_sti']);
                    echo 'Matricula: '.$_SESSION['matricula_sti'];
                    var_dump($dat_info);
                    ?>
                    <div class="table-responsive table-bordered table  ">
                        <table class="table table-bordered table-hover tablas">
                            <thead class="bg-primary bill-header cs">
                            <tr class="text-center roboto-medium">
                                <th>#</th>
                                <th>NCONTROL</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO PATERNO</th>
                                <th>APELLIDO MATERNO</th>
                                <th>TELEFONO</th>
                                <th>CARRERA</th>
                                <th>GENERACIÓN ESCOLAR</th>
                                <th>FECHA ASIGNADA</th>
                                <th>ACCIONES</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $contador=1;
                            foreach ($dat_info as $rows){

//                                echo '<tr class="text-center" >
//                                        <td>'.$contador.'</td>
//                                        <td>'.$rows['NControl'].'</td>
//                                        <td>'.$rows['Nombre'].'</td>
//                                        <td>'.$rows['APaterno'].'</td>
//                                        <td>'.$rows['AMaterno'].'</td>
//                                        <td>'.$rows['NTelefono'].'</td>
//                                        <td>'.$rows['NombreCar'].'</td>
//                                        <td>'.$rows['gener'].'</td>
//                                        <td>'.$rows['fecha_asig'].'</td>
//                                        <td><center>
//                                            <abbr title="Ver información"><button class="btnVerTutor" onclick="clickVerTutorado('.$rows['NControl'].')" data-toggle="modal" data-target="#modalVerTutorTutorados" >
//                                                <i class="fas fa-eye" style="font-size: 15px;"></i>
//                                            </button></abbr>
//                                        </center></td>
//
//                                      </tr>';
                                $contador++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>
</div>
<script type="text/javascript">
    function clickVerTutorado(noctrl){
        var datos = new FormData();
        datos.append("idtutorado_ver",noctrl);
        $imagenPrevisualizacion = document.querySelector("#ver_image");


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
                $("#Ver_nctrl_tutdo").val(respuesta[0][0]);
                $("#Ver_nombre_tutdo").val(respuesta[0][1]);
                $("#Ver_apellidoP_tutdo").val(respuesta[0][2]);
                $("#Ver_apellidoM_tutdo").val(respuesta[0][3]);
                $("#Ver_tel_tutdo").val(respuesta[0][4]);
                $("#Ver_email_tutdo").val(respuesta[0][5]);
                $("#Ver_carrera_tutdo").val(respuesta[0][6]);
                $("#Ver_generacion_tutdo").val(respuesta[0][7]);

                var image = "<?php echo SERVERURL;?>";
                image = image + respuesta[0][8];
                $imagenPrevisualizacion.src = image;
                console.log("imagen coord:"+image);
                //$("#ed_image").attr("src",image);

            }
        });

    }


</script>
