    <?php include "./vistas/inc/navInicial.php"; ?>
    
    <div class="login-clean" style="background-image: url(<?php echo SERVERURL; ?>vistas/assets/img/entrada-tec.png);background-size: 100% 100%;background-repeat: no-repeat;height: 900px;">
        <form method="post" style="margin-top: 120px;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-contact-outline" style="color: rgb(238,75,40);"></i></div>
            <div class="form-group">
                <input class="form-control" type="email" name="numcont" placeholder="Num Control">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="pass" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(238,75,40);">ACCEDER</button>
            </div>
            <a class="forgot" href="#">Olvidaste tu contraseña?</a></form>
    </div>
