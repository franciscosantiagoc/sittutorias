
    <?php include "./vistas/inc/navCoordinadorC2.php"; ?>
    <div class="register-photo">
        <div class="container bg-white">
            <p id="tit-activities"><strong>ACTIVIDADES</strong></p>
            <div class="col-md-12 search-table-col">
                <div class="form-group pull-right col-lg-4"><button class="btn btn-primary btn-block border rounded" type="submit" style="background-color: rgb(245,124,56);">agregar NUEVA ACTIVIDAD</button><input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda"></div>
                <span
                    class="counter pull-right"></span>
                    <div class="table-responsive table-bordered table table-hover table-bordered results">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-primary bill-header cs">
                                <tr>
                                    <th id="trs-hd" class="col-lg-1">Nombre de la Actividad</th>
                                    <th id="trs-hd" class="col-lg-2">Fecha Límite</th>
                                    <th id="trs-hd" class="col-lg-3">Descripción</th>
                                    <th id="trs-hd" class="col-lg-2">Periodo</th>
                                    <th id="trs-hd" class="col-lg-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Linea de vida</td>
                                    <td>12/05/2020</td>
                                    <td>Realiza Linea de tiempo con situaciones...</td>
                                    <td>1er Semestre</td>
                                    <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                                </tr>
                                <tr>
                                    <td>Análisis Foda</td>
                                    <td>18/05/2020</td>
                                    <td>Realiza Linea de tiempo con situaciones...</td>
                                    <td>2do Semestre</td>
                                    <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                                </tr>
                                <tr>
                                    <td>Entrevista</td>
                                    <td>22/05/2020</td>
                                    <td>Realiza Linea de tiempo con situaciones...</td>
                                    <td>3er Semestre</td>
                                    <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>



        <div id="importcsvregis" class="form-container">
            <form method="post">
                <h2 class="text-center"><strong>Editar Actividad</strong></h2>
                <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Fecha Limite"></div>
                <div class="form-group"><select class="form-control"><option value="12">1er Semestre</option><option value="13">2do Semestre</option><option value="14">3er Semestre</option><option value="4">4to Smestre</option><option value="5">5to Semestre</option><option value="">6to Semestre</option><option value="" selected="">Semestre - Periodo a realizar</option></select></div>
                <div
                    class="form-group"><input class="form-control" type="text" placeholder="Descripcion"></div>



        <div class="form-group file-select"><label>Archivo</label><input type="file" id="form-file" accept="image/*"></div>
        <div class="form-group" id="div-acciones"><button class="btn btn-primary" id="btn-save" type="submit" style="background-color: rgb(245,124,56);">GUARDAR</button><button class="btn btn-primary" id="btn-cancel" type="submit" style="background-color: rgb(245,124,56);">CANCELAR</button></div>
        </form>
    </div>
    </div>
    