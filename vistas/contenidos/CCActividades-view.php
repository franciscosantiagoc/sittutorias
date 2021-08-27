
<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador De Carrera" && "Coordinador De Area"){
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
<!-- Actualizar -->
<div class="modal" id="modalActActividad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar actividad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="idAcActividad">Id de la Actividad</label>
                            <input class="form-control" type="text" placeholder="Id de la Actividad" id="idAcActividad" name="idacactividad" readonly >
                        </div>
                        <div class="form-group">
                            <label for="nombreAcAct">Nombre de la actividad</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="NombreAcAct" name="nombreacact" >
                        </div>
                        <div class="form-group">
                            <label for="descripcionac">Descripción</label>
                            <input class="form-control" type="text" placeholder="Descripción" id="DescripcionAcAct" name="descripcionacact">
                        </div>
                        <!--<div class="form-group">
                            <label for="semestresugac">Semestre Sugerido</label>
                            <input class="form-control" type="text" placeholder="Semestre sugerido" id="SemestreSugAc" name="semestresugac">
                        </div>-->

                        <div class="form-group">
                            <label for="semestresugac">Semestre Sugerido</label>
                            <select id="SemestreSugAc" name="semestresugac">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="file" name="Acactivity-file" id="acactivity-file" accept=".pdf">
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

<!-- Agregar Actividad -->
<div class="modal" id="modalAActividad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar nueva actividad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <center><img src="" height="300px" id="image-infoTE"></center>
                        <div class="form-group">
                            <label for="idActividad">Id de la Actividad</label>
                            <input class="form-control" type="text" placeholder="Id de la Actividad" id="RidActividad" name="ridactividad" >
                        </div>
                        <div class="form-group">
                            <label for="nombreACt">Nombre de la actividad</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="RNombreAct" name="rnombreact" >
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input class="form-control" type="text" placeholder="Descripción" id="RDescripcionAct" name="rdescripcionact">
                        </div>
                        <div class="form-group">
                            <label for="semestresug">Semestre Sugerido</label>
                            <input class="form-control" type="text" placeholder="Semestre sugerido" id="SemestreSug" name="semestresug">
                        </div>
                        <div class="form-group">
                            <label for="semestresug">Semestre obligatorio</label>
                            <!--<input class="form-control" type="text" placeholder="Semestre sugerido" id="SemestreSug" name="semestresug"> -->
                            <input type="checkbox" id="ActOblig" name="actoblig" value="activo"><br>
                        </div>
                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="file" name="Ractivity-file" id="ractivity-file" accept=".pdf">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit" >Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['ridactividad']) && isset($_POST['rnombreact'])){
    require_once "./controladores/actividadesController.php";

    $ins_actividad= new actividadesController();

    echo $ins_actividad->agregar_actividad_controlador();

}
?>

    <div class="register-photo">
        <div class="form-container">
            <p id="tit-activities"><strong>ACTIVIDADES</strong></p>
            <div class="col-md-12 search-table-col">
                <div class="form-group pull-right col-lg-4">
                    <button class="btn btn-primary btn-block border rounded" onclick="clickTE()" data-toggle="modal"  data-target="#modalAActividad" type="submit" >agregar NUEVA ACTIVIDAD</button>
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
                            <th>Id de Actividad</th>
                            <th>Nombre de la actividad</th>
                            <th>Fecha de registro</th>
                            <th>Descripción</th>
                            <th>Semestre sugerido</th>
                            <th>ACTUALIZAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $contador=1;
                        foreach($dat_info as $row){
                            $idactividad = $row['idActividades'];
                            $name = $row['Nombre'];
                            $fechareg = $row['Fecha_registro'];
                            $desc = $row['Descripcion'];
                            $semestrere = $row['Semestrerealizacion_sug'];





                        echo '<tr>
                            <td>'.$contador.'</td>
                            <td>'.$idactividad.'</td>
                            <td>'.$name.'</td>
                            <td>'.$fechareg.'</td>
                            <td>'.$desc.'</td>
                            <td>'.$semestrere.'</td>
                            <td>
                                 <center><abbr title="Actualizar actividad"><button class="btnVerInfoTE" onclick="clickTE('.$idactividad.')" data-toggle="modal" data-target="#modalActActividad" ><i class="fas fa-sync-alt" style="font-size: 15px;"></i></button></abbr>
                                 </center>
                            </td>
                            <td>
                                <abbr title="Eliminar actividad"><button type="submit" onclick="eliminarActivity('.$idactividad.')">
                                       <i class="far fa-trash-alt"></i>
                                </button></abbr>
                               
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


    function clickTE(idAcAct){//1 - ver 2- actualizar
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
    