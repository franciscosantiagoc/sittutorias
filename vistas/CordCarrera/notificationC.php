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
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-primary" id="mainNav">
        <div class="container"><a class="navbar-brand js-scroll-trigger" id="tit_pag" href="#page-top">Tutorias</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="Alumno.html">iNICIO</a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Gestion</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="VistaTutores/ActividadesT.html">Gestion de Actividades</a><a class="dropdown-item" role="presentation" href="VistaTutores/Tutorados.html">Gestion de Tutorados</a></div>
                    </li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
            </div>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="div-img-perfil"><img class="rounded-circle" id="img-perfil" src="../assets/img/tutor-daniel.jpg"></a>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item disabled" role="presentation">Daniel García Orozco</a><a class="dropdown-item" role="presentation" href="CordCarrera/edit-perfilC.html">Editar Perfil</a><a class="dropdown-item" role="presentation" href="Cerrar Sesión">Cerrar Sesión</a></div>
            </li>
        </div>
    </nav>
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
                                    <td>Problema con archivo de actividad</td>
                                    <td>Tutor(a) Daniel García Orozco.</td>
                                    <td>12/05/2020</td>
                                    <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="icon ion-eye" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                                </tr>
                                <tr>
                                    <td>Problema con mi Constancia de Finalización de Tutorias</td>
                                    <td>Tutorado. Luis Alberto Robles Parada</td>
                                    <td>18/05/2020</td>
                                    <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="icon ion-eye" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                                </tr>
                                <tr>
                                    <td>Mi Tutor, no me Atiende como se debe</td>
                                    <td>Tutorado. Juan Carlos Fernandez Piñón</td>
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
            <div class="form-group"><input class="form-control is-invalid" type="email" placeholder="Asunto"></div>
            <div class="form-group"><textarea class="form-control" name="message" placeholder="Mensaje" rows="14"></textarea></div>
            <div class="form-group" id="div-msj-action"><button class="btn btn-primary" type="submit">Enviar mensaje</button><button class="btn btn-primary" id="btn-msj-cancel" type="submit">CANCELAR</button></div>
        </form>
    </div>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-primary" id="mainNav">
        <div class="container"><a class="navbar-brand js-scroll-trigger" id="tit_pag" href="#page-top">Tutorias</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item menu" role="presentation"><a class="nav-link js-scroll-trigger" href="Alumno.html">iNICIO</a></li>
                    <li class="nav-item dropdown menu"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Gestion</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="CordCarrera/TutoresC.html">Gestión de Tutores</a><a class="dropdown-item" role="presentation" href="CordCarrera/TutoradosC.html">Gestión de Tutorados</a><a class="dropdown-item"
                                role="presentation" href="CordCarrera/ActividadesC.html">Gestión de Actividades</a></div>
                    </li>
                    <li class="nav-item dropdown menu"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">TUTOR</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="VistaTutores/Tutorados.html">Gestión de Tutorados</a><a class="dropdown-item" role="presentation" href="VistaTutores/ActividadesT.html">Gestión de Actividades</a></div>
                    </li>
                    <li class="nav-item menu" role="presentation"><a class="nav-link js-scroll-trigger" href="">eSTADISTICAS</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" id="div-img-perfil"><img class="rounded-circle" id="img-perfil" src="../assets/img/coor-maribel.jpg"></a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item disabled" role="presentation">Maribel Castillejos Toledo</a><a class="dropdown-item" role="presentation" href="CordCarrera/edit-perfilC.html">Editar Perfil</a><a class="dropdown-item" role="presentation"
                                href="Cerrar Sesión">Cerrar Sesión</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-primary" id="mainNav">
        <div class="container"><a class="navbar-brand js-scroll-trigger" id="tit_pag" href="#page-top">Tutorias</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item menu" role="presentation"><a class="nav-link js-scroll-trigger" href="Alumno.html">iNICIO</a></li>
                    <li class="nav-item dropdown menu"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Gestion</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="CordCarrera/TutoresC.html">Gestión de Tutores</a><a class="dropdown-item" role="presentation" href="CordCarrera/TutoradosC.html">Gestión de Tutorados</a><a class="dropdown-item"
                                role="presentation" href="CordCarrera/ActividadesC.html">Gestión de Actividades</a></div>
                    </li>
                    <li class="nav-item dropdown menu"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">TUTOR</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="VistaTutores/Tutorados.html">Gestión de Tutorados</a><a class="dropdown-item" role="presentation" href="VistaTutores/ActividadesT.html">Gestión de Actividades</a></div>
                    </li>
                    <li class="nav-item menu" role="presentation"><a class="nav-link js-scroll-trigger" href="">eSTADISTICAS</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" id="div-img-perfil"><img class="rounded-circle" id="img-perfil" src="../assets/img/coor-maribel.jpg"></a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item disabled" role="presentation">Maribel Castillejos Toledo</a><a class="dropdown-item" role="presentation" href="CordCarrera/edit-perfilC.html">Editar Perfil</a><a class="dropdown-item" role="presentation"
                                href="Cerrar Sesión">Cerrar Sesión</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <?php include "../inc/Script.php"; ?>
</body>

</html>