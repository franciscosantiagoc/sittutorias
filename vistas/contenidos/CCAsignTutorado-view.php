
    <?php include "./vistas/inc/navCoordinadorC.php"; ?>
    <div class="register-photo">
        <div class="container" id="contain">
            <div id="importcsvregis" class="form-container">
                <form id="regisTutcsv" method="post">
                    <h2 class="text-center"><strong>Asignación de Tutorados</strong></h2>
                    <div class="form-group"><input class="form-control" type="text" id="nameinput" placeholder="Nombre" name="name"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellidos"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Carrera"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Numero de Control"></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" >Buscar</button></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" >Asignar Tutorados a docentes (auto)</button></div>
                </form>
            </div>


            <div class="col-md-12 search-table-col">
                <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda"></div><span class="counter pull-right"></span>
                <div class="table-responsive table-bordered table table-hover table-bordered results">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary bill-header cs">
                            <tr>
                                <th id="trs-hd" class="col-lg-1">Nombre del tutorado</th>
                                <th id="trs-hd" class="col-lg-2">Numero de Control</th>
                                <th id="trs-hd" class="col-lg-3">Carrera</th>
                                <th id="trs-hd" class="col-lg-2">Nombre del Tutor</th>
                                <th id="trs-hd" class="col-lg-2">Estado</th>
                                <th id="trs-hd" class="col-lg-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Francisco Santiago de la Cruz</td>
                                <td>16190437</td>
                                <td>Ingenieria en Sistemas</td>
                                <td>Maribel Castillejos Toledo</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>
                            <tr>
                                <td>Luis Alberto Robles Parada</td>
                                <td>16190359&nbsp;<br><br><br></td>
                                <td>Ingenieria en Sistemas<br></td>
                                <td>Sayonara Orozco Alvarez</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>
                            <tr>
                                <td>Juan Carlos Fernandez Piñon</td>
                                <td>16190439</td>
                                <td>Ingenieria en Sistemas<br></td>
                                <td>-<br></td>
                                <td><i class="fa fa-remove"></i></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div id="cont-visdat" class="form-container">
            <form method="post"><img id="imgreg" src="./vistas/assets/img/alum2.jpg">
                <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Paterno"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Materno"></div>
                <div class="form-group"><input class="form-control" type="tel" placeholder="Número de Telefono"></div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Carrera"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Numero de Control"></div>
                <div class="form-group"><select class="form-control"><option value="12">Seleccione Tutor a asignar</option><option value="13">Maribel Castillejos Toledo</option><option value="14">Sayonara Orozco Alvarez</option></select></div>
                <div class="form-group"><button class="btn btn-primary btn-block bg-primary" type="button">Actualizar</button><button class="btn btn-primary btn-block bg-primary" type="button">CANCELAR</button></div>
            </form>



        </div>
    </div>
    
    