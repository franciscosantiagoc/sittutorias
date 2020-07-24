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
        <div id="importcsvregis" class="form-container">
            <div class="form-container">
                <form method="post">
                    <h2 class="text-center"><strong>Información</strong></h2><div class="team-boxed">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">COORDINADORES</h2>
        </div>
        <div class="row people">
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="../assets/img/1.jpg" />
                    <h3 class="name">Alberto Ramírez Regalado</h3>
                    <b>Area: </b><p class="description">Sistemas e informática</p>
                    <b>Matrícula: </b><p class="description">25635453</p>
                    <b>Estado: </b><p class="description">Activo</p>
                    <div class="enlaces"><a href="#">Ver</a><a class="edit" href="#">Editar</a></div> 
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="../assets/img/2.jpg" />
                    <h3 class="name">Maribel Castillejos Toledo</h3>
                    <b>Area: </b><p class="description">Sistemas e informática</p>
                    <b>Matrícula: </b><p class="description">25635453</p>
                    <b>Estado: </b><p class="description">Activo</p>
                    <div class="enlaces"><a href="#">Ver</a><a class="edit" href="#">Editar</a></div>  
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="../assets/img/3.jpg" />
                    <h3 class="name">Angel Olivarez Perez</h3>
                    <b>Area: </b><p class="description">Sistemas e informática</p>
                    <b>Matrícula: </b><p class="description">25635453</p>
                    <b>Estado: </b><p class="description">Inactivo</p>
                    <div class="enlaces"><a href="#">Ver</a><a class="edit" href="#">Editar</a></div>      
                </div>
            </div>
        </div>
    </div>
</div></form>
            </div>
            <div id="dat-coord" class="form-container">
                <form method="post">
                    <div class="form-group">
                        <p><strong>Información de Coordinador de Carrera/Tutor</strong></p>
                    </div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Paterno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Materno"></div>
                    <div class="form-group"><select class="form-control"><option value="" selected="">Sexo</option><option value="1">Hombre</option><option value="2">Mujer</option></select></div>
                    <div class="form-group"><input class="form-control" type="tel" placeholder="Número de Telefono"></div>
                    <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                    <div class="form-group"><select class="form-control"><option value="" selected="">Carrera</option><option value="13">Arquitectura</option><option value="14">Informatica</option><option value="15">Ingenieria Civil</option><option value="16">Ingenieria en Sistemas Computacionales</option></select></div>
                    <div
                        class="form-group"><input class="form-control" type="text" placeholder="Departamento"></div>
            <div class="form-group"><input class="form-control" type="text" placeholder="No. Cubiculo"></div>
            </form>
        </div>
    </div>
    </div>
    <?php include "../inc/Script.php"; ?>
</body>

</html>