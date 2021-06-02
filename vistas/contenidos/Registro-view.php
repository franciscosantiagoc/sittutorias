<?php


/* if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] == "Tutorado"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
    }


} */
    /* if(roll==coordinadorA) 
        include "./vistas/inc/navCoordinadorC.php"; */ 
    /*elseif(roll==coordinadorC)
        include "inc/navCoordinadorC.php"; 
    */
    
?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<div class="register-photo">
    <div class="form-container">
        <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php"  method="POST" data-form="save" autocomplete="off">
            <img id="imgreg" src="vistas/assets/img/meeting.jpg">
            <h2 class="text-center"><strong>Crear Cuenta</strong></h2>
            <div class="form-group">
                <select id="select_user" class="form-control js-example-basic-single" name="select_user">
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
                    <option value="1">Hombre</option>
                    <option value="2">Mujer</option>
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
                <!-- <select class="form-control" name="carrera_reg">
                    <option selected="">Carrera</option>
                    
                </select> -->
                <div id="selectArEs"></div>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Numero de Control" name="no_ctrl_reg">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Registrar</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary btn-block">Importar csv</a>
            </div>
        </form>
    </div>
</div>

<div class="container-modal__regst">
    <div class="modal_reg_st">

        <div class="table-container col-md-12 search-table-col">
            <h2 class="text-center"><strong>Importar Alumnos</strong></h2>
            <form id="form_imp" action='#' enctype="multipart/form-data">
                <div class="form-group">
                    <select id="select_type_user" class="form-control">
                        <?php
                            if($_SESSION['roll_sti'] != "Admin"){
                                echo '<option value="14">Coordinadores Area</option>';
                            }else  if($_SESSION['15'] == "Coordinador De Area"){
                                echo'<option value="16">Coordinadores Carrera</option>';
                            }
                        ?>
                        <option value="17">Tutores</option>
                        <option value="18">Tutorados</option>                 
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg-10">
                        <input type="file"  id="file_input_st" class="form-control" name="file_import" accept=".csv,xlsx,.xls"/>
                    </div>
                    <div class="col-lg-2">
                        <input type="submit" name="btnsub" value="Cargar archivo">
                        <!-- <button class="btn-danger" onclick="loadExcel()">Cargar archivo</button> -->
                    </div>
                </div>
                
            </form>
            <div class="form-group contadores" id="cont__infodat">
            </div>
            <div class="form-group pull-right col-lg-4">
                <input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda" id="searchTerm" onkeyup="doSearch()">
            </div>
            <div class="table-responsive table-bordered table table-hover table-bordered results">
                <table class="table table-bordered table-hover" id="table_dat_es">
                    <thead class="bg-primary bill-header cs">
                        <tr>
                            <th id="trs-hd"><br><strong>No.</strong><br></th>
                            <th id="trs-hd"><br><strong>Nombre</strong><br></th>
                            <th id="trs-hd"><br><strong>Apellido Paterno</strong><br></th>
                            <th id="trs-hd"><br><strong>Apellido Materno</strong><br></th>
                            <th id="trs-hd"><br><strong>Sexo</strong><br></th>
                            <th id="trs-hd"><br><strong>N Control</strong><br></th>
                            <th id="trs-hd"><br>Carrera</th>
                            <th id="trs-hd"><br>Generación</th>
                            <th id="trs-hd"><br>Correo</th>
                            <th id="trs-hd"><br>Acciones</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
            <div class="form-group" id="div-regis">
                <button class="btn btn-primary" id="btn-regis" type="submit">Registrar</button>
                <button class="btn btn-primary" id="btn-regis" type="submit">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
   $('#file_input_st').on('change', function(){
        var ext = $( this ).val().split('.').pop();
        if ($( this ).val() != '') {
            if(ext == "xls" || ext == "xlsx" || ext == "csv"){
                Swal.fire("Exitoso","Archivo cargado: ." + ext+"","success");
            }else{
                $( this ).val('');
                Swal.fire("Advertencia","La extensión del archivo no esta permitida: ." + ext+"","error");
            }
        }
    }); 
    $(document).ready(function(){
        $("form").submit(function(event){
            event.preventDefault();
            /*alert ('submit detectado');
             if(excel===""){
                Swal.fire("Advertencia","Seleccione un documento para continuar","error");
            } */
            var formData = new FormData();
            var files = $('#file_input_st')[0].files[0];
            var select = $('#select_type_user').val();
            formData.append('archivoexcel',files);
            formData.append('type_us',select);
            $.ajax({
                url: '<?php echo SERVERURL; ?>ajax/usuarioAjax.php',
                type: 'post',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (resp){
                    
                    alert(resp);
                }
            });/**/
        });
    });

   /*  function loadExcel(){
        var exc= $('#file_input_st').val();
        if(excel===""){
            Swal.fire("Advertencia","Seleccione un documento para continuar","error");
        }
        var formData = new FormData();
        var files = $('#file_input_st')[0].files[0];
        formData.append('archivoexcel',files);
        alert('ajax a enviar');
        $.ajax({
            url: '<?php echo SERVERURL; ?>ajax/usuarioAjax.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (resp){
                alert(resp);
            }
        });
        return false;
    } */
</script>

<!-- <script src="<?php echo SERVERURL;?>vistas/assets/js/xlsx.js"></script>
<script language="JavaScript" src="<?php echo SERVERURL;?>vistas/assets/js/registrocsv.js"> 
</script>-->


<!-- <script type="text/javascript">
    $(document).ready(function(){
        reloadlist();
        $('#select_user').change(function(){
            reloadlist();
        });
    })
    </script>
    <script type="text/javascript">
        function reloadlist(){
            $.ajax({
                type:"POST",
                url: "registroAjax.php",
                data: "user=" + $('#select_user').val(),
                success:function(r){
                    $('#selectArEs').html(r);
                }
            });
        }
    </script> 
    <script> $(document).ready(function() {


        $('.js-example-basic-single').select2();
        console.log('select activado');
        /* listar_departamento(); */
});</script>-->