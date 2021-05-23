
<?php 

/* if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Docente"){
        if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }

} */
include "./vistas/inc/navTutor.php"; 

?>
    <div class="register-photo">
        <div class="form-container">

        <?php 
            require_once './controladores/usuarioController.php';
            $ins_user = new usuarioController();
        ?>
            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php"  method="POST" data-form="update" autocomplete="off">
                <h2 class="text-center"><strong>Perfil</strong></h2>
                <div class="form-group" id="div-img">
                    <img id="img-prev" src="<?php echo $_SESSION['imgperfil_sti']; ?>">
                </div>
                <div class="form-group">
                    <input id="select_image" type="file" name="img_perfil_up" accept="image/png, .jpeg, .jpg">
                </div>
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
                    <label>Fecha de Nacimiento</label><input class="form-control" name="fecha_upd" type="date">
                </div>
                <div class="form-group">
                    <select class="form-control" name="sexo_upd">
                        <option value="" selected="">Sexo</option>
                        <option value="1">Hombre</option>
                        <option value="2">Mujer</option>
                    </select>
                 </div>
                <div class="form-group">
                    <input class="form-control" pattern="[0-9()+]{8,20}" type="tel" placeholder="Número de Telefono" name="numero_tel_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" placeholder="Dirección" name="direccion_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email" name="email_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" name="carrera_upd" placeholder="Carrera">
                </div>
                <div class="form-group">
                    <input class="form-control" type="hidden" pattern="[0-9-]{8,10}" placeholder="Numero de Control" name="no_ctrl_upd">
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
    <script>
        const $selecfile = document.querySelector("#select_image"),
        $imagenPrevisualizacion = document.querySelector("#img-prev");

        $selecfile.addEventListener("change", () => {
            Swal.fire({
                  title: "Información",
                  text: "La foto seleccionada debe ser cuadrada y su rostro debe verse claro, no use imagenes mayores a 4mb",
                  type: "info",
                  confirmButtonText: "Aceptar"
            });
            const archivos = $selecfile.files;
            const imagen = archivos[0];
            if(imagen["type"]!="image/jpeg" && imagen["type"]!="image/jpeg"){
                 Swal.fire({
                    title: "Advertencia",
                    text: "El formato de la foto no es admitida, solo se admiten JPG o PNG",
                    type: "error",
                    confirmButtonText: "Aceptar"
                });
            }else if(imagen["size"] > 2000000){
                Swal.fire({
                    title: "Advertencia",
                    text: "El peso de la imagen no debe superar los 2MB!",
                    type: "error",
                    confirmButtonText: "Aceptar"
                });

            }else{
                const objectURL = URL.createObjectURL(imagen);
                $imagenPrevisualizacion.src = objectURL;
            }
            
        });
    </script>
    

