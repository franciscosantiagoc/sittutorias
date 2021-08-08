<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModel.php";
} else {
    require_once "./modelos/usuarioModel.php";
}

class tutoresController extends usuarioModel
{
    public function consulta_tutores_controlador()
    {
        $consulta="SELECT SQL_CALC_FOUND_ROWS  t.Matricula,p.Nombre,p.APaterno,p.AMaterno, p.Sexo, p.NTelefono, p.Correo,  a.Nombre as aname, p.Foto  
FROM persona p , trabajador t, areas a  WHERE p.idPersona=t.Persona_idPersona   AND a.idAreas=t.Areas_idAreas AND t.Roll='Docente'  
ORDER BY p.Nombre ";
        $consulta_tutores = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_tutores -> fetchAll();
        return $dat_info;
    }
    public function consulta_t_unico()
    {
        $mat=mainModel::limpiar_cadena($_POST['idInfoTES']);
        $consulta="SELECT SQL_CALC_FOUND_ROWS  t.Matricula,p.Nombre,p.APaterno,p.AMaterno, p.Sexo, p.NTelefono, p.Correo,t.Carrera_idCarrera, a.Nombre as aname,  p.Foto , a.idAreas FROM persona p , trabajador t, areas a WHERE p.idPersona=t.Persona_idPersona  AND a.idAreas=t.Areas_idAreas AND t.Roll='Docente' AND t.Matricula=$mat ORDER BY p.Nombre ";
        $consulta_tutores = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_tutores -> fetchAll();
        return $dat_info;
    }

    public function actualizar_tutores_controlador()
    {
        $matricula = mainModel::limpiar_cadena($_POST['matriculaacte']);
        $nombre = mainModel::limpiar_cadena($_POST['nameCoordinadoracte']);
        $apellido_paterno = mainModel::limpiar_cadena($_POST['apellidopacte']);
        $apellido_materno = mainModel::limpiar_cadena($_POST['apellidomacte']);
        $sexo = mainModel::limpiar_cadena($_POST['sexo_acte']);
        $num_tel = mainModel::limpiar_cadena($_POST['numerotelefonoacte']);
        $email = mainModel::limpiar_cadena($_POST['emailacte']);
        $area = mainModel::limpiar_cadena($_POST['areaacte']);


        if ($matricula == "" || $nombre == "" || $apellido_paterno == "" || $apellido_materno == "" ||   $email == "" ) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Algunos campos estan vacios, por favor rellenelos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'CCTutores"
                  }
               });
            </script>
            ';
            exit();
        }
        if ($sexo!= "M" && $sexo!= "F"  ) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Se ha detectado un error con el sexo seleccionado",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'CCTutores"
                  }
               });
            </script>
            ';
            exit();
        }


        if (mainModel::verificar_datos("[0-9-]{4,10}", $matricula)) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato de la Matrícula no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'CCTutores"
                  }
               });
            </script>
            ';
            exit();
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $nombre)) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del Nombre no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'CCTutores"
                  }
               });
            </script>
            ';
            exit();
        }
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $apellido_paterno)) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del apellido paterno, no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'CCTutores"
                  }
               });
            </script>
            ';
            exit();
        }
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $apellido_materno)) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del apellido materno, no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'CCTutores"
                  }
               });
            </script>
            ';
            exit();
        }




        if (mainModel::verificar_datos("[0-9()+]{8,20}", $num_tel)) {
            echo '
         <script> 
            Swal.fire({
               title: "Ocurrio un error inesperado",
               text: "El formato del numero telefonico, no es válido",
               type: "error",
               confirmButtonText: "Aceptar"
            }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'CCTutores"
                  }
               });
         </script>
         ';
            exit();
        }



        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del correo, no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'CCTutores"
                  }
               });
            </script>
            ';
            exit();
        }

        $consulta_areas = mainModel::ejecutar_consulta_simple("SELECT * FROM areas WHERE idAreas=$area ");

        if ($consulta_areas->rowCount() == 0 ) {

            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Se ha detectado un error con el area seleccionada",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'CCTutores"
                  }
               });
            </script>
            ';
            exit();
        }



        /* echo 'Condicionales terminadas'; */
        $link_img='';
        $name = $_FILES['image_act']['name'];
        //if(isset($_FILES['image_upd']) && $name!=""){
        if($name!=null){

            if(strpos($name, 'jpg')){
                $tipo='.jpg';
            }elseif(strpos($name, 'jpeg')){
                $tipo='.jpeg';
            }else{
                $tipo='.png';
            }
            $temp = $_FILES['image_act']['tmp_name'];
            $link_img='/directory/img-person/'.$nombre.'_'.$tipo;
            $link_img=str_replace(' ', '', $link_img);
            $archivo = '.'.$link_img;
            if (move_uploaded_file($temp, $archivo) ) {
                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                chmod($archivo, 0777);
            }else{
                echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al cargar la imagen al servidor, intente nuevamente",
                  type: "error",
                  confirmButtonText: "Aceptar"
               });
            </script>
            ';
                exit();
            }
        }

        $datos_usuario_upd = [
            "Matricula" => $matricula,
            "Nombre" => $nombre,
            "APaterno" => $apellido_paterno,
            "AMaterno" => $apellido_materno,
            "Sexo" => $sexo,
            "Correo" => $email,
            "NTelefono" => $num_tel,
            "Areas"=> $area

        ];


        /* echo $actualizar_usuario;
        exit(); */
        $actualizar_usuario = usuarioModel::actualizar_tutores_modelo($datos_usuario_upd);

        if($actualizar_usuario->rowCount()==1){//comprobando realizacion de actualizacion
            echo '
            <script> 
               Swal.fire({
                  title: "Usuario Actualizado",
                  text: "Los datos se han actualizado correctamente",
                  type: "success",
                  confirmButtonText: "Aceptar"
               });
            </script>
            ';

        }else{
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al actualizar los datos, intente nuevamente recargando la pagina",
                  type: "error",
                  confirmButtonText: "Aceptar"
               });
            </script>
            ';
        }

    }

}


