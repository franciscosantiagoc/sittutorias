
    <?php include "./vistas/inc/navCoordinadorC2.php"; ?>
    <div class="register-photo">
        <div class="form-container">
            <form method="post">
                <h2 class="text-center"><strong>Perfil</strong></h2>
                <div class="form-group contenedor-foto"><img id="imgperf" src="./vistas/assets/img/Icons/perfil.png"></div>
                <div class="form-group"><input type="file" id="actualizar-foto"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Paterno"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Materno"></div>
                <div class="form-group"><label>Fecha de Nacimiento</label><input class="form-control" type="date"></div>
                <div class="form-group"><select class="form-control"><option value="" selected="">Sexo</option><option value="1">Hombre</option><option value="2">Mujer</option></select></div>
                <div class="form-group"><input class="form-control" type="tel" placeholder="Número de Telefono"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Dirección"></div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="email" name="carrera" placeholder="Area"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Matrícula"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Contraseña Nueva"></div>
                <div class="form-group"><input class="form-control" type="password" name="password-repeat" placeholder="Repita contraseña"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">Actualizar</button></div>
            </form>
        </div>
    </div>
    
    