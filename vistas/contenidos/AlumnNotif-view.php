
    <?php include "./vistas/inc/navStudent.php"; ?>
    <div class="register-photo">
        <div class="container bg-white">
            <p id="tit-activities"><strong>ACTIVIDADES</strong></p>
            <div class="col-md-12 search-table-col">
                <div class="form-group pull-right col-lg-4"><button class="btn btn-primary btn-block border rounded" type="submit" style="background-color: rgb(245,124,56);">Enviar Mensajes</button><input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda"></div>
                <span
                    class="counter pull-right"></span>
                    <div class="table-responsive table-bordered table table-hover table-bordered results">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-primary bill-header cs">
                                <tr>
                                    <th id="trs-hd" class="col-lg-1">Asunto</th>
                                    <th id="trs-hd" class="col-lg-3">Remitente</th>
                                    <th id="trs-hd" class="col-lg-2">Fecha Límite</th>
                                    <th id="trs-hd" class="col-lg-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Problema con archivo de actividad 1</td>
                                    <td>Tutor(a) Daniel García Orozco.</td>
                                    <td>12/05/2020</td>
                                    <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="icon ion-eye" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                                </tr>
                                <tr>
                                    <td>Problema con tu documentación</td>
                                    <td>Coordinador C. Maribel Castillejos Toledo</td>
                                    <td>18/05/2020</td>
                                    <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="icon ion-eye" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                                </tr>
                                <tr>
                                    <td>Solicitud de cambio validada.</td>
                                    <td>Coordinador A. Iván Ruíz Sánchez</td>
                                    <td>22/05/2020</td>
                                    <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="icon ion-eye" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        <div id="importcsvregis" class="form-container">
            <form method="post">
                <h2 class="text-center" id="remitente"><strong>Mensaje de</strong></h2>
                <div class="form-group">
                    <p><strong>Asunto:</strong></p>
                </div>
                <div class="form-group">
                    <p><strong>Mensaje</strong></p>
                </div>
                <div class="form-group" id="div-acciones"><button class="btn btn-primary" id="btn-save" type="submit" style="background-color: rgb(245,124,56);">CERRAR</button></div>
            </form>
        </div>
    </div>
    <div class="contact-clean">
        <form method="post">
            <h2 class="text-center">Mensaje</h2>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Numero de Control"></div>
            <div class="form-group"><select class="form-control"><option value="12" selected="">Destinatario</option><option value="13">Tutor</option><option value="14">Coordinador de Carrera</option><option value="15">Coordinador de Area</option></select></div>
            <div class="form-group"><input class="form-control is-invalid" type="email" placeholder="Asunto"></div>
            <div class="form-group"><textarea class="form-control" name="message" placeholder="Mensaje" rows="14"></textarea></div>
            <div class="form-group" id="div-msj-action"><button class="btn btn-primary" type="submit">Enviar mensaje</button><button class="btn btn-primary" id="btn-msj-cancel" type="submit">CANCELAR</button></div>
        </form>
    </div>
