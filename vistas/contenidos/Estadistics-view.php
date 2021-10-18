
<?php 

if(isset($_SESSION['roll_sti'])){
    //if($_SESSION['roll_sti'] != "Coordinador De Carrera" && $_SESSION['roll_sti'] != "Coordinador De Area"){
    if($_SESSION['roll_sti'] == "Docente"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
    }else    if($_SESSION['roll_sti'] == "Tutorado"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
    }else  if($_SESSION['roll_sti'] == "Admin"){
        include "./vistas/inc/navRoot.php";
    }if($_SESSION['roll_sti'] == "Coordinador de Area"){
        include "./vistas/inc/navCoordinadorA.php";
    }else if($_SESSION['roll_sti'] == "Coordinador de Carrera"){
        include "./vistas/inc/navCoordinadorC.php";
    }
    //}
}
  

?>


    <div class="register-photo">
        <div id="importcsvregis" class="form-container">
            <form id="regisTutcsv" method="post">
                <h2 class="text-center"><strong>Estadísticos</strong></h2>
                <div class="full-box tile-container">

                    <?php 
                        require_once "./controladores/usuarioController.php";
                        $ins_usuario = new usuarioController();
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","trabajador",";");
                    ?>
                    <div class="tile">
                        <div class="tile-tittle">Trabajadores</div>
                        <div class="tile-icon">
                            <i class="fas fa-chalkboard-teacher fa-fw"></i>
                            <p><?php
                             echo $total_usuarios->rowCount(); ?> Registrados</p>
                        </div>
                    </div>
                    <?php
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","trabajador"," WHERE Roll='Coordinador De Area';");
                    ?>
                    <div  class="tile">
                        <div class="tile-tittle">CoordinadoresA</div>
                        <div class="tile-icon">
                            <i class="fas fa-users-cog fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
                        </div>
                    </div>

                    <?php
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","trabajador"," WHERE Roll='Coordinador De Carrera';");
                    ?>
                    <div class="tile">
                        <div class="tile-tittle">CoordinadoresC</div>
                        <div class="tile-icon">
                            <i class="fas fa-users fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
                        </div>
                    </div>


                    <?php
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","trabajador"," WHERE Roll='Docente';");
                    ?>

                    <div class="tile">
                        <div class="tile-tittle">Tutores</div>
                        <div class="tile-icon">
                            <i class="fas fa-chalkboard-teacher fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
                        </div>
                    </div>

                    <?php
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","tutorado",";");
                    ?>
                    
                    <div class="tile">
                        <div class="tile-tittle">Alumnos</div>
                        <div class="tile-icon">
                            <i class="fas fa-user-graduate fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
                        </div>
                    </div>

                    <?php
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","actividades",";");
                    ?>                    
                    <div class="tile">
                        <div class="tile-tittle">Actividades</div>
                        <div class="tile-icon">
                            <i class="fas fa-tasks fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registradas</p>
                            
                        </div>
                    </div>

                </div>

                
                <div class="form-group">
                    <label>Seleccione Tipo de Gráfica</label>
                    <select id="selec_type" class="form-control">
                        <option value="bar" selected="">Barras</option>
                        <option value="line">Linea</option>
                        <!-- <option value="pie">Pastel</option> -->
                    </select>

                    <label>Seleccione Dato a Graficar</label>
                    <select id="selec_data" class="form-control">
                        <!-- <option value="10">Actividades</option> -->
                        <option value="Alumnos" selected="">Alta de Alumnos</option>
                        <option value="Riesgo">Riesgo de deserción</option>
                    </select>


                   <!--  <label>Seleccione Carrera</label>
                    <select class="form-control">
                        <option value="" selected="">Carrera</option>
                        <option value="all">Todo</option>
                        <?php
                            /* $dat_info = $ins_usuario->datos_ta_controlador("idCarrera,Nombre","carrera",";");
                            $dat_info=$dat_info->fetchAll(); 
                            foreach($dat_info as $row){
                                /*$n=$dat_info->rowCount(); 
                                $id = $row['idCarrera'];
                                $name_ca = $row['Nombre'];
                                echo "<option value='$id'>$name_ca</option>";
                            }  */                                 
                        ?>
                    </select> -->

                    <label id="lbl_selec_period">Periodo escolar</label>
                    
                    <select id="selec_period" class="form-control">
                        <option value="all" selected="">Todos</option>
                        <?php
                            $dat_info = $ins_usuario->datos_ta_controlador("idgeneracion, DATE_FORMAT(fecha_inicio,'%M %Y') as date_ini, DATE_FORMAT(fecha_fin,'%M %Y') as date_fin","generacion",";");
                              $dat_info=$dat_info->fetchAll(); 
                            foreach($dat_info as $row){
                                $id = $row['idgeneracion'];
                                $da_in = $row['date_ini'];
                                $da_fn = $row['date_fin'];
                                echo "<option value='$id'>$da_in-$da_fn</option>";
                            }                                  
                        ?>
                    </select>
                    <label id="lbl_selec_sex">Seleccione el tipo de Sexo</label>
                    <select id="selec_sex" class="form-control">
                        <option value="M">Hombres</option>
                        <option value="F">Mujeres</option>
                        <option value="all" selected="">Todos</option>
                    </select>

                    <label id="lbl_selec_sem" style="display:none;">Seleccione el Semestre</label>
                    <select id="selec_sem" class="form-control" style="display:none;" name="selec_sem">
                        <?php
                            for($i=1;$i<9;$i++){
                                echo "<option value='$i'>$i ° Semestre</option>";
                            }
                            
                        ?>
                    </select>

                    <label id="lbl_selec_nperiod" style="display:none;">Seleccione la cantidad de periodos</label>
                    <select id="selec_nperiod" class="form-control" style="display:none;" name="selec_nperiod">
                        <option value="4">Ultimos 4 periodos</option>
                        <option value="8">Ultimos 8 periodos</option>
                        <option value="12">Ultimos 12 periodos</option>
                        <option value="16">Ultimos 16 periodos</option>
                       
                    </select> 
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="button" id="make_graphics" >Generar grafica</button></div>
            </form>

        </div>


        <div id="cont-visdat" class="form-container">
            <canvas id="my_graphics" style="position: relative; height: 400px; width: 800vw;"></canvas>
            <!-- <form method="post"><img class="border rounded-0 border-primary" id="imgreg" src="./vistas/assets/img/grafica.jpg">
                <div class="form-group" id="div-tipografia"><label>GRAFICA TIPO : PERIODO : SEXO : SITUACION</label></div>
            </form> -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let myChart;
        var ctx = document.getElementById('my_graphics');
        grafica('bar', 'Alumnos', 'all', 'all');
        $("#make_graphics").on("click",function(event){
            event.preventDefault();
            let g_type = $('#selec_type').val();
            let g_data = $('#selec_data').val();
            let g_period = $('#selec_period').val();
            let g_sex = $('#selec_sex').val();

            let g_nperiod = $('#selec_nperiod').val();
            let g_sem = $('#selec_sem').val();
               
            /* alert('formulario enviado' +g_type + ' ' + g_data + ' '+ g_period + ' ' + g_sex ); */
            grafica(g_type,g_data,g_period,g_sex,g_nperiod,g_sem)
            // resto de tu codigo
        });
      
       
        function grafica(dtipo, ddata, dperiodo, dsexo,dnperiod,dsem){
            var formData = new FormData();
            formData.append('g_type',dtipo);
            formData.append('g_data',ddata);
            formData.append('g_period',dperiodo);
            formData.append('g_sex',dsexo);
            formData.append('g_nperiod',dnperiod);//limitacion de periodos
            formData.append('g_sem',dsem);
            $.ajax({
                url: '<?php echo SERVERURL; ?>ajax/estadisticsAjax.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
               dataType: 'JSON',   /**/
                success: function (resp){
                     /*console.log(resp)*/
                    var etiquetas=[];
                    var dat_g=[];
                    for(var prop in resp){
                        let et = resp[prop]['gen'];
                        if(et=='F')et='Mujeres';
                        if(et=='M')et='Hombres';
                        etiquetas.push(et);
                        dat_g.push(resp[prop]['conteo']);

                    }


                    var datosgraf = {
                    label: "Graficación de datos de "+ddata,
                    data: dat_g,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
                    borderWidth: 1,// Ancho del borde
                    };

                    if (myChart) {
                        myChart.destroy();
                    }
                    myChart =new Chart(ctx, {
                        type: dtipo,// Tipo de gráfica
                        data: {
                            labels: etiquetas,
                            datasets: [
                                datosgraf
                                // Aquí más datos...
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    }); 


                }
            });

        }

        const selectData = document.querySelector('#selec_data');

        selectData.addEventListener('change', (event) => {
            if(event.target.value==='Riesgo'){
                $('#lbl_selec_period').css("display", "none");
                $('#selec_period').css("display", "none");
                $('#lbl_selec_sex').css("display", "none");
                $('#selec_sex').css("display", "none");
                $('#lbl_selec_sem').css("display", "block");
                $('#selec_sem').css("display", "block");
                $('#lbl_selec_nperiod').css("display", "block");
                $('#selec_nperiod').css("display", "block");
                
            }else{
                $('#lbl_selec_period').css("display", "block");
                $('#selec_period').css("display", "block");
                $('#lbl_selec_sex').css("display", "block");
                $('#selec_sex').css("display", "block");

                $('#lbl_selec_sem').css("display", "none");
                $('#selec_sem').css("display", "none");
                $('#lbl_selec_nperiod').css("display", "none");
                $('#selec_nperiod').css("display", "none");
            }
        });
    </script>
  
   