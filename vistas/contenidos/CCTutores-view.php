
<?php 

if(isset($_SESSION['roll_sti'])){
    //if($_SESSION['roll_sti'] != "Coordinador De Carrera" && $_SESSION['roll_sti'] != "Coordinador De Area"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else    if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }if($_SESSION['roll_sti'] == "Coordinador De Area"){
            include "./vistas/inc/navCoordinadorA.php";
        }else if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
            include "./vistas/inc/navCoordinadorC.php";
        }
    //}
}
  
 

?>

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
                        <center><img src="" height="300px" id="image-infoACTE"></center>
                        <div class="form-group">
                            <label for="matriculaT">Matrícula</label>
                            <input class="form-control" type="text" placeholder="Matrícula" id="matriculaACTE" name="matriculacte" >
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
                            <select id="act_sex">
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
                            <input class="form-control" type="text" placeholder="Area" id="AreaACTE" name="areaacte" >
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
        <div class="container">
            <div id="importcsvregis" class="form-container">
                <form id="regisTutcsv" method="post">
                    <h2 class="text-center"><strong>Registrar</strong></h2>
                    <div class="form-group"><input class="form-control" type="text" id="nameinput" placeholder="Nombre" name="name"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellidos"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Carrera"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Matrícula"></div>
                    <div class="form-group">
                        <a class="btn btn-primary btn-block" href="<?php echo SERVERURL;?>Registro">REGISTRAR</a>
                    </div>
                </form>
            </div>
        </div>
                <div class="form-container" id="contain">
                    <div class="col-md-12 search-table-col">
                        <div class="intro">
                            <h2 class="text-center"><strong>Tutores</strong></h2>
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
                                    echo '
                                        <td>'. $contador.'</td>
                                        <td>'. $idmatric.'</td>
                                        <td>'. $name.'</td>
                                        <td>'. $apellp .'</td>
                                        <td>'. $apellm .'</td>
                                        <td>'. $tel.'</td>
                                        <td>
                                            
                                            <center><button class="btnVerInfoTE" onclick="clickTE('.$idmatric.',2)" data-toggle="modal" data-target="#modalActualizarTE" ><i class="fas fa-sync-alt" style="font-size: 15px;"></i></button>
                                        </center>
                                        </td>
                                        <td><center><button class="btnVerInfoTE" onclick="clickTE('.$idmatric.',1)" data-toggle="modal" data-target="#modalInfoTE" ><i class="fas fa-eye" style="font-size: 15px;"></i></button>
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
        <div class="container">
            <div id="cont-visdat" class="form-container">
                <form method="post"><img id="imgreg" src="./vistas/assets/img/tutores.jpg">
                    <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Paterno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Materno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Fecha Nacimiento"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Sexo"></div>
                    <div class="form-group"><input class="form-control" type="tel" placeholder="Número de Telefono"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Dirección"></div>
                    <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Area"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Matrícula"></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="button">Actualizar</button></div>
                </form>
            </div>
        </div>

    </div>


<script type="text/javascript">


    function clickTE(idInfoTE, func){//1 - ver 2- actualizar
        var datos = new FormData();
        datos.append("idInfoTES",idInfoTE);
        $imagenPrevisualizacion = document.querySelector("#image-infoTE");
        $.ajax({
            url: "ajax/infoTutoresAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(respuesta){
                if(func===1) {
                    //console.log(respuesta);/**/
                    $("#matriculaTE").val(respuesta[0][0]);
                    $("#nameCoordinadorTE").val(respuesta[0][1]);
                    $("#apellidoPTE").val(respuesta[0][2]);
                    $("#apellidoMTE").val(respuesta[0][3]);
                    $("#SexoTE").val(respuesta[0][4]);
                    $("#numeroTelefonoTE").val(respuesta[0][5]);
                    $("#EmailTE").val(respuesta[0][6]);
                    $("#AreaTE").val(respuesta[0][8]);


                    var image = "<?php echo SERVERURL;?>"
                    image = image + respuesta[0][9];
                    $imagenPrevisualizacion.src = image;
                    console.log("imagen coord:" + image);
                }else{

                    $("#matriculaACTE").val(respuesta[0][0]);
                    $("#nameCoordinadorACTE").val(respuesta[0][1]);
                    $("#apellidoPACTE").val(respuesta[0][2]);
                    $("#apellidoMACTE").val(respuesta[0][3]);
                    $("#numeroTelefonoACTE").val(respuesta[0][5]);
                    $("#EmailACTE").val(respuesta[0][6]);
                    $("#AreaACTE").val(respuesta[0][8]);


                    let sex = respuesta[0][4];
                    if(sex==='F')
                        $("#act_sex option[value='F']").attr("selected", true);
                    else $("#act_sex option[value='M']").attr("selected", true);
                }

            }
        }).fail( function( jqXHR, textStatus, errorThrown ) {
            console.log('error '+textStatus);
        });
    }

</script>


