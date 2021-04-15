
<?php

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador De Carrera"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        }else  if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }
}

include "./vistas/inc/navCoordinadorC.php";

?>

<div class="register-photo">
    <div class="form-containe
    r">
        <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST" data-form="update" autocomplete="off">
            <h2 class="text-center"><strong>Perfil</strong></h2>
            <div class="form-group contenedor-foto">
                <img id="imgperf" src="./vistas/assets/img/Icons/perfil.png" />
            </div>
            <div class="form-group"><input type="file" id="actualizar-foto" /></div>
            <div class="form-group">
                <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Nombre" name="name_upd" />
            </div>
            <div class="form-group">
                <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Apellido Paterno" name="apellidop_upd" />
            </div>
            <div class="form-group">
                <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Apellido Materno" name="apellidom_upd" />
            </div>
            <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input class="form-control" name="fecha_upd" type="date" />
      </div>
      <div class="form-group">
        <select class="form-control" name="sexo_upd">
          <option value="" selected="">Sexo</option>
          <option value="1">Hombre</option>
          <option value="2">Mujer</option>
        </select>
      </div>
      <div class="form-group">
        <input
          class="form-control"
          type="tel"
          pattern="[0-9()+]{8,20}"
          placeholder="Número de Telefono"
          name="numero_tel_upd"
        />
      </div>
      <div class="form-group">
        <input
          class="form-control"
          type="text"
          pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}"
          placeholder="Dirección"
          name="direccion_upd"
        />
      </div>
      <div class="form-group">
        <input
          class="form-control"
          type="email"
          name="email"
          placeholder="Email"
          name="email_upd"
        />
      </div>
      <div class="form-group">
        <input
          class="form-control"
          type="text"
          pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}"
          name="carrera_upd"
          placeholder="Area"
        />
      </div>
      <div class="form-group">
        <input
          class="form-control"
          type="text"
          pattern="[0-9-]{8,10}"
          placeholder="Matrícula"
          name="no_ctrl_upd"
        />
      </div>
      <div class="form-group">
        <input
          class="form-control"
          type="password"
          name="password"
          placeholder="Contraseña Nueva"
        />
      </div>
      <div class="form-group">
        <input
          class="form-control"
          type="password"
          name="password-repeat"
          placeholder="Repita contraseña"
        />
      </div>
      <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">
          Actualizar
        </button>
      </div>
    </form>
  </div>
</div>