
    <?php include "./vistas/inc/navCoordinadorC.php"; ?>
    <div class="register-photo">
        <div class="container" id="contain">
            <p id="tit-activities"><strong>Solicitudes</strong></p>
            <div class="col-md-12 search-table-col">
                <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda"></div><span class="counter pull-right"></span>
                <div class="table-responsive table-bordered table table-hover table-bordered results">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary bill-header cs">


                            <tr>
                                <th id="trs-hd" class="col-lg-1"><br><strong>Nombre del Alumno</strong><br></th>
                                <th id="trs-hd" class="col-lg-2"><br><strong>Número de control</strong><br></th>
                                <th id="trs-hd" class="col-lg-3"><br><strong>Tipo solicitud</strong><br></th>
                                <th id="trs-hd" class="col-lg-2"><br><strong>Fecha solicitud</strong><br></th>
                                <th id="trs-hd" class="col-lg-2"><br><strong>Acciones</strong><br><br></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><br>Francisco Santiago de la Cruz<br></td>
                                <td><br>16190437<br></td>
                                <td><br>Constancia de Finalización<br></td>
                                <td><br>06/06/2020<br></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>


                            <tr>
                                <td><br>Luis Alberto Robles Parada<br></td>
                                <td><br>16190347<br></td>
                                <td><br>Cambio de Tutor<br></td>
                                <td><br>05/05/2020<br></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>


                            <tr>
                                <td><br>Juan Carlos Hernandez Piñon<br></td>
                                <td><br>16190425<br></td>
                                <td><br>Constancia de Finalización<br></td>
                                <td><br>15/05/2020<br></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="container" id="cont-sol">
            <div id="view-cambio" class="form-container">
                <form method="post">
                    <p id="tit-activities"><strong>Cambio Tutor</strong></p><img id="imgreg" src="./vistas/assets/img/alum3.jpg">
                    <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Paterno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Materno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Carrera"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Número de Control"></div>
                    <div class="form-group"><select class="form-control"><option value="" selected="">Seleccione Tutor</option><option value="13">Maribel Castillejos Toledo</option><option value="14">Sayonara Orozco Álvarez</option><option value="15">Alberto Martínez Regalado</option><option value="16">Luis Ángel Olivarez Pérez</option></select></div>
                    <div
                        class="form-group"><select class="form-control"><option value="" selected="">Tipo Solicitud</option><option value="13">Maribel Castillejos Toledo</option><option value="14">Sayonara Orozco Álvarez</option><option value="15">Alberto Martínez Regalado</option><option value="16">Luis Ángel Olivarez Pérez</option></select></div>
            <div
                class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">VALIDAR</button><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">CANCELAR</button></div>
        </form>
    </div>
    </div>
    </div>
    