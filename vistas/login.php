<!DOCTYPE html>
<html style="height: 740px;">
<?php 
    include "../config/APP.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo COMPANY;?></title>
    
    <?php include "inc/styles.php" ?>
</head>

<body>
    <?php include "inc/navInicial.php"; ?>
    
    <div class="login-clean" style="background-image: url(&quot;assets/img/entrada-tec.png&quot;);background-size: 100% 100%;background-repeat: no-repeat;height: 900px;">
        <form method="post" style="margin-top: 120px;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-contact-outline" style="color: rgb(238,75,40);"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="numcont" placeholder="Num Control"></div>
            <div class="form-group"><input class="form-control" type="password" name="pass" placeholder="Contraseña"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(238,75,40);">ACCEDER</button></div><a class="forgot" href="#">Olvidaste tu contraseña?</a></form>
    </div>
    <footer style="margin-top: 164px;">
        <p class="text-center" id="text_foot" style="margin: -110px 0px;"><em>Sistema creado por alumnos de Ingenieria en Sistemas Computacionales.</em><br></p>
    </footer>
    <?php include "inc/Script.php" ?>
</body>

</html>