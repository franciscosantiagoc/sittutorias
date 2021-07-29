
<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador De Carrera" && $_SESSION['roll_sti'] != "Coordinador De Area"){
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
}
  
include "./vistas/inc/navCoordinadorC.php" 

?>

<div class="modal" id="modalInfoTE" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Información del Coordinador de Área</h5>
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
                            <label for="carreraCTE">Carrera</label>
                            <input class="form-control" type="text" placeholder="Carrera" id="CarreraTE" name="carrerate" disabled>
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
                        <a class="btn btn-primary btn-block" href="<?php echo SERVERURL;?>Registro">REGISTRAR</a
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
                                    <th id="trs-hd" class="col-lg-2">ELIMINAR</th>
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
                                        <td><center><button class="btnVerInfoTE" onclick="clickActividad('.$idmatric.')" data-toggle="modal" data-target="#modalInfoTE" ><i class="fas fa-eye" style="font-size: 15px;"></i></button>
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
    function clickActividad(idInfoTE){
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

                console.log(respuesta);/**/
                $("#matriculaTE").val(respuesta[0][0]);
                $("#nameCoordinadorTE").val(respuesta[0][1]);
                $("#apellidoPTE").val(respuesta[0][2]);
                $("#apellidoMTE").val(respuesta[0][3]);
                $("#SexoTE").val(respuesta[0][4]);
                $("#numeroTelefonoTE").val(respuesta[0][5]);
                $("#EmailTE").val(respuesta[0][6]);


                var image = "<?php echo SERVERURL;?>"
                image = image +respuesta[0][7];
                $imagenPrevisualizacion.src = image;
                console.log("imagen coord:"+image);

            }
        }).fail( function( jqXHR, textStatus, errorThrown ) {
            console.log('error '+textStatus);
        });
    }

</script>
    
