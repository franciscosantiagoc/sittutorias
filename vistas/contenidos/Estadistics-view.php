
<?php 

/* if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador De Carrera"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        }else  if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }
} */
  
 include "./vistas/inc/navCoordinadorC.php"  /**/

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
                        <option value="" selected="">Tipo de Grafica</option>
                        <option value="Bar">Barras</option>
                        <option value="Line">Linea</option>
                        <!-- <option value="12">Pastel</option> -->
                    </select>

                    <label>Seleccione Dato a Graficar</label>
                    <select id="selec_data" class="form-control">
                        <option value="" selected="">Dato a Graficar</option>
                        <!-- <option value="10">Actividades</option> -->
                        <option value="Alumnos">Alumnos</option>
                        <option value="Bajas">Bajas</option>
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

                    <label>Seleccione Periodo escolar</label>
                    
                    <select id="selec_period" class="form-control">
                        <option value="" selected="" id="sel_per">Periodo</option>
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
                    <label>Seleccione el tipo de Sexo</label>
                    <select id="selec_sex" class="form-control">
                        <option value="" selected="">Genero</option>
                        <option value="M">Hombres</option>
                        <option value="F">Mujeres</option>
                        <option value="all">Ambos</option>
                    </select>
                    <!--<label>Seleccione la Situación</label>
                    <select class="form-control"><option value="12" selected="">Situación</option>
                        <option value="13">Bajas</option>
                        <option value="14">Altas</option>
                    </select> -->
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="button" id="make_graphics" >Generar grafica</button></div>
                <!-- <div class="form-group">
                    <a href="../Registro.html"><button class="btn btn-primary btn-block" type="submit" >IMPRIMIR</button></a></div> -->
            </form>

        </div>


        <div id="cont-visdat" class="form-container">
            <canvas id="my_graphics" style="position: relative; height: 40vh; width: 80vw;"></canvas>
            <!-- <form method="post"><img class="border rounded-0 border-primary" id="imgreg" src="./vistas/assets/img/grafica.jpg">
                <div class="form-group" id="div-tipografia"><label>GRAFICA TIPO : PERIODO : SEXO : SITUACION</label></div>
            </form> -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('my_graphics');//referencia a la grafica
        //var dat_ctx = document.getElementById('selec_data');//referencia a tipo de grafica selec_data

        $("#make_graphics").on("click",function(event){
            event.preventDefault();
            var g_type = $('#selec_type').val();
            var g_data = $('#selec_data').val();
            var g_period = $('#selec_period').val();
            var g_sex = $('#selec_sex').val();
               
            alert('formulario enviado' +g_type + ' ' + g_data + ' '+ g_period + ' ' + g_sex );
            // resto de tu codigo
        });

        /* var etiquetas=['HOMBRES', 'MUJERES', 'ESTUDIANTES', 'DOCENTES'];
        var dat_g = [33,10,45,23];

        const datosVentas2020 = {
            label: "Graficación de datos",
            data: dat_g, // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
            backgroundColor: 'rgba(54, 162, 235, 0.2)',//['#00ffff','#ff4500','#6bf1ab', '#438c6c', '#509c7f', '#1f794e', '#34444c', '#90CAF9', '#64B5F6', '#42A5F5', '#2196F3', '#0D47A1'], // Color de fondo
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1,// Ancho del borde
        };
        new Chart(ctx, {
            type: 'bar',// Tipo de gráfica
            data: {
                labels: etiquetas,
                datasets: [
                    datosVentas2020,
                    // Aquí más datos...
                ]
            },
            /* options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            } 
        }); */
        
       
        function grafica(dtipo, ddata, dperiodo, dsexo){
            var formData = new FormData();
            formData.append('g_type',dtipo);
            formData.append('g_data',ddata);
            formData.append('g_period',dperiodo);
            formData.append('g_sex',dsex);
            $.ajax({
            url: '<?php echo SERVERURL; ?>ajax/estadisticsAjax.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (resp){
                alert(resp);
            }
        });

        }
    </script>
  
   