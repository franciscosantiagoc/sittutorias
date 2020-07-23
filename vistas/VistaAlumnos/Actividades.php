<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo COMPANY;?></title>
    <?php include "../inc/styles.php"; ?>

</head>

<body>
    <?php include "../inc/navStudent.php"; ?>
    <div class="register-photo">
        <div class="container" id="contain">
            <div class="col-md-12 search-table-col">
                <p id="tit-activities"><strong>ACTIVIDADES ASIGNADAS</strong></p>
                <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda"></div><span class="counter pull-right"></span>
                <div class="table-responsive table-bordered table table-hover table-bordered results">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary bill-header cs">
                            <tr>
                                <th id="trs-hd" class="col-lg-1">Nombre de la Actividad</th>
                                <th id="trs-hd" class="col-lg-2">Fecha Límite</th>
                                <th id="trs-hd" class="col-lg-3"><strong>Fecha de entrega</strong><br></th>
                                <th id="trs-hd" class="col-lg-2"><br><strong>Estado</strong><br></th>
                                <th id="trs-hd" class="col-lg-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Linea de vida</td>
                                <td>12/05/2020</td>
                                <td><br>11/05/2020<br></td>
                                <td><i class="fa fa-remove"></i></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>
                            <tr>
                                <td>Análisis Foda</td>
                                <td>18/05/2020</td>
                                <td>-</td>
                                <td><i class="fa fa-check"></i><br><br></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>
                            <tr>
                                <td>Entrevista</td>
                                <td>10/06/2020</td>
                                <td>-</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="importcsvregis" class="form-container">
            <form method="post">
                <h2 class="text-center"><strong>Editar Actividad</strong></h2>
                <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Fecha Limite"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Fecha de Entrega"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Descripcion"></div>
                <div class="form-group"><label>Archivo</label><input type="file" id="form-file"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">Enviar actividad</button></div>
            </form>
        </div>
    </div>
    <?php include "../inc/Script.php"; ?>
</body>

</html>