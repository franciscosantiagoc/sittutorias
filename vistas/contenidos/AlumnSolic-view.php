
    <?php include "../inc/navStudent.php"; ?>
    <div class="register-photo">
        <div class="container" id="cont-sol">
            <div id="sol-cambio" class="form-container">
                <form method="post">
                    <p id="tit-activities"><strong>Solicitudes</strong></p>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Paterno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Materno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Carrera"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Numero de Control"></div>
                    <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                    <div class="form-group"><select class="form-control"><option value="" selected="">Seleccione Tutor</option><option value="13">Maribel Castillejos Toledo</option><option value="14">Sayonara Orozco Álvarez</option><option value="15">Alberto Martínez Regalado</option><option value="16">Luis Ángel Olivarez Pérez</option></select></div>
                    <div
                        class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">Enviar solicitud</button></div>
            </form>
        </div>
        <div id="sol-cons" class="form-container">
            <form method="post">
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">Solicitar constancia</button></div>
            </form>
        </div>
    </div>
    </div>
