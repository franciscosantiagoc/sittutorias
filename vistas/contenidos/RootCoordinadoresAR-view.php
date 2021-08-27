
    <?php 
    if(isset($_SESSION['roll_sti'])){
        if($_SESSION['roll_sti'] != "Admin"){
            if($_SESSION['roll_sti'] == "Docente"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
            }else  if($_SESSION['roll_sti'] == "Coordinador de Area"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
            }else  if($_SESSION['roll_sti'] == "Tutorado"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
            }else  if($_SESSION['roll_sti'] == "Coordinador de Carrera"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
            }
        }
    }
    
    include "./vistas/inc/navRoot.php";
    ?>
    <!-- Lista jefes -->
    <div class="modal" id="modalListJefes" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Descargar lista jefes de departamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <form action="<?php echo SERVERURL;?>FormatRootCoordinadoresAR" method="post">
                            <div class="form-group">
                                <input type="hidden" name="format_rootcoordinadoresar_matricula" value="<?php echo $_SESSION['matricula_sti'];?>">
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
    <div class="modal" id="modalActualizarJefe" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Actualizar jefe de departamento</h5>
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
                                <input class="form-control" type="hidden" placeholder="Matrícula" id="Act_matricula_RJDepto" name="actmatricularjdepto">
                            </div>
                            <div class="form-group">
                                <label for="Act_matriculaJDepto">Matrícula</label>
                                <input class="form-control" type="text" placeholder="Matrícula" id="Act_matricula_JDepto" name="actmatriculajepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_nombreJDepto">Nombre</label>
                                <input class="form-control" type="text" placeholder="Nombre" id="Act_nombre_JDepto" name="actnombrejdepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_apellidoPJDepto">Apellido Paterno</label>
                                <input class="form-control" type="text" placeholder="Apellido Paterno" id="Act_apellid_PJDepto" name="actapellidopjdepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_apellidoMJDepto">Apellido Materno</label>
                                <input class="form-control" type="text" placeholder="Apellido Materno" id="Act_apellido_MJDepto" name="actapellidomjdepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_sexoJDepto">Sexo</label>
                                <select id="Act_sexo_JDepto" name="actsexojdepto">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Act_telJDepto">Número de Teléfono</label>
                                <input class="form-control" type="text" placeholder="Número de Teléfono" id="Act_tel_JDepto" name="actteljdepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_emailJDepto">Email</label>
                                <input class="form-control" type="text" placeholder="Email" id="Act_email_JDepto" name="actemailjdepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_areaJDepto">Área</label>
                                <select id="Act_area_JDepto" name="actareajdepto">
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
    if(isset($_POST['actnombrejdepto'])){
        require_once "./controladores/jefesdController.php";

        $ins_usuario= new jefesdController();

        echo $ins_usuario->actualizar_jdepto_controlador();
    }
    ?>
    <div class="register-photo">

        <div id="importcsvregis" class="form-container">
            <form id="regisTutcsv" method="post" data-form="default" autocomplete="off">
                <h2 class="text-center"><strong>Jefes de departamento</strong></h2>

                <div class="form-group"><a class="btn btn-primary btn-block" href="<?php echo SERVERURL;?>Registro">REGISTRAR</a></div>
                <div class="team-boxed">
                    <div class="container">
                    </div>
                </div>
            </form>
        </div>

        <div class="form-container" id="contain">
            <div class="form-group pull-left col-lg-4">
                <button class="btn btn-primary btn-block"  data-toggle="modal"  data-target="#modalListJefes" type="submit" >DESCARGAR LISTA JEFES DE DEPARTAMENTO </button>
            </div>
            <div class="col-md-12 search-table-col">

                <?php
                require_once './controladores/jefesdController.php';
                $ins_actividad = new jefesdController();
                $dat_info = $ins_actividad->consulta_jefesd_controlador();
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
                            echo '<tr>
                                <td>'.$contador.'</td>
                                <td>'.$idmatric.'</td>
                                <td>'.$name.'</td>
                                <td>'.$apellp.'</td>
                                <td>'.$apellm .'</td>
                                <td>'.$tel.'</td>
                                <td>
                                    <center><abbr title="Actualizar"><button class="btnActJefe" onclick="clickActJDepto('.$idmatric.')" data-toggle="modal" data-target="#modalActualizarJefe" ><i class="fas fa-sync-alt" style="font-size: 15px;"></i></button></abbr>
                                    <abbr title="Eliminar"><button type="submit" onclick="clickDelJDepto('.$idmatric.')" ><i class="far fa-trash-alt" style="font-size: 15px;"></i></button></abbr>
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


        function clickActJDepto(idActJDepto){//1 - ver 2- actualizar
            var datos = new FormData();
            datos.append("idInfoCArea",idActJDepto);
            $imagenPrevisualizacion = document.querySelector("#image-infoTE");
            $imagenPrevisualizacion2 = document.querySelector("#image-infoACTE");
            $.ajax({
                url: "ajax/infoCAreaAjax.php",
                method: "post",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                success: function(respuesta){
                        console.log(respuesta);
                        $("#Act_matricula_RJDepto").val(respuesta[0][0]);
                        $("#Act_matricula_JDepto").val(respuesta[0][0]);
                        $("#Act_nombre_JDepto").val(respuesta[0][1]);
                        $("#Act_apellid_PJDepto").val(respuesta[0][2]);
                        $("#Act_apellido_MJDepto").val(respuesta[0][3]);
                        $("#Act_tel_JDepto").val(respuesta[0][5]);
                        $("#Act_email_JDepto").val(respuesta[0][6]);

                        var image = "<?php echo SERVERURL;?>";
                        image = image + respuesta[0][8];
                        $("#ed_image").attr("src",image);
                        //$("#areaACTE").val(respuesta[0][8]);
                        $("#Act_area_JDepto option[value='"+respuesta[0][9]+"']").attr("selected", true);

                        let sex = respuesta[0][4];
                        if(sex==='F')
                            $("#Act_sexo_JDepto option[value='F']").attr("selected", true);
                        else $("#Act_sexo_JDepto option[value='M']").attr("selected", true);

                }
            });
        }



        function clickDelJDepto(idDelJDepto){
            var datos = new FormData();
            datos.append("del_idJDepto",idDelJDepto);

            Swal.fire({
                title: "Advertencia",
                text: "¿Esta seguro de eliminar este jefe de departamento?",
                showCancelButton:true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No'

            }).then(resultado=>{
                if(resultado.value){
                    $.ajax({
                        url: "ajax/infoCAreaAjax.php",
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




    