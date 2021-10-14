
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
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="" value="<?php echo $_SESSION['matricula_sti'];?>">
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
<?php
if(isset($_POST['idarea']) && isset($_POST['nombrearea'])){
    require_once "./controladores/areasController.php";

    $ins_actividad= new areasController();

    echo $ins_actividad->registrar_area_controlador();

}
?>

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
if(isset($_POST['idacarea'])){
    require_once "./controladores/areasController.php";

    $ins_area= new areasController();

    echo $ins_area->actualizar_area_controlador();
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
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="idCarrera">Id Carrera</label>
                            <input class="form-control" type="text" placeholder="Id Carrera" id="idCarrera" name="idcarrera"  >
                        </div>
                        <div class="form-group" id="idArea">

                            <label for="areaACTE">Área</label>
                            <select class="form-control" id="id_Area_reg" name="idarea">
                                <?php
                                require_once './controladores/usuarioController.php';
                                $ins_usuario = new usuarioController();
                                $dat_info =$ins_usuario->datos_ta_controlador("idAreas, Nombre","areas",";");
                                $dat_info=$dat_info->fetchAll();
                                foreach($dat_info as $row){
                                    $id = $row['idAreas'];
                                    $nombre = $row['Nombre'];
                                    echo "<option value='$id'>$nombre</option>";
                                }
                                ?>
                            </select>
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

<?php
if(isset($_POST['idcarrera']) && isset($_POST['nombrecarrera'])){
    require_once "./controladores/carrerasController.php";

    $ins_carrera= new carrerasController();

    echo $ins_carrera->registrar_carrera_controlador();

}
?>

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
                            <input class="form-control" type="text" placeholder="Id Carrera" id="id_Act_Carrera" name="idaccarrera" readonly >
                        </div>
                        <div class="form-group" id="idAreas">
                            <label for="areaACTE">Área</label>
                            <select class="form-control" id="id_Act_Area" name="idaccarea">
                                <?php
                                require_once './controladores/usuarioController.php';
                                $ins_usuario = new usuarioController();
                                $dat_info =$ins_usuario->datos_ta_controlador("idAreas, Nombre","areas",";");
                                $dat_info=$dat_info->fetchAll();
                                foreach($dat_info as $row){
                                    $id = $row['idAreas'];
                                    $nombre = $row['Nombre'];
                                    echo "<option value='$id'>$nombre</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombreAcCarrera">Nombre de la Carrera</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="Nombre_Act_Carrera" name="nombreaccarrera" >
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
if(isset($_POST['idaccarrera'])){
    require_once "./controladores/carrerasController.php";

    $ins_accarrera= new carrerasController();

    echo $ins_accarrera->actualizar_carrera_controlador();
}
?>

<!-- Registrar Generacion -->
<div class="modal" id="modalRegistrarGener" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Registrar Generación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="idCarrera">Id Generación</label>
                            <input class="form-control" type="text" placeholder="Id Generación" id="id_Gener" name="id_gener" >
                        </div>
                        <div class="form-group">
                            <label>Fecha inicio</label>
                            <input class="form-control" name="fecha_reg_ini" type="date">
                        </div>
                        <div class="form-group">
                            <label>Fecha fin</label>
                            <input class="form-control" name="fecha_reg_fin" type="date">
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

<?php
if(isset($_POST['id_gener'])){
    require_once "./controladores/generacionController.php";

    $ins_gener= new generacionController();

    echo $ins_gener->registrar_generacion_controlador();

}
?>

<!-- Actualizar Generación-->
<div class="modal" id="modalActGener" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Generación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="idAcGener">Id Generación</label>
                            <input class="form-control" type="text" placeholder="Id Generación" id="id_Act_Gener" name="id_ac_gener" readonly >
                        </div>
                        <div class="form-group">
                            <label>Fecha inicio</label>
                            <input class="form-control" id="Fecha_Act_Ini" name="fecha_act_ini" type="date">
                        </div>
                        <div class="form-group">
                            <label>Fecha fin</label>
                            <input class="form-control" id="Fecha_Act_Fin" name="fecha_act_fin" type="date">
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
if(isset($_POST['id_ac_gener'])){
    require_once "./controladores/generacionController.php";

    $ins_ac_gener= new generacionController();

    echo $ins_ac_gener->actualizar_generacion_controlador();
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
                require_once './controladores/areasController.php';
                $ins_area = new areasController();
                $resultado='';
                $ncontrol='';
                $dat_info = $ins_area->consulta_de_areas_controlador();
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
                        foreach($dat_info as $row){
                            $idarea = $row['idAreas'];
                            $name = $row['Nombre'];
                            $descripcion = $row['Descripcion'];


                        echo '<tr>
                            <td>'.$contador.'</td>
                           <td>'.$idarea.'</td>
                            <td>'.$name.'</td>
                            <td>'.$descripcion.'</td>
                            
                            <td>
                                 <center>
                                     <abbr title="Actualizar area"><button class="btnVerInfoArea" onclick="clickActArea('.$idarea.')" data-toggle="modal" data-target="#modalActArea" >
                                     <i class="fas fa-sync-alt" style="font-size: 15px;"></i></button></abbr>
                                     
                                     <abbr title="Eliminar area"><button type="submit" onclick="eliminarArea('.$idarea.')">
                                           <i class="far fa-trash-alt"></i></button></abbr>
                                    
                                </center>
                            </td>
                           
                        </tr>';
                        $contador++;

                        }
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
                require_once './controladores/carrerasController.php';
                $ins_actividad = new carrerasController();
                $resultado='';
                $ncontrol='';
                $dat_info = $ins_actividad->consulta_de_carreras_controlador();
                ?>
                <div class="table-responsive table-bordered table  ">
                    <table class="table table-bordered table-hover tablas">
                        <thead class="bg-primary bill-header cs">
                        <tr class="text-center roboto-medium">
                            <th>#</th>
                            <th>Id Carrera</th>
                            <th>Área</th>
                            <th>Carrera</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $contador=1;
                        foreach($dat_info as $row){
                            $idcarrera = $row['idCarrera'];
                            $namearea = $row['Nombre_Area'];
                            $namecarrera = $row['Nombre'];
                            $idarea = $row['Areas_idAreas'];
                        echo '<tr>
                                <td>'.$contador.'</td>
                                <td>'.$idcarrera.'</td>
                                <td>'.$namearea.'</td>
                                <td>'.$namecarrera.'</td>
                            <td>
                                 <center>
                                     <abbr title="Actualizar carrera"><button class="btnActCar" onclick="clickActCar('.$idcarrera.',\''.$idarea.'\')" data-toggle="modal" data-target="#modalActCarrera" >
                                     <i class="fas fa-sync-alt" style="font-size: 15px;"></i></button></abbr>
                                     
                                     <abbr title="Eliminar carrera"><button type="submit" onclick="eliminarCarrera('.$idcarrera.')">
                                           <i class="far fa-trash-alt"></i></button></abbr>
                                </center>
                            </td>
                           
                        </tr>';
                        $contador++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Registrar Generacion -->
            <div class="col-md-12 search-table-col">

                <div class="form-group pull-right col-lg-4">
                    <button class="btn btn-primary btn-block border rounded"  data-toggle="modal"  data-target="#modalRegistrarGener">Registrar Generación</button>
                </div>
                <?php
                require_once './controladores/generacionController.php';
                $ins_actividad = new generacionController();
                $resultado='';
                $ncontrol='';
                $dat_info = $ins_actividad->consulta_de_generacion_controlador();
                ?>
                <div class="table-responsive table-bordered table  ">
                    <table class="table table-bordered table-hover tablas">
                        <thead class="bg-primary bill-header cs">
                        <tr class="text-center roboto-medium">
                            <th>#</th>
                            <th>Id Generación</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $contador=1;
                        foreach($dat_info as $row){
                            $idgeneracion = $row['idgeneracion'];
                            $fecha_ini = $row['date_ini'];
                            $fecha_fin = $row['date_fin'];
                            echo '<tr>
                                <td>'.$contador.'</td>
                                <td>'.$idgeneracion.'</td>
                                <td>'.$fecha_ini.'</td>
                                <td>'.$fecha_fin.'</td>
                            <td>
                                 <center>
                                     <abbr title="Actualizar generacion"><button class="btnActCar" onclick="clickActGener('.$idgeneracion.')" data-toggle="modal" data-target="#modalActGener" >
                                     <i class="fas fa-sync-alt" style="font-size: 15px;"></i></button></abbr>
                                     
                                     <abbr title="Eliminar generacion"><button type="submit" onclick="eliminarGener('.$idgeneracion.')">
                                           <i class="far fa-trash-alt"></i></button></abbr>
                                </center>
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


    function clickActArea(idAcArea){
        var datos = new FormData();
        datos.append("idAcArea",idAcArea);

        $.ajax({
            url: "ajax/areaAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(respuesta){
                $("#idAcArea").val(respuesta[0][0]);
                $("#NombreAcArea").val(respuesta[0][1]);
                $("#DescripcionAcArea").val(respuesta[0][2]);

            }
        });
    }

    function eliminarArea(idDelArea){
        var datos = new FormData();
        datos.append("del_idArea",idDelArea);

        Swal.fire({
            title: "Advertencia",
            text: "¿Esta seguro de eliminar esta área?",
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'

        }).then(resultado=>{
            if(resultado.value){
                $.ajax({
                    url: "ajax/areaAjax.php",
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
    function clickActCar(idAcCar,idAcCArea){
        var datos = new FormData();
        datos.append("idAcCarrera",idAcCar);
        datos.append("idAcCArea",idAcCArea);

        $.ajax({
            url: "ajax/carreraAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(respuesta){
                $("#id_Act_Carrera").val(respuesta[0][0]);
                $("#Nombre_Act_Carrera").val(respuesta[0][2]);
                $("#id_Act_Area option[value='"+respuesta[0][3]+"']").attr("selected", true);


            }
        });
    }

    function eliminarCarrera(idDelCarrera){
        var datos = new FormData();
        datos.append("del_idCarrera",idDelCarrera);

        Swal.fire({
            title: "Advertencia",
            text: "¿Esta seguro de eliminar esta carrera?",
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'

        }).then(resultado=>{
            if(resultado.value){
                $.ajax({
                    url: "ajax/carreraAjax.php",
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

    function clickActGener(idAcGener){
        var datos = new FormData();
        datos.append("idAcGener",idAcGener);

        $.ajax({
            url: "ajax/generacionAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(respuesta){
                $("#id_Act_Gener").val(respuesta[0][0]);
                $("#Fecha_Act_Ini").val(respuesta[0][1]);
                $("#Fecha_Act_Fin").val(respuesta[0][2]);
            }
        });
    }


    function eliminarGener(idDelGener){
        var datos = new FormData();
        datos.append("del_idGener",idDelGener);

        Swal.fire({
            title: "Advertencia",
            text: "¿Esta seguro de eliminar esta generación?",
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'

        }).then(resultado=>{
            if(resultado.value){
                $.ajax({
                    url: "ajax/generacionAjax.php",
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
