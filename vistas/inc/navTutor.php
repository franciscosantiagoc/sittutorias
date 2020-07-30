<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-primary" id="mainNav" xmlns="http://www.w3.org/1999/html">
    <div class="container"><a class="navbar-brand js-scroll-trigger" id="tit_pag" href="#page-top">Tutorias</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
                                
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item menu" role="presentation">
                    <a class="nav-link js-scroll-trigger" href="<?php echo SERVERURL; ?>MenuTutor">Inicio</a></li>
                <li class="nav-item dropdown menu">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Gestion</a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="TutorAct">Gestion de Actividades</a><a class="dropdown-item" role="presentation" href="TutorTutorados">Gestion de Tutorados</a></div>
                </li>
                <li class="nav-item menu" role="presentation">
                    <a class="nav-link js-scroll-trigger" href="<?php echo SERVERURL; ?>TutorInfo">Contacto</a></li>
                <li class="nav-item menu" role="presentation">


                <li class="dropdown">
                    <a class="dropdown"  aria-expanded="false" id="div-img-perfil" href="<?php echo SERVERURL; ?>TutorNotif">
                        <img class="rounded-circle" id="img-perfil" src="vistas/assets/img/Icons/notification2.png" >

                    </a>

                </li>

                <li class="dropdown menu"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="div-img-perfil">
                    <img class="rounded-circle" id="img-perfil" src="vistas/assets/img/tutor-daniel.jpg"></a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item disabled" role="presentation">Daniel García Orozco</a>
                        <a class="dropdown-item" role="presentation" href="TutorEditPerfil">Editar Perfil</a>
                        <a class="dropdown-item" role="presentation" href="login">Cerrar Sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</nav>