<?php


/* if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] == "Tutorado"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
    }


} */
    /* if(roll==coordinadorA) */ 
        include "./vistas/inc/navCoordinadorC.php"; 
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
                <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Nombre" name="name_reg" required="">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Apellido Paterno" name="apellidop_reg" required="">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Apellido Materno" name="apellidom_reg" required="">
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
                <input class="form-control" type="tel" pattern="[0-9()+]{8,20}" placeholder="Número de Telefono" name="numero_tel_reg">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" placeholder="Dirección" name="direccion_reg" required="">
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
                <input class="form-control" type="text" pattern="[0-9-]{8,10}" placeholder="Numero de Control" name="no_ctrl_reg" required="">
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
            <div class="form-group">
                <input type="file"  id="file_input_st" class="form-control" />
            </div>
            <div class="form-group contadores" wfd-id="12">
                <span>Registros: 100</span>
                <span class="error">Errores: 10</span>
            </div>
            <div class="form-group pull-right col-lg-4">
                <input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda">
            </div>
            <span class="counter pull-right"></span>
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

<script src="<?php echo SERVERURL;?>vistas/assets/js/xlsx.js"></script>
<script language="JavaScript">
    var C_Error=0;
    var oFileIn;
    //Código JQuery
    $(function() {
        oFileIn = document.getElementById('file_input_st');
        if (oFileIn.addEventListener) {
            oFileIn.addEventListener('change', filePicked, false);
        }
    });

    //Método que hace el proceso de importar excel a html
    function filePicked(oEvent) {
        // Obtener el archivo del input
        var oFile = oEvent.target.files[0];
        var sFilename = oFile.name;
        // Crear un Archivo de Lectura HTML5
        var reader = new FileReader();

        // Leyendo los eventos cuando el archivo ha sido seleccionado
        reader.onload = function(e) {
            var data = e.target.result;
            var cfb = XLS.CFB.read(data, {
                type: 'binary'
            });
            var wb = XLS.parse_xlscfb(cfb);
            // Iterando sobre cada sheet
            wb.SheetNames.forEach(function(sheetName) {
                // Obtener la fila actual como CSV
                var sCSV = XLS.utils.make_csv(wb.Sheets[sheetName]);
                var data = XLS.utils.sheet_to_json(wb.Sheets[sheetName], {
                    header: 1
                });
                var cont=1;//contador filas
                var contE=0;//Contador de errores
                var N_Cont=[];
                var erro=false;
                $.each(data, function(indexR, valueR) {
                    if(cont!=1){
                        var conc=1;
                        var headRow="<tr class='correct'>";
                        var sRow = "<td>"+(cont-1)+"</td>";
                        $.each(data[indexR], function(indexC, valueC) {
                            sRow = sRow + "<td>" + valueC + "</td>";
                            if(conc==5){
                                for (var i=0;i<N_Cont.length; i++){
                                    if(N_Cont[i]==valueC){
                                        headRow="<tr class='error'>";
                                        erro=true;
                                        break;
                                    }
                                }
                                N_Cont.push(valueC);
                                /* console.log(cont+" N_control "+valueC); */
                            }
                            conc +=1;
                            if(erro==true)
                                contE +=1;
                        });
                        sRow = headRow + " " + sRow + "</tr>";
                        $("#table_dat_es").append(sRow);
                    }
                    cont +=1;
                });
                C_Error = contE;
                alert('cantidad de filas: '+cont-1)
            });
            /* $("#imgImport"). css("display", "none"); */
        };


        // Llamar al JS Para empezar a leer el archivo .. Se podría retrasar esto si se desea
        reader.readAsBinaryString(oFile);
    }
</script>


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