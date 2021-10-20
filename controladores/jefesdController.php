<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModel.php";
} else {
    require_once "./modelos/usuarioModel.php";
}

class jefesdController extends usuarioModel
{
    public function consulta_jefesd_controlador()
    {
        $consulta="SELECT SQL_CALC_FOUND_ROWS  t.Matricula,p.Nombre,p.APaterno,p.AMaterno, p.Sexo, p.NTelefono, p.Correo,  a.Nombre as aname, p.Foto, a.idAreas FROM persona p , trabajador t, areas a  WHERE p.idPersona=t.Persona_idPersona AND a.idAreas=t.Areas_idAreas  AND t.Roll='Coordinador de Area'   ORDER BY p.Nombre ";
        $consulta_jefesd = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_jefesd -> fetchAll();
        return $dat_info;


    }

    public function actualizar_jdepto_controlador()
    {
        $matricular = mainModel::limpiar_cadena($_POST['actmatricularjdepto']);
        $matricula = mainModel::limpiar_cadena($_POST['actmatriculajepto']);
        $nombre = mainModel::limpiar_cadena($_POST['actnombrejdepto']);
        $apellido_paterno = mainModel::limpiar_cadena($_POST['actapellidopjdepto']);
        $apellido_materno = mainModel::limpiar_cadena($_POST['actapellidomjdepto']);
        $sexo = mainModel::limpiar_cadena($_POST['actsexojdepto']);
        $num_tel = mainModel::limpiar_cadena($_POST['actteljdepto']);
        $email = mainModel::limpiar_cadena($_POST['actemailjdepto']);
        $area = mainModel::limpiar_cadena($_POST['actareajdepto']);




        if ($matricula == "" || $nombre == "" || $apellido_paterno == "" || $apellido_materno == "" ||   $email == "" ) {
            echo '
             
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Algunos campos estan vacios, por favor rellenelos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootCoordinadoresAR"
                  }
               });
            
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
                     window.location="'.SERVERURL.'RootCoordinadoresAR"
                  }
               });
            </script>
            ';
            exit();
        }


        if (mainModel::verificar_datos("[0-9-]{4,8}", $matricula)) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato de la Matrícula no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootCoordinadoresAR"
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
                     window.location="'.SERVERURL.'RootCoordinadoresAR"
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
                     window.location="'.SERVERURL.'RootCoordinadoresAR"
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
                     window.location="'.SERVERURL.'RootCoordinadoresAR"
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
                     window.location="'.SERVERURL.'RootCoordinadoresAR"
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
                     window.location="'.SERVERURL.'RootCoordinadoresAR"
                  }
               });
            </script>
            ';
            exit();
        }

        $consulta_areas = mainModel::ejecutar_consulta_simple("SELECT * FROM areas WHERE idAreas=$area");

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
                     window.location="'.SERVERURL.'RootCoordinadoresAR"
                  }
               });
            </script>
            ';
            exit();
        }

        $datos_usuario_upd = [
            "Matricular" =>$matricular,
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
        $actualizar_usuario = usuarioModel::actualizar_jdepto_modelo($datos_usuario_upd);

        if($actualizar_usuario->rowCount()==1){//comprobando realizacion de actualizacion
            echo '
            <script> 
               Swal.fire({
                  title: "Usuario Actualizado",
                  text: "Los datos se han actualizado correctamente",
                  type: "success",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootCoordinadoresAR"
                  }
               });
            </script>
            ';

        }else{
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al actualizar los datos, modifique los datos para continuar",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootCoordinadoresAR"
                  }
               });
            </script>
            ';
        }

    }

    // RootCoordinadoresAR trabajador existente
    public function asignar_jdeptote_controlador(){
        if($_SESSION['roll_sti'] == "Admin"){
            $url = "RootCoordinadoresAR";
        }elseif($_SESSION['roll_sti'] == "Coordinador de Area"){
            $url = "CCoordinadores";
        }
        $idmatricula=mainModel::limpiar_cadena($_POST['rootjdepto']);
        $sentencia=mainModel::ejecutar_consulta_simple("SELECT * FROM trabajador t, trabajador t2 WHERE t2.Matricula= $idmatricula AND t.Areas_idAreas=t2.Areas_idAreas AND t.Roll='Coordinador de Area'");
        if($sentencia->rowCount() != 0 ){
            echo '
            <script>
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al asignar al nuevo coordinador, ya existe uno en el area ",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.$url.'"
                  }
               });
            </script>
            ';
            exit();

        }
        $respuesta=mainModel::ejecutar_consulta_simple("UPDATE trabajador t SET t.Roll='Coordinador de Area', t.Disponibilidad=0 WHERE t.Matricula = $idmatricula ;"  );

        if($respuesta->rowCount() == 0){


            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al asignar al nuevo coordinador",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.$url.'"
                  }
               });
            </script>
            ';
            exit();

        }else{
            mainModel::ejecutar_consulta_simple("INSERT INTO notificaciones(idNotif,Destinatario,Mensaje,Fecha,Leido) VALUES (DATE_FORMAT(NOW(),'%d%m%y%h%i%S'),$idmatricula,'Haz sido asignado como jefe de departamento',CURDATE(),0);");
            echo '
        
            <script>
            Swal.fire({
                  title: "Asignación exitosa",
                  text: "Se definido el nuevo coordinador",
                  type: "success",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                if(result.value){
                    window.location="'.SERVERURL.$url.'"
                  }
            });
            </script>
            ';
            exit();

        }
    }

    public function eliminar_jdepto_controlador(){
        $idmatricula=mainModel::limpiar_cadena($_POST['del_idJDepto']);
        $respuesta=mainModel::ejecutar_consulta_simple("UPDATE trabajador t SET t.Roll='Docente', t.Disponibilidad=1 WHERE t.Matricula = $idmatricula ;"  );
        if($respuesta->rowCount() == 0){
            $alerta=[
                'Titulo'=> "Error",
                'Texto' => "Error al eliminar, ",
                'Tipo' => "error"
            ];
            echo json_encode($alerta);
            exit();

        }else{
            $alerta=[
                'Titulo'=> "Jefe de departamento eliminado",
                'Texto' => "El jefe de departamento se ha eliminado correctamente",
                'Tipo' => "success"
            ];
            echo json_encode($alerta);
            exit();

        }
    }

}