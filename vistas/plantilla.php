
<!DOCTYPE html>
    <html lang="es">
    <?php 
        include "../config/APP.php";
    ?>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
            
            <title><?php echo COMPANY;?></title>
            <?php include "inc/styles.php" ?>
        </head>
    
        <body id="page-top">
            <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-primary" id="mainNav">
                <div class="container"><a class="navbar-brand js-scroll-trigger" id="tit_pag" href="#page-top">Tutorias</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false"
                        aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="">Inicio</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#about">Objetivos</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="">Contacto</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="views/login.html">Ingresa</a></li>
                            <li class="nav-item" role="presentation"></li>
                        </ul>
                    </div>
                </div>
            </nav><i class="fa fa-star"></i>
            <header class="masthead text-center text-white d-flex" style="background-image: url('views/assets/img/platica_tutor.jpg');">
                <div class="container my-auto">
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <h1 class="text-uppercase"><strong>Sistema de tutorias del iTISTMO</strong></h1>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-8 mx-auto">
                        <p class="text-faded mb-5"><br>La tutoría es una forma de acompañamiento y apoyo que se brinda al estudiante para procurar un mejor desempeño en su proceso formativo, la cual puede consistir en asesoría, consejería, orientación, dirección de trabajo&nbsp;recepcional,
                            dirección de tesis, acompañamiento en contexto y acompañamiento académico.<br><br></p><a class="btn btn-primary btn-xl js-scroll-trigger" role="button" href="#services">CONOCER MÁS<br></a></div>
                </div>
            </header>
            <?php include "inc/Script.php" ?>
        </body>
    
    </html>