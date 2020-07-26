
<?php include "../inc/navTutor.php"; ?>
    <div class="register-photo">
        <div class="container" id="contain">
            <div class="col-md-12 search-table-col">
                <h2 class="text-center"><strong>Actividades</strong></h2>
                <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda"></div><span class="counter pull-right"></span>
                <div class="table-responsive table-bordered table table-hover table-bordered results">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary bill-header cs">
                            <tr>
                                <th id="trs-hd" class="col-lg-1"><br><strong>Nombre</strong><br></th>
                                <th id="trs-hd" class="col-lg-2"><br><strong>Descripción</strong><br></th>
                                <th id="trs-hd" class="col-lg-3"><br><strong>Fecha limite</strong><br></th>
                                <th id="trs-hd" class="col-lg-2"><br><br><strong>Fecha de entrega</strong><br></th>
                                <th id="trs-hd" class="col-lg-2"><br><br><strong>Nombre del Alumno</strong><br></th>
                                <th id="trs-hd" class="col-lg-2"><br><br>Estado</th>
                                <th id="trs-hd" class="col-lg-2"><br><strong>Acciones</strong><br></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><br>Linea de Vida<br></td>
                                <td><br>Realiza una linea de tiempo<br></td>
                                <td><br>15/04/2020<br></td>
                                <td><br>14/04/2020<br></td>
                                <td><br>Luis Alberto Robles Parada<br></td>
                                <td><i class="fa fa-close"></i></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="material-icons" style="font-size: 15px;">remove_red_eye</i></button></td>
                            </tr>
                            <tr>
                                <td><br>Linea de Vida<br></td>
                                <td><br>Realiza una linea de tiempo<br></td>
                                <td><br>15/04/2020<br></td>
                                <td><br>14/04/2020<br></td>
                                <td><br>Francisco Santiago de la Cruz<br></td>
                                <td><i class="fa fa-check"></i></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="material-icons" style="font-size: 15px;">remove_red_eye</i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="cont-visdat" class="form-container">
            <form method="post">
                <div class="form-group form-container" id="form-options"><button class="btn btn-primary buttons" type="button">ValidaR</button><button class="btn btn-primary buttons" type="button">RECHAZAR</button><button class="btn btn-primary buttons" type="button">IMPRIMIR</button></div>
            </form>
        </div>
    </div>
