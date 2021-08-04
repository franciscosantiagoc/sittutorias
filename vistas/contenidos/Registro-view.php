<?php


if(isset($_SESSION['roll_sti'])){
    //if($_SESSION['roll_sti'] != "Coordinador De Carrera" && $_SESSION['roll_sti'] != "Coordinador De Area"){
    if($_SESSION['roll_sti'] == "Docente"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
    }else    if($_SESSION['roll_sti'] == "Tutorado"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
    }else  if($_SESSION['roll_sti'] == "Admin"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
    }if($_SESSION['roll_sti'] == "Coordinador De Area"){
        include "./vistas/inc/navCoordinadorA.php";
    }else if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
        include "./vistas/inc/navCoordinadorC.php";
    }
    //}
}
    
?>



<div class="modal" id="modalregistro" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style = "width: 900px; max-width:800px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Envio de actividad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <h2 class="text-center"><strong>Importar Alumnos</strong></h2>
                        <form id="form_imp" action='#' enctype="multipart/form-data">
                            <div class="form-group">
                                <select id="Mselect_user" class="form-control js-example-basic-single" name="Mselect_usertype" onchange="ShowCarAr(this.value,2)">
                                    <option value="0" selected="">Seleccione el tipo de usuario a registrar</option>
                                    <?php            
                                        if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
                                        echo '<option value="15">Tutor</option>
                                                <option value="16">Tutorado</option> ';
                                        }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
                                            echo '<option value="14">Coordinador de Carrera</option>
                                                <option value="15">Tutor</option>
                                                <option value="16">Tutorado</option> 
                                                ';
                                        }else  if($_SESSION['roll_sti'] == "Admin"){
                                            echo '<option value="13">Coordinador de Area</option>
                                                <option value="14">Coordinador de Carrera</option>
                                                <option value="15">Tutor</option>
                                                <option value="16">Tutorado</option> 
                                                ';
                                        }
                                    ?>     
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="MSel_CarrA" class="form-control" name="Mcarrera_reg">
                                    <option selected="" value="">Carrera</option>
                                </select>
                            </div>
                            <div class="form-group" id="id_GenM">
                                <select class="form-control" id="gen_regM" name="gen_regM">
                                    <option selected="" value="">Seleccione la Generación</option>
                                    <?php
                                    require_once './controladores/usuarioController.php';
                                    $ins_usuario = new usuarioController();
                                    $dat_info =$ins_usuario->datos_ta_controlador("idgeneracion, DATE_FORMAT(fecha_inicio,'%M %Y') as date_ini, DATE_FORMAT(fecha_fin,'%M %Y') as date_fin","generacion",";");
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
                            <div class="row">
                                <div class="col-lg-10">
                                    <input type="file"  id="file_input_st" class="form-control" name="file_import" accept=".xls"/>
                                </div>
                                <div class="col-lg-2">
                                    <!-- <input type="submit" name="btnsub" value="Cargar archivo"> -->
                                    <abbr title="Click para descargar el formato"><a class="btn" href="<?php echo SERVERURL;?>directory/formats/Formato_Multiregistro.xlsx">Formato<i class="fa fa-download" style="font-size: 15px;"></i></a></abbr>
                                    <!-- <button class="btn-danger" onclick="loadExcel()">Cargar archivo</button> -->
                                </div>
                            </div>
                            
                        </form>
                        
                        <div class="table-bordered table table-hover table-bordered results" id="content-result" style="overflow: scroll;">
                            <table id="table_dat" class="table table-striped table-bordered nowrap tablas">
                                <thead class="bg-primary bill-header cs">
                                    <tr>
                                        <!-- <th id="trs-hd"><br><strong>No.</strong><br></th> -->
                                        <th id="trs-hd"><br><strong>Nombre</strong><br></th>
                                        <th id="trs-hd"><br><strong>Apellido Paterno</strong><br></th>
                                        <th id="trs-hd"><br><strong>Apellido Materno</strong><br></th>
                                        <th id="trs-hd"><br><strong>Sexo</strong><br></th>
                                        <th id="trs-hd"><br><strong>N Control</strong><br></th>
                                        <!-- <th id="trs-hd"><br>Generación</th> -->
                                        <th id="trs-hd"><br>Correo</th>
                                         <th id="trs-hd"><br>Acciones</th> <!---->
                                    </tr>
                                </thead>
                                <tbody id="table_dat_es"></tbody>
                                
                            </table>
                        </div>
                        <div class="form-group" id="div-regis">
                            <button class="btn btn-primary" id="btn-regis">Registrar</button>
                            <a class="btn btn-primary"  id="btn-cancel" href="<?php echo SERVERURL;?>Registro">Cancelar</a>
                        </div>       

                    </div>
                </div>
                <div class="modal-footer">
                    <p>Advertencia: El formato admitido es xls</p>
                </div>
            </div>
        </div>
    </div>


<div class="register-photo">
    <div class="form-container">
        <!--<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php"  method="POST" data-form="save" autocomplete="off">-->
         <form action=""  method="post" autocomplete="off">
            <img id="imgreg" src="vistas/assets/img/meeting.jpg">
            <h2 class="text-center"><strong>Crear Cuenta</strong></h2>
            <div class="form-group">
                <select id="select_user" class="form-control js-example-basic-single" name="select_usertype" onchange="ShowCarAr(this.value,1)">
                    <option value="0" selected="">Seleccione el tipo de usuario a registrar</option>
                    <?php            
                        if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
                          echo '<option value="15">Tutor</option>
                                <option value="16">Tutorado</option> ';
                        }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
                             echo '<option value="14">Coordinador de Carrera</option>
                                   <option value="15">Tutor</option>
                                   <option value="16">Tutorado</option> 
                                   ';
                        }else  if($_SESSION['roll_sti'] == "Admin"){
                            echo '<option value="13">Coordinador de Area</option>
                                  <option value="14">Coordinador de Carrera</option>
                                  <option value="15">Tutor</option>
                                  <option value="16">Tutorado</option> 
                                   ';
                        }
                    ?>     
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Nombre" name="name_reg" >
            </div>
            <div class="form-group">
                <input class="form-control" type="text"  placeholder="Apellido Paterno" name="apellidop_reg">
            </div>
            <div class="form-group">
                <input class="form-control" type="text"  placeholder="Apellido Materno" name="apellidom_reg">
            </div>
            <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input class="form-control" name="fecha_reg" type="date">
            </div> 
            <div class="form-group">
                <select class="form-control" name="sexo_reg">
                    <option value="" selected="">Sexo</option>
                    <option value="M">Hombre</option>
                    <option value="F">Mujer</option>
                </select>
            </div>
            <div class="form-group">    
                <input class="form-control" type="tel" placeholder="Número de Telefono" name="numero_tel_reg">
            </div>
            <div class="form-group">
                <input class="form-control" type="text"  placeholder="Dirección" name="direccion_reg">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" placeholder="Email" name="email_reg">
            </div>
            <div class="form-group">
                <select id="Sel_CarrA" class="form-control" name="carrera_reg">
                    <option selected="" value="">Carrera</option>              
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Numero de Control" name="no_ctrl_reg">
            </div>
            <div class="form-group" id="id_Gen">
                <select class="form-control" id="gen_reg" name="gen_reg">
                    <option selected="" value="">Seleccione la Generación</option>
                    <?php
                    require_once './controladores/usuarioController.php';
                    $ins_usuario = new usuarioController();
                    $dat_info =$ins_usuario->datos_ta_controlador("idgeneracion, DATE_FORMAT(fecha_inicio,'%M %Y') as date_ini, DATE_FORMAT(fecha_fin,'%M %Y') as date_fin","generacion",";");
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
                <button class="btn btn-primary btn-block" type="submit">Registrar</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalregistro" >Importar csv</a>
            </div>
        </form>
    </div>
</div>
<?php
       if(isset($_POST['name_reg'])){
            /*echo 'Envio detectado';*/
             require_once "./controladores/usuarioController.php";

            $ins_usuario= new usuarioController(); 

            echo $ins_usuario->registro_usuario_controlador();
        }  
    ?>



<script type="text/javascript">
    function ShowCarAr(x,opt){
        // console.log("select tipo");  
        var userType = document.getElementById("select_user").value=x;
        var dataus = 'selectCarReg='+userType;
        const sel = document.querySelector("#Sel_CarrA");
        const sel2 = document.querySelector("#MSel_CarrA");
        $.ajax({
                url: '<?php echo SERVERURL; ?>ajax/usuarioAjax.php',
                type: 'post',
                data: dataus,
                success: function (resp){
                    /*alert(resp);*/ 
                    if(opt===1){
                        sel.innerHTML =resp;
                        if(userType=='16'){
                            document.getElementById("id_Gen").style.display = "block";
                            $("#gen_reg option[value='']").attr("selected",false);
                        }else{
                            document.getElementById("id_Gen").style.display = "none";
                            $("#gen_reg option[value='']").attr("selected",true);
                        }
                    }else {
                        sel2.innerHTML = resp;

                        if(userType=='16'){
                            document.getElementById("id_GenM").style.display = "block";
                            $("#gen_regM option[value='']").attr("selected",false);
                        }else{
                            document.getElementById("id_GenM").style.display = "none";
                            $("#gen_regM option[value='']").attr("selected",true);
                        }
                    }
                }
        });   
    }



</script>
    


<script src="<?php echo SERVERURL;?>vistas/assets/js/xlsx.js"></script>
<script language="JavaScript" src="<?php echo SERVERURL;?>vistas/assets/js/registrocsv.js"> 
</script>
