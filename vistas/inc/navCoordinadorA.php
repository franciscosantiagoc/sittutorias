
<nav class="navbar navbar-light navbar-expand-md navbar-side" id="nav-menu">
    <div class="container-fluid">
        <div id="div-mobilemenu"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" id="icon-menu"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div><a class="navbar-brand d-sm-flex" href="" style="color: #ffffffff;">Sistema de Tutorias Itistmo</a>
        <div
            class="collapse navbar-collapse text-center d-md-flex justify-content-md-end" id="navcol-1">
            <ul class="nav navbar-nav">
                <li class="nav-item menu" role="presentation"><a class="nav-link active" href="<?php echo SERVERURL;?>MenuCordArea" style="color: #ffffffff;">Inicio</a></li>
                <li class="nav-item dropdown menu"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: #ffffffff;">Gestión</a>
                    <div class="dropdown-menu" role="menu" style="background-color: #fffff;"><a class="dropdown-item" role="presentation" href="<?php echo SERVERURL;?>CCoordinadores">Gestión de Coordinadores</a>
                    <a class="dropdown-item" role="presentation" href="<?php echo SERVERURL;?>CCTutores">Gestión de Tutores</a>
                    <a class="dropdown-item" role="presentation" href="<?php echo SERVERURL;?>CCTutorados">Gestión de Tutorados</a>
                        <a
                            class="dropdown-item" role="presentation" href="<?php echo SERVERURL;?>CCSolicitudes">Gestión de Solicitudes</a>
                            <a class="dropdown-item" role="presentation" href="<?php echo SERVERURL;?>CCActividades">Gestión de Actividades</a></div>
                </li>
                <li class="nav-item menu" role="presentation"><a class="nav-link" href="<?php echo SERVERURL;?>CCEstadisticos" style="color: #ffffffff;">Estadísticas</a></li>
                <li class="nav-item menu" role="presentation"><a class="nav-link" href="<?php echo SERVERURL;?>CCNotification" style="color: #ffffffff;"><i class="material-icons">notifications_active</i></a></li>
                <li class="nav-item dropdown menu"><a class="dropdown-toggle nav-link menu" data-toggle="dropdown" aria-expanded="false" href="#" style="color: #ffffffff;"><img class="rounded-circle" id="img-perfil" src="vistas/assets/img/coor-ivan.jpg"></a>
                    <div class="dropdown-menu" role="menu"
                        id="menu-perfil"><a class="dropdown-item disabled" role="presentation" href="#">Iván Ruiz Sánchéz</a>
                        <a class="dropdown-item" role="presentation" href="<?php echo SERVERURL;?>CCEdit-perfil">Editar Perfil</a>
                        <a class="dropdown-item" role="presentation" href="<?php echo SERVERURL;?>login">Cerrar Sesión</a></div>
                </li>
            </ul>
    </div>
    </div>
</nav>
<?php include "./vistas/inc/alert-notificacion.php"; ?>