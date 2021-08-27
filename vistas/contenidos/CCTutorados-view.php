
    <?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador De Carrera" || $_SESSION['roll_sti'] != "Coordinador De Area"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }/* else  if($_SESSION['roll_sti'] == "Coordinador de Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        } */else  if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }
}
  
include "./vistas/inc/navCoordinadorC.php" 

?>
    <div class="modal" id="modalEditarCCTutorado" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <center><img src="" height="300px" id="ed_image"></center>
                            <div class="form-group">
                                <label for="idAlEditActividad">No. de Control del Alumno</label>
                                <input class="form-control" type="text" placeholder="No Control" name="Ed_noctrl" id="ed_noctrl" readonly>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="hidden" placeholder="Nombre" name="Ed_id_per" id="Ed_id_per" readonly>
                            </div>
                            <div class="form-group">
                                <label for="idEditActividad">Nombre</label>
                                <input class="form-control" type="text" placeholder="Nombre" name="Ed_nombre" id="ed_nombre" readonly>
                            </div>
                            <div class="form-group">
                                <label for="idEditActividad">Apellido Paterno</label>
                                <input class="form-control" type="text" placeholder="Apellido Paterno" id="ed_apellidoP" name="Ed_apellidoP" disabled>
                            </div>
                            <div class="form-group">
                                <label for="idEditActividad">Apellido Materno</label>
                                <input class="form-control" type="text" placeholder="Apellido Materno" id="ed_apellidoM" name="Ed_apellidoM" disabled>
                            </div>
                            <div class="form-group">
                                <label for="ed_email">Correo</label>
                                <input class="form-control" type="text" placeholder="Email" id="ed_email" name="Ed_email" disabled>
                            </div>
                            <div class="form-group">
                                <label for="ed_Sel_Carrera">Carrera</label>
                                <select id="ed_Sel_Carrera" name="Ed_Sel_Carrera" class="form-control">
                                    <?php
                                        require_once "./controladores/usuarioController.php";
                                        $ins_usuario = new usuarioController();
                                        $dat_info = $ins_usuario->datos_ta_controlador("idCarrera,Nombre","carrera",";");
                                        $dat_info=$dat_info->fetchAll(); 
                                        foreach($dat_info as $row){
                                            $id = $row['idCarrera'];
                                            $name_ca = $row['Nombre'];
                                            echo "<option value='$id'>$name_ca</option>";/**/ 
                                        }                                  
                                    ?>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="ed_Sel_generacion">Generación escolar</label>
                                <select id="ed_Sel_generacion" class="form-control">
                                    <?php
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
                                <button class="btn btn-primary btn-block" id="ed_button" >Actualizar información</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="register-photo">
        <div id="register-options" class="form-container">
             <a class="btn btn-primary" href="<?php echo SERVERURL;?>Registro">REGISTRAR</a >
             <a class="btn btn-primary" href="<?php echo SERVERURL;?>CCAsignTutorado">Asignar tutorado</a >
        </div>
        <div class="form-container" id="contain">
            <div class="col-md-12 search-table-col">
                <div class="intro">
                    <h2 class="text-center"><strong>Tutorados</strong></h2>
                </div>
                <?php
                require_once './controladores/tutoradosController.php';
                $ins_actividad = new tutoradosController();
                $dat_info = $ins_actividad->consulta_tutorados_controlador($_SESSION['matricula_sti']);
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
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $contador=1;
                        foreach ($dat_info as $rows){
                            echo '<tr class="text-center" >
                        <td>'.$contador.'</td>
                        <td>'.$rows['NControl'].'</td>
                        <td>'.$rows['Nombre'].'</td>
                        <td>'.$rows['APaterno'].'</td>
                        <td>'.$rows['AMaterno'].'</td>
                        <td>'.$rows['NTelefono'].'</td>
                        <td><center>
                            <button class="btnEditarActividad" onclick="clickTutorado('.$rows['NControl'].')" data-toggle="modal" data-target="#modalEditarCCTutorado" >
                                <i class="fa fa-edit" style="font-size: 15px;"></i>
                            </button>
                        </center></td>
                        
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
    function clickTutorado(noctrl){
        //alert('Click tutorado '+noctrl);
        var datos = new FormData();
        datos.append("idtutorado",noctrl);

        $.ajax({
            url: "ajax/usuarioAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false, 
            dataType: 'JSON',
            success: function(respuesta){
                if(respuesta.hasOwnProperty('Titulo')){
                    Swal.fire(resp.Titulo,resp.Texto,resp.Tipo);
                }else{             
                    $("#ed_noctrl").val(noctrl);
                    $("#ed_id_per").val(respuesta[0][0]);
                    $("#ed_nombre").val(respuesta[0][1]);
                    $("#ed_apellidoP").val(respuesta[0][2]);
                    $("#ed_apellidoM").val(respuesta[0][3]);
                    $("#ed_email").val(respuesta[0][4]);
                    var image = "<?php echo SERVERURL;?>";
                    image = image + respuesta[0][5];
                    $("#ed_image").attr("src",image);


                    $("#ed_Sel_Carrera option[value='"+respuesta[0][6]+"']").attr("selected",true);
                    $("#ed_Sel_generacion option[value='"+respuesta[0][7]+"']").attr("selected",true);
                }
            }
        }); 
    }
    $("#ed_button").click(function(e){
        e.preventDefault();
        var carr = $("#ed_Sel_Carrera").val();
        var gen = $("#ed_Sel_generacion").val();
        var ctrl = $("#ed_noctrl").val();
        var datos = new FormData();
        datos.append("ed_carr_tu",carr);
        datos.append("ed_gen_tu",gen);
        datos.append("ed_noctrl_tu",ctrl)
        Swal.fire({
            title: 'Advertencia',
            text: "Esta a punto de actualizar los datos del usuario ¿Desea continuar?",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                console.log('yes')
                $.ajax({
                    url: "ajax/usuarioAjax.php",
                    method: "post",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false, 
                    dataType: 'JSON',
                    success: function(respuesta){
                        //console.log(respuesta);
                        Swal.fire(respuesta.Titulo,respuesta.Texto,respuesta.Tipo);     
                    }
                });           
            }
        }) 
    })

</script>
