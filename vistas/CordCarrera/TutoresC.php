<!DOCTYPE html>
<html>
    <?php 
    include "../../config/APP.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo COMPANY;?></title>
    
    <?php include "../inc/styles.php" ?>
</head>

<body>
    <?php include "../inc/navCoordinadorC2.php"; ?>
    <div class="register-photo">
        <div>
            <div id="importcsvregis" class="form-container">
                <form id="regisTutcsv" method="post">
                    <h2 class="text-center"><strong>Tutores</strong></h2>
                    <div class="form-group"><input class="form-control" type="text" id="nameinput" placeholder="Nombre" name="name"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellidos"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Carrera"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Numero de Control"></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">Buscar</button></div>
                    <div class="form-group"><a href="../Registro.html"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">rEGISTRAR</button></a></div>
                    <div class="form-group"><div class="team-boxed">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Tutores </h2>
        </div>
        <div class="row people">
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="../assets/img/1.jpg" />
                    <h3 class="name">Alberto Ramírez Regalado</h3>
                    <b>Area: </b><p class="description">Sistemas e informática</p>
                    <b>Matrícula: </b><p class="description">25635453</p>
                    <div class="enlaces"><a href="#">Ver</a><a class="edit" href="#">Editar</a></div> 
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="../assets/img/2.jpg" />
                    <h3 class="name">Maribel Castillejos Toledo</h3>
                    <b>Area: </b><p class="description">Sistemas e informática</p>
                    <b>Matrícula: </b><p class="description">25635453</p>
                    <div class="enlaces"><a href="#">Ver</a><a class="edit" href="#">Editar</a></div>  
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="../assets/img/3.jpg" />
                    <h3 class="name">Angel Olivarez Perez</h3>
                    <b>Area: </b><p class="description">Sistemas e informática</p>
                    <b>Matrícula: </b><p class="description">25635453</p>
                    <div class="enlaces"><a href="#">Ver</a><a class="edit" href="#">Editar</a></div>      
                </div>
            </div>
        </div>
    </div>
</div></div>
                </form>
            </div>
            <div id="cont-visdat" class="form-container">
                <form method="post"><img id="imgreg" src="../assets/img/tutores.jpg">
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
    

   
</div>
    <?php include "../inc/Script.php"; ?>
</body>

</html>