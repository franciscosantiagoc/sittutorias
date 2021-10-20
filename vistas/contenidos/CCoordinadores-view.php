
    <?php 

    if(isset($_SESSION['roll_sti'])){
        if($_SESSION['roll_sti'] != "Coordinador de Carrera" && $_SESSION['roll_sti'] != "Coordinador de Area"){
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
    <!-- Trabajador existente -->
    <div class="modal" id="modalTrabExist" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Seleccione nuevo coordinador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                require_once './controladores/tutoresController.php';
                $ins_actividad = new tutoresController();
                $dat_info = $ins_actividad->consulta_tutores_controlador();
                ?>
                <div class="modal-body">
                    <div class="form-container">
                        <form method="post">
                            <div class="form-group">
                                <input type="hidden" name="matjd" value="<?php echo $_SESSION['matricula_sti'] ?>" >
                                <label for="ccarrea">Ingrese Nombre/Matrícula</label>
                                <input type="text" id="ccarreramat" name="ccarreramat" list="lista-tutores">
                                <datalist id="lista-tutores">
                                    <?php
                                    foreach ($dat_info as $row) {
                                        $idmatric = $row['Matricula'];
                                        $name = $row['Nombre'];
                                        $apellp = $row['APaterno'];
                                        $apellm = $row['AMaterno'];
                                        echo '
                                 <option value="'.$idmatric.'">'.$name.' '.$apellp.' '.$apellm.'</option>';
                                    }
                                    ?>
                                </datalist>

                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Definir como coordinador</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['ccarreramat'])){
        require_once "./controladores/coordinadorescController.php";

        $ins_usuario= new coordinadorescController();

        echo $ins_usuario->actualiza_coordinadortj_controlador();
    }
    ?>
    <!-- Lista CCarrea -->

    <div class="modal" id="modalListCCarrera" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Descargar lista coordinadores de carrera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <form action="<?php echo SERVERURL;?>FormatCCordinadores" method="post">
                            <div class="form-group">
                                <input type="hidden" name="format_rootcoordinadorescr_matricula" value="<?php echo $_SESSION['matricula_sti'];?>">
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

    <!-- Actualizar -->
    <div class="modal" id="modalActualizarCCarrera" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Coordinador de Carrera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <center><img src="" height="300px" id="ed_image"></center>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="hidden" placeholder="Matrícula" id="Act_matricula_RCCarrera" name="actmatricularccarrera">
                            </div>
                            <div class="form-group">
                                <label for="Act_matriculaCCarrera">Matrícula</label>
                                <input class="form-control" type="text" placeholder="Matrícula" id="Act_matricula_CCarrera" name="actmatriculaccarrera" >
                            </div>
                            <div class="form-group">
                                <label for="Act_nombreCCarrera">Nombre</label>
                                <input class="form-control" type="text" placeholder="Nombre" id="Act_nombre_CCarrera" name="actnombreccarrera" >
                            </div>
                            <div class="form-group">
                                <label for="Act_apellidoPCCarrera">Apellido Paterno</label>
                                <input class="form-control" type="text" placeholder="Apellido Paterno" id="Act_apellid_PCCarrera" name="actapellidopccarrera" >
                            </div>
                            <div class="form-group">
                                <label for="Act_apellidoMCCarrera">Apellido Materno</label>
                                <input class="form-control" type="text" placeholder="Apellido Materno" id="Act_apellido_MCCarrera" name="actapellidomccarrera" >
                            </div>
                            <div class="form-group">
                                <label for="Act_sexoCCarrera">Sexo</label>
                                <select id="Act_sexo_CCarrera" name="actsexoccarrera">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Act_telCCarrera">Número de Teléfono</label>
                                <input class="form-control" type="text" placeholder="Número de Teléfono" id="Act_tel_CCarrera" name="acttelccarrera" >
                            </div>
                            <div class="form-group">
                                <label for="Act_emailCCarrera">Email</label>
                                <input class="form-control" type="text" placeholder="Email" id="Act_email_CCarrera" name="actemailccarrera" >
                            </div>
                            <div class="form-group">
                                <label for="Act_areaCCarrera">Área</label>
                                <select id="Act_area_CCarrera" name="actareaccarrera">
                                    <?php
                                    require_once './controladores/usuarioController.php';
                                    $ins_usuario = new usuarioController();
                                    $dat_info =$ins_usuario->datos_ta_controlador(" idAreas,Nombre ","areas",";");
                                    $dat_info=$dat_info->fetchAll();
                                    foreach($dat_info as $row){
                                        /*$n=$dat_info->rowCount(); */
                                        $id = $row['idAreas'];
                                        $name = $row['Nombre'];

                                        echo "<option value='$id'>$name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit" >Actualizar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['actnombreccarrera'])){
        require_once "./controladores/coordinadorescController.php";

        $ins_usuario= new coordinadorescController();

        echo $ins_usuario->actualizar_ccarrera_controlador();
    }
    ?>




    <div class="register-photo">

        <div id="importcsvregis" class="form-container">
            <h2 class="text-center"><strong>Coordinadores de Carrera</strong></h2>
            <div class="form-group" style="display: flex; flex-direction: row; justify-content: space-around">
                <a style="width: 250px; height: 50px;" class="btn btn-primary btn-block" href="<?php echo SERVERURL;?>Registro">REGISTRAR</a>
                <button style="width: 250px; height: 50px;" class="btn btn-primary btn-block"  data-toggle="modal"  data-target="#modalTrabExist" >Trabajador existente </button>
            </div>

        </div>
        <div class="form-container" id="contain">
            <div class="form-group pull-left col-lg-4">

                <button class="btn btn-primary btn-block"  data-toggle="modal"  data-target="#modalListCCarrera" type="submit" >DESCARGAR LISTA COORDINADORES DE CARRERA </button>
            </div>
            <div class="col-md-12 search-table-col">

                <?php
                require_once './controladores/coordinadorescController.php';
                $ins_actividad = new coordinadorescController();
                $dat_info = $ins_actividad->consulta_coordinadoresc_controlador();

                ?>
                <div class="table-responsive table-bordered table  ">
                    <table class="table table-bordered table-hover tablas">
                        <thead class="bg-primary bill-header cs">
                            <tr class="text-center roboto-medium">
                                <th>#</th>
                                <th>MATRICULA</th>
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
                        foreach ($dat_info as $row){
                            $idmatric = $row['Matricula'];
                            $name = $row['Nombre'];
                            $apellp = $row['APaterno'];
                            $apellm = $row['AMaterno'];
                            $sexo = $row['Sexo'];
                            $tel = $row['NTelefono'];
                            $correo = $row['Correo'];

                        echo '<tr class="text-center" >
                                <td>'.$contador.'</td>
                                <td>'.$idmatric.'</td>
                                <td>'.$name.'</td>
                                <td>'.$apellp.'</td>
                                <td>'.$apellm.'</td>
                                <td>'.$tel.'</td>
                                 <td>
                                    <center><abbr title="Actualizar"><button class="btnActJefe" onclick="clickActCCarrera('.$idmatric.')" data-toggle="modal" data-target="#modalActualizarCCarrera" ><i class="fas fa-sync-alt" style="font-size: 15px;"></i></button></abbr>
                                    <abbr title="Eliminar"><button type="submit" onclick="clickDelCCarrera('.$idmatric.')" ><i class="far fa-trash-alt" style="font-size: 15px;"></i></button></abbr>
                                </td>
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

        function clickActCCarrera(idActCCarrera){//1 - ver 2- actualizar
            var datos = new FormData();
            datos.append("idInfCCar",idActCCarrera);
            $imagenPrevisualizacion = document.querySelector("#image-infoTE");
            $imagenPrevisualizacion2 = document.querySelector("#image-infoACTE");
            $.ajax({
                url: "ajax/infoCCarreraAjax.php",
                method: "post",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                success: function(respuesta){
                    console.log(respuesta);
                    $("#Act_matricula_RCCarrera").val(respuesta[0][0]);
                    $("#Act_matricula_CCarrera").val(respuesta[0][0]);
                    $("#Act_nombre_CCarrera").val(respuesta[0][1]);
                    $("#Act_apellid_PCCarrera").val(respuesta[0][2]);
                    $("#Act_apellido_MCCarrera").val(respuesta[0][3]);
                    $("#Act_tel_CCarrera").val(respuesta[0][5]);
                    $("#Act_email_CCarrera").val(respuesta[0][6]);

                    var image = "<?php echo SERVERURL;?>";
                    image = image + respuesta[0][8];
                    $("#ed_image").attr("src",image);
                    $("#Act_area_CCarrera option[value='"+respuesta[0][9]+"']").attr("selected", true);

                    let sex = respuesta[0][4];
                    if(sex==='F')
                        $("#Act_sexo_CCarrera option[value='F']").attr("selected", true);
                    else $("#Act_sexo_CCarrera option[value='M']").attr("selected", true);

                }
            });
        }


        function clickDelCCarrera(idDelCCarrera){
            var datos = new FormData();
            datos.append("del_idCCarrera",idDelCCarrera);

            Swal.fire({
                title: "Advertencia",
                text: "¿Esta seguro de eliminar este Coordinador de Carrera?",
                showCancelButton:true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No'

            }).then(resultado=>{
                if(resultado.value){
                    $.ajax({
                        url: "ajax/infoCCarreraAjax.php",
                        method: "post",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'JSON',
                        success: function(respuesta){
                            Swal.fire(respuesta.Titulo,respuesta.Texto,respuesta.Tipo).then(res=> {
                                if (res.value) {
                                    location.reload();

                                }
                            })
                        }
                    });

                }

            });


        }
    </script>
    