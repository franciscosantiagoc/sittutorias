
<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador De Carrera" && "Coordinador De Area"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }/* else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
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
<!-- Actualizar
<div class="modal" id="modalActActividad" tabindex="-1" role="dialog" aria-hidden="true">
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

-->
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
if(isset($_POST['ridactividad']) && isset($_POST['rnombreact']) && isset($_FILES['Ractivity-file']) ){
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
                            <th>Nombre de la actividad</th>
                            <th>Fecha Límite</th>
                            <th>Descripción</th>
                            <th>Periodo</th>
                            <th>ACTUALIZAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $contador=1;
                        foreach($dat_info as $rows){


                            echo '<tr class="text-center roboto-medium" >
                        <td>'.$contador.'</td>
                        <td>'.$rows['Nombre'].'</td>
                        <td>'.$rows['Fecha_registro'].'</td>
                        <td>'.$rows['Descripcion'].'</td>
                        <td>'.$rows['Semestrerealizacion_sug'].'</td>
                        <td>
                            <a href="#Actualizar" class="btn btn-success">
                                    <i class="fas fa-sync-alt"></i>	
                            </a>
                        </td>
                        <td>
                            <form class="FormularioAjax" action="'.SERVERURL.'ajax/usuarioAjax.php"  method="POST" data-form="delete" autocomplete="off">
                            
                                <button type="submit" class="btn btn-warning">
                                        <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
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
    