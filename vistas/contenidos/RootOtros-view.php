
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
<!-- Registrar Area -->
<div class="modal" id="modalRegistrarArea" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Registrar Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="<?php echo SERVERURL;?>FormatRootActividades" method="post">
                        <div class="form-group">
                            <input type="hidden" name="format_tutortutorado_matricula" value="<?php echo $_SESSION['matricula_sti'];?>">
                        </div>
                        <div class="form-group">
                            <label for="idArea">Id del Área</label>
                            <input class="form-control" type="text" placeholder="Id del Área" id="idArea" name="idarea"  >
                        </div>
                        <div class="form-group">
                            <label for="nombreArea">Nombre del Área</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="NombreArea" name="nombrearea" >
                        </div>
                        <div class="form-group">
                            <label for="descripcionArea">Descripción</label>
                            <input class="form-control" type="text" placeholder="Descripción" id="DescripcionArea" name="descripcionarea">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Actualizar Area-->
<div class="modal" id="modalActArea" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Área</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="idAcArea">Id del Área</label>
                            <input class="form-control" type="text" placeholder="Id del Área" id="idAcArea" name="idacarea" readonly  >
                        </div>
                        <div class="form-group">
                            <label for="nombreAcArea">Nombre del Área</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="NombreAcArea" name="nombreacarea" >
                        </div>
                        <div class="form-group">
                            <label for="descripcionAcArea">Descripción</label>
                            <input class="form-control" type="text" placeholder="Descripción" id="DescripcionAcArea" name="descripcionacarea">
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
if(isset($_POST['idacactividad'])){
    require_once "./controladores/actividadesController.php";

    $ins_usuario= new actividadesController();

    echo $ins_usuario->actualizar_actividad_controlador();
}
?>

<!-- Registrar Carrera -->
<div class="modal" id="modalRegistrarCarrera" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Registrar Carrera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="<?php echo SERVERURL;?>FormatRootActividades" method="post">
                        <div class="form-group">
                            <label for="idCarrera">Id Carrera</label>
                            <input class="form-control" type="text" placeholder="Id Carrera" id="idCarrera" name="idcarrera"  >
                        </div>
                        <div class="form-group">
                            <label for="nombreCarrera">Nombre de la Carrera</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="NombreCarrera" name="nombrecarrera" >
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Actualizar Carrera-->
<div class="modal" id="modalActCarrera" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Carrera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="idAcCarrera">Id Carrera</label>
                            <input class="form-control" type="text" placeholder="Id Carrera" id="idAcCarrera" name="idaccarrera" readonly >
                        </div>
                        <div class="form-group">
                            <label for="nombreAcCarrera">Nombre de la Carrera</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="NombreAcCarrera" name="nombreaccarrera" >
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
if(isset($_POST['idacactividad'])){
    require_once "./controladores/actividadesController.php";

    $ins_usuario= new actividadesController();

    echo $ins_usuario->actualizar_actividad_controlador();
}
?>

    <div class="register-photo">
        <div class="form-container">
            <p id="tit-activities"><strong>REGISTRAR</strong></p>
            <div class="col-md-12 search-table-col">
                <!-- Registrar Area -->
                <div class="form-group pull-right col-lg-4">
                    <button class="btn btn-primary btn-block border rounded"  data-toggle="modal"  data-target="#modalRegistrarArea">Registrar Area</button>
                </div>
                <?php
                require_once './controladores/actividadesController.php';
                $ins_actividad = new actividadesController();
                $resultado='';
                $ncontrol='';
                $dat_info = $ins_actividad->consulta_de_actividad_controlador($resultado);
                ?>
                <div class="table-responsive table-bordered table  ">
                    <table class="table table-bordered table-hover tablas">
                        <thead class="bg-primary bill-header cs">
                        <tr class="text-center roboto-medium">
                            <th>#</th>
                            <th>Id de Area</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $contador=1;
//                        foreach($dat_info as $row){
//                            $idactividad = $row['idActividades'];
//                            $name = $row['Nombre'];
//                            $fechareg = $row['Fecha_registro'];
//                            $desc = $row['Descripcion'];
//                            $semestrere = $row['Semestrerealizacion_sug'];





                        echo '<tr>
                            <td>'.$contador.'</td>
                           <td>Id Area</td>
                            <td>Nombre</td>
                            <td>Descripción</td>
                            
                            <td>
                                 <center>
                                     <abbr title="Actualizar actividad"><button class="btnVerInfoTE" onclick="clickTE()" data-toggle="modal" data-target="#modalActArea" >
                                     <i class="fas fa-sync-alt" style="font-size: 15px;"></i></button></abbr>
                                     
                                     <abbr title="Eliminar actividad"><button type="submit" onclick="eliminarActivity()">
                                           <i class="far fa-trash-alt"></i></button></abbr>
                                    
                                </center>
                            </td>
                           
                        </tr>';
                        $contador++;

                        //}
                        ?>
                        </tbody>
                    </table>
                </div>


            </div>

            <!-- Registrar Carrera -->

            <div class="col-md-12 search-table-col">

                <div class="form-group pull-right col-lg-4">
                    <button class="btn btn-primary btn-block border rounded"  data-toggle="modal"  data-target="#modalRegistrarCarrera">Registrar Carrera</button>
                </div>
                <?php
                require_once './controladores/actividadesController.php';
                $ins_actividad = new actividadesController();
                $resultado='';
                $ncontrol='';
                $dat_info = $ins_actividad->consulta_de_actividad_controlador($resultado);
                ?>
                <div class="table-responsive table-bordered table  ">
                    <table class="table table-bordered table-hover tablas">
                        <thead class="bg-primary bill-header cs">
                        <tr class="text-center roboto-medium">
                            <th>#</th>
                            <th>Id Carrera</th>
                            <th>Nombre</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $contador=1;
                        //                        foreach($dat_info as $row){
                        //                            $idactividad = $row['idActividades'];
                        //                            $name = $row['Nombre'];
                        //                            $fechareg = $row['Fecha_registro'];
                        //                            $desc = $row['Descripcion'];
                        //                            $semestrere = $row['Semestrerealizacion_sug'];





                        echo '<tr>
                            <td>'.$contador.'</td>
                           <td>Id Area</td>
                            <td>Nombre</td>
                            
                            <td>
                                 <center>
                                     <abbr title="Actualizar actividad"><button class="btnVerInfoTE" onclick="clickTE()" data-toggle="modal" data-target="#modalActCarrera" >
                                     <i class="fas fa-sync-alt" style="font-size: 15px;"></i></button></abbr>
                                     
                                     <abbr title="Eliminar actividad"><button type="submit" onclick="eliminarActivity()">
                                           <i class="far fa-trash-alt"></i></button></abbr>
                                </center>
                            </td>
                           
                        </tr>';
                        $contador++;

                        //}
                        ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>


    </div>

<script type="text/javascript">


    function clickTE(idAcAct){
        var datos = new FormData();
        datos.append("idAcActividad",idAcAct);

        $.ajax({
            url: "ajax/acactividadAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(respuesta){
                $("#idAcActividad").val(respuesta[0][0]);
                $("#NombreAcAct").val(respuesta[0][1]);
                $("#DescripcionAcAct").val(respuesta[0][2]);
                $("#SemestreSugAc").val(respuesta[0][3]);

            }
        });
    }

    function eliminarActivity(idDelAct){
        var datos = new FormData();
        datos.append("del_idActividad",idDelAct);

        Swal.fire({
            title: "Advertencia",
            text: "¿Esta seguro de eliminar esta actividad?",
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'

        }).then(resultado=>{
            if(resultado.value){
                $.ajax({
                    url: "ajax/acactividadAjax.php",
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
    