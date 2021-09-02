
    <?php 
    

        if(!isset($_SESSION['matricula_sti']) && !isset($_SESSION['NControl_sti'])){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'home";</script>';
        }

    include "./vistas/inc/navStudent.php"; 
    ?>
    
    <div class="register-photo">
        <div class="container bg-white">
            <p id="tit-activities"><strong>ACTIVIDADES</strong></p>
            <div class="col-md-12 search-table-col">
                <div class="form-group pull-right col-lg-4"><button class="btn btn-primary btn-block border rounded" type="submit" style="background-color: rgb(245,124,56);">Enviar Mensajes</button></div>
                <span
                    class="counter pull-right"></span>
                    <?php
                        include_once './controladores/notificacionesController.php';
                        $ins_notif = new notificacionesController();
                        $dat_notif = $ins_notif->consultanotifiones_controlador();
                    ?>
                    <div class="table-responsive table-bordered table table-hover table-bordered results">
                        <table class="table table-bordered table-hover tablas">
                            <thead class="bg-primary bill-header cs">
                                <tr>
                                    <th id="trs-hd" class="col-lg-1">ID</th>
                                    <th id="trs-hd" class="col-lg-1">Fecha</th>
                                    <th id="trs-hd" class="col-lg-3">Mensaje</th>
                                    <th id="trs-hd" class="col-lg-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $total_notif=count($dat_notif);
                                    for ($i=0;$i<$total_notif;$i++) {
                                        echo '<tr>
                                            <td>' . $dat_notif[$i]['idNotif'] . '</td>
                                            <td>' . $dat_notif[$i]['Mensaje'] . '</td>
                                            <td>' . $dat_notif[$i]['Fecha'] . '</td>
                                            <td>
                                                <abbr title="Click para eliminar la notificacion">
                                                <button onclick="deletenotif('.$dat_notif[$i]['idNotif'].')"><i class="fa fa-trash" style="font-size: 15px;"></i></button></abbr>
                                                </td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
<!--        <div id="importcsvregis" class="form-container">-->
<!--            <form method="post">-->
<!--                <h2 class="text-center" id="remitente"><strong>Mensaje de</strong></h2>-->
<!--                <div class="form-group">-->
<!--                    <p><strong>Asunto:</strong></p>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <p><strong>Mensaje</strong></p>-->
<!--                </div>-->
<!--                <div class="form-group" id="div-acciones"><button class="btn btn-primary" id="btn-save" type="submit" style="background-color: rgb(245,124,56);">CERRAR</button></div>-->
<!--            </form>-->
<!--        </div>-->
    </div>
<!--    <div class="contact-clean">-->
<!--        <form method="post">-->
<!--            <h2 class="text-center">Mensaje</h2>-->
<!--            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Numero de Control"></div>-->
<!--            <div class="form-group"><select class="form-control"><option value="12" selected="">Destinatario</option><option value="13">Tutor</option><option value="14">Coordinador de Carrera</option><option value="15">Coordinador de Area</option></select></div>-->
<!--            <div class="form-group"><input class="form-control is-invalid" type="email" placeholder="Asunto"></div>-->
<!--            <div class="form-group"><textarea class="form-control" name="message" placeholder="Mensaje" rows="14"></textarea></div>-->
<!--            <div class="form-group" id="div-msj-action"><button class="btn btn-primary" type="submit">Enviar mensaje</button><button class="btn btn-primary" id="btn-msj-cancel" type="submit">CANCELAR</button></div>-->
<!--        </form>-->
<!--    </div>-->

    <script>
        function deletenotif(idnotif) {

        }
    </script>
