
<?php include "./vistas/inc/navStudent.php"; ?>

    <div class="register-photo">

        <div class="form-container">
            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php"  method="post" data-form="update" autocomplete="off">
            <!-- <input type="hidden" name="usuario_id_up" value=" <?php // echo $pagina[1]; ?> "> -->
                <h2 class="text-center"><strong>Perfil</strong></h2>
                <div class="form-group" id="div-img">
                    <img id="imgperf" src="./vistas/assets/img/Icons/perfil.png">
                </div>
                <input type="file" id="actualizar-foto">
                <div class="form-group">
                    <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Nombre" name="name_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Apellido Paterno" name="apellidop_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Apellido Materno" name="apellidom_upd">
                </div>
                <div class="form-group">
                    <label>Fecha de Nacimiento</label>
                    <input class="form-control" name="fecha_upd" type="date">
                </div> 
                <div class="form-group">
                    <select class="form-control" name="sexo_upd">
                        <option value="" selected="">Sexo</option>
                        <option value="1">Hombre</option>
                        <option value="2">Mujer</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control" type="tel" pattern="[0-9()+]{8,20}" placeholder="Número de Telefono" name="numero_tel_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" placeholder="Dirección" name="direccion_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email" name="email_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" name="carrera_upd" placeholder="Carrera">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" pattern="[0-9-]{8,10}" placeholder="Numero de Control" name="no_ctrl_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Contraseña Nueva">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password-repeat" placeholder="Repita contraseña">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" >Actualizar</button>
                </div>
            </form>
        </div>
    </div>
