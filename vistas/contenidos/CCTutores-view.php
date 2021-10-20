
<?php 

if(isset($_SESSION['roll_sti'])){
    //if($_SESSION['roll_sti'] != "Coordinador de Carrera" && $_SESSION['roll_sti'] != "Coordinador de Area"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else    if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }if($_SESSION['roll_sti'] == "Coordinador de Area"){
            include "./vistas/inc/navCoordinadorA.php";
        }else if($_SESSION['roll_sti'] == "Coordinador de Carrera"){
            include "./vistas/inc/navCoordinadorC.php";
        }
    //}
}


?>

<!-- Tuto Activos -->
<div class="modal" id="modalListTutAct" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Descargar lista de tutores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="<?php echo SERVERURL;?>FormatCCTutores" method="post">
                        <div class="form-group">
                            <input type="hidden" name="format_cctutores_matricula" value="<?php echo $_SESSION['matricula_sti'];?>">
                        </div>
                        <div class="form-group">
                            <select name="tutores">
                                <option value="1">Activos</option>
                                <option value="0">Inactivos</option>
                            </select>

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


<!-- Tuto Inactivos -->
<div class="modal" id="modalListTutInac" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Descargar lista de tutores inactivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
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
<div class="modal" id="modalActualizarTE" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Información del Tutor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="hidden" placeholder="Matrícula" id="matricula_RACTE" name="matricularacte">
                        </div>
                        <div class="form-group">
                            <label for="matriculaT">Matrícula</label>
                            <input class="form-control" type="text" placeholder="Matrícula" id="matriculaACTE" name="matriculaacte" >
                        </div>
                        <div class="form-group">
                            <label for="nombreCoordinadorACTE">Nombre</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="nameCoordinadorACTE" name="nameCoordinadoracte" >
                        </div>
                        <div class="form-group">
                            <label for="apellidoACPTE">Apellido Paterno</label>
                            <input class="form-control" type="text" placeholder="Apellido Paterno" id="apellidoPACTE" name="apellidopacte" >
                        </div>
                        <div class="form-group">
                            <label for="apellidoMACTE">Apellido Materno</label>
                            <input class="form-control" type="text" placeholder="Apellido Materno" id="apellidoMACTE" name="apellidomacte" >
                        </div>
                        <div class="form-group">
                            <label for="sexoACTE">Sexo</label>
                            <select id="act_sex" name="sexo_acte">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="numeroTelefonoACTE">Número de Teléfono</label>
                            <input class="form-control" type="text" placeholder="Número de Teléfono" id="numeroTelefonoACTE" name="numerotelefonoacte" >
                        </div>
                        <div class="form-group">
                            <label for="emailACTE">Email</label>
                            <input class="form-control" type="text" placeholder="Email" id="EmailACTE" name="emailacte" >
                        </div>
                        <div class="form-group">
                            <label for="areaACTE">Área</label>
                            <select id="areaACTE" name="areaacte">
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
if(isset($_POST['nameCoordinadoracte'])){
    require_once "./controladores/tutoresController.php";

    $ins_usuario= new tutoresController();

    echo $ins_usuario->actualizar_tutores_controlador();
}
?>
<!-- Ver -->
<div class="modal" id="modalInfoTE" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Información del Tutor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <center><img src="" height="300px" id="image-infoTE"></center>
                        <div class="form-group">
                            <label for="matriculaT">Matrícula</label>
                            <input class="form-control" type="text" placeholder="Matrícula" id="matriculaTE" name="matriculate" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nombreCoordinadorTE">Nombre</label>
                            <input class="form-control" type="text" placeholder="Nombre" id="nameCoordinadorTE" name="nameCoordinadorCte" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellidoPTE">Apellido Paterno</label>
                            <input class="form-control" type="text" placeholder="Apellido Paterno" id="apellidoPTE" name="apellidopte" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellidoMTE">Apellido Materno</label>
                            <input class="form-control" type="text" placeholder="Apellido Materno" id="apellidoMTE" name="apellidomte" disabled>
                        </div>
                        <div class="form-group">
                            <label for="sexoCTE">Sexo</label>
                            <input class="form-control" type="text" placeholder="Sexo" id="SexoTE" name="sexote" disabled>
                        </div>
                        <div class="form-group">
                            <label for="numeroTelefonoCTE">Número de Teléfono</label>
                            <input class="form-control" type="text" placeholder="Número de Teléfono" id="numeroTelefonoTE" name="numerotelefonoTE" disabled>
                        </div>
                        <div class="form-group">
                            <label for="emailCTE">Email</label>
                            <input class="form-control" type="text" placeholder="Email" id="EmailTE" name="emailte" disabled>
                        </div>
                        <div class="form-group">
                            <label for="areaCTE">Área</label>
                            <input class="form-control" type="text" placeholder="Area" id="AreaTE" name="areate" disabled>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="register-photo">

                <div class="form-container" id="contain">
                    <div class="col-md-12 search-table-col">
                        <div class="intro">
                            <h2 class="text-center"><strong>Tutores</strong></h2>
                        </div>
                        <div class="form-group pull-left col-lg-4">
                            <a class="btn btn-primary" href="<?php echo SERVERURL;?>Registro">REGISTRAR</a >
                            <button class="btn btn-primary btn-block"  data-toggle="modal"  data-target="#modalListTutAct" type="submit" >DESCARGAR LISTA DE TUTORES </button>
                        </div>




                        <?php
                        require_once './controladores/tutoresController.php';
                        $ins_actividad = new tutoresController();
                        $dat_info = $ins_actividad->consulta_tutores_controlador();
                        ?>
                        <div class="table-responsive table-bordered table  ">
                            <table class="table table-bordered table-hover tablas">
                                <thead class="bg-primary bill-header cs">
                                <tr>
                                    <th id="trs-hd" class="col-lg-1">#</th>
                                    <th id="trs-hd" class="col-lg-1">MATRÍCULA</th>
                                    <th id="trs-hd" class="col-lg-2">NOMBRE</th>
                                    <th id="trs-hd" class="col-lg-2">APELLIDO PATERNO</th>
                                    <th id="trs-hd" class="col-lg-3">APELLIDO MATERNO<br></th>
                                    <th id="trs-hd" class="col-lg-3">TELÉFONO</th>
                                    <th id="trs-hd" class="col-lg-2">ACTUALIZAR</th>
                                    <th id="trs-hd" class="col-lg-2">VER</th>
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
                                        <td>'. $contador.'</td>
                                        <td>'. $idmatric.'</td>
                                        <td>'. $name.'</td>
                                        <td>'. $apellp .'</td>
                                        <td>'. $apellm .'</td>
                                        <td>'. $tel.'</td>
                                        <td>
                                            
                                            <center><abbr title="Actualizar tutor"><button class="btnVerInfoTE" onclick="clickTE('.$idmatric.',2)" data-toggle="modal" data-target="#modalActualizarTE" ><i class="fas fa-sync-alt" style="font-size: 15px;"></i></button></abbr>
                                        </center>
                                        </td>
                                        <td><center><abbr title="Ver tutor"><button class="btnVerInfoTE" onclick="clickTE('.$idmatric.',1)" data-toggle="modal" data-target="#modalInfoTE" ><i class="fas fa-eye" style="font-size: 15px;"></i></button></abbr>
                                        </center></td>
                                        
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


    function clickTE(idInfoTE, func){//1 - ver 2- actualizar
        var datos = new FormData();
        datos.append("idInfoTES",idInfoTE);
        $imagenPrevisualizacion = document.querySelector("#image-infoTE");
        $imagenPrevisualizacion2 = document.querySelector("#image-infoACTE");
        $.ajax({
            url: "ajax/infoTutoresAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(respuesta){
                console.log(respuesta);
                if(func===1) {

                    $("#matriculaTE").val(respuesta[0][0]);
                    $("#nameCoordinadorTE").val(respuesta[0][1]);
                    $("#apellidoPTE").val(respuesta[0][2]);
                    $("#apellidoMTE").val(respuesta[0][3]);
                    $("#SexoTE").val(respuesta[0][4]);
                    $("#numeroTelefonoTE").val(respuesta[0][5]);
                    $("#EmailTE").val(respuesta[0][6]);
                    $("#AreaTE").val(respuesta[0][7]);


                    var image = "<?php echo SERVERURL;?>"
                    image = image + respuesta[0][8];
                    $imagenPrevisualizacion.src = image;
                    console.log("imagen coord:" + image);
                }else{
                    $("#matricula_RACTE").val(respuesta[0][0]);
                    $("#matriculaACTE").val(respuesta[0][0]);
                    $("#nameCoordinadorACTE").val(respuesta[0][1]);
                    $("#apellidoPACTE").val(respuesta[0][2]);
                    $("#apellidoMACTE").val(respuesta[0][3]);
                    $("#numeroTelefonoACTE").val(respuesta[0][5]);
                    $("#EmailACTE").val(respuesta[0][6]);
                    //$("#areaACTE").val(respuesta[0][8]);
                    $("#areaACTE option[value='"+respuesta[0][9]+"']").attr("selected", true);


                    let sex = respuesta[0][4];
                    if(sex==='F')
                        $("#act_sex option[value='F']").attr("selected", true);
                    else $("#act_sex option[value='M']").attr("selected", true);
                }

            }
        });
    }

</script>


