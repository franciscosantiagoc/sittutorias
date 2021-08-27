
<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Docente"){
        include "./vistas/inc/navTutor.php";
    }else if($_SESSION['roll_sti'] == "Tutorado"){
        include "./vistas/inc/navStudent.php";
    }else  if($_SESSION['roll_sti'] == "Coordinador de Carrera"){
        include "./vistas/inc/navCoordinadorC.php";
    }else  if($_SESSION['roll_sti'] == "Coordinador de Area"){
        include "./vistas/inc/navCoordinadorA.php";
    }else  if($_SESSION['roll_sti'] == "Admin"){
        include "./vistas/inc/navRoot.php";
    }
    

} 


?>
    <div class="register-photo">
        <div class="form-container">

        <?php 
            require_once './controladores/usuarioController.php';
            $ins_usuario = new usuarioController();
            if(isset($_SESSION['matricula_sti'])){
                $tabla="trabajador";
                $condicion="Matricula='".$_SESSION['matricula_sti']."'";
            }else if(isset($_SESSION['NControl_sti'])){
                $tabla="tutorado";
                $condicion="NControl='".$_SESSION['NControl_sti']."'";
            }
            $dat_info = $ins_usuario->datos_usuario_controlador("Unico",$tabla,$condicion); /**/
            /* echo $dat_info ->rowCount(); */
            $row=$dat_info->fetch();
        ?>
        <!-- class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php"  method="POST" data-form="update" -->
            <form class="" action=""  method="post" autocomplete="off" enctype="multipart/form-data">
                <h2 class="text-center"><strong>Perfil</strong></h2>
                <div class="form-group" id="div-img">
                    <img id="img-prev" src="<?php echo $_SESSION['imgperfil_sti']; ?>">
                </div>
                <div class="form-group">
                    <input name="image_upd" type="file" id="select_image" accept="image/png, .jpeg, .jpg" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" value="<?php echo $row['Nombre'];?>" placeholder="Nombre" name="name_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" value="<?php echo $row['Apaterno'];?>" placeholder="Apellido Paterno" name="apellidop_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" value="<?php echo $row['Amaterno'];?>" placeholder="Apellido Materno" name="apellidom_upd">
                </div>
                <div class="form-group">
                    <label>Sexo</label>
                    <select name="sexo_upd">
                      <option value="M" <?php if($row['Sexo']=='M') echo 'Selected=""';?> >Hombre</option>
                      <option value="F" <?php if($row['Sexo']=='F') echo 'Selected=""';?>>Mujer</option>    
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control" pattern="[0-9()+]{8,20}" type="tel" value="<?php echo $row['NTelefono'];?>" placeholder="Número de Telefono" name="numtel_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" value="<?php echo $row['Direccion'];?>" placeholder="Dirección" name="direc_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" value="<?php echo $row['Correo'];?>" placeholder="Email" name="email_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="hidden" pattern="[0-9-]{8,10}" value="<?php if(isset($_SESSION['NControl_sti'])) echo $_SESSION['NControl_sti']; else echo  $_SESSION['matricula_sti'];?>" name="no_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="hidden" pattern="[0-9-]{8,10}" value="<?php echo $_SESSION['id_sti'];?>" name="noUs_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Ingrese su contraseña para realizar cambios" name="pass_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Contraseña Nueva" name="npass_upd">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Repita contraseña" name="rnpass_upd">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" >Actualizar</button>
                </div>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['name_upd'])){
             require_once "./controladores/usuarioController.php";

            $ins_usuario= new usuarioController(); 

            echo $ins_usuario->actualizar_usuario_controlador();
        }
    ?>


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
    

