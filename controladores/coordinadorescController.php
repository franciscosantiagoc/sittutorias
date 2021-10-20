<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModel.php";
} else {
    require_once "./modelos/usuarioModel.php";
}

class coordinadorescController extends usuarioModel
{
    public function consulta_coordinadoresc_controlador()
    {
        $consulta="SELECT SQL_CALC_FOUND_ROWS  t.Matricula,p.Nombre,p.APaterno,p.AMaterno, p.Sexo, p.NTelefono, p.Correo, a.Nombre as aname, p.Foto, a.idAreas FROM persona p , trabajador t, areas a WHERE p.idPersona=t.Persona_idPersona  AND a.idAreas=t.Areas_idAreas  AND t.Roll='Coordinador de Carrera'  ORDER BY p.Nombre ";
        $consulta_coordinadoresc = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_coordinadoresc -> fetchAll();

        return $dat_info;
    }
    public function consulta_ccinfo_controlador()
    {
        $matricula=mainModel::limpiar_cadena($_POST['idInfCCar']);
        $consulta="SELECT SQL_CALC_FOUND_ROWS  t.Matricula,p.Nombre,p.APaterno,p.AMaterno, p.Sexo, p.NTelefono, p.Correo, a.Nombre as aname, p.Foto, a.idAreas FROM persona p , trabajador t, areas a WHERE p.idPersona=t.Persona_idPersona AND t.Matricula=$matricula AND a.idAreas=t.Areas_idAreas  AND t.Roll='Coordinador de Carrera'  ORDER BY p.Nombre ";
        $consulta_coordinadoresc = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_coordinadoresc -> fetchAll();

        return $dat_info;
    }

    public function actualizar_ccarrera_controlador()
    {
        $matricular = mainModel::limpiar_cadena($_POST['actmatricularccarrera']);
        $matricula = mainModel::limpiar_cadena($_POST['actmatriculaccarrera']);
        $nombre = mainModel::limpiar_cadena($_POST['actnombreccarrera']);
        $apellido_paterno = mainModel::limpiar_cadena($_POST['actapellidopccarrera']);
        $apellido_materno = mainModel::limpiar_cadena($_POST['actapellidomccarrera']);
        $sexo = mainModel::limpiar_cadena($_POST['actsexoccarrera']);
        $num_tel = mainModel::limpiar_cadena($_POST['acttelccarrera']);
        $email = mainModel::limpiar_cadena($_POST['actemailccarrera']);
        $area = mainModel::limpiar_cadena($_POST['actareaccarrera']);

        if($_SESSION['roll_sti'] == "Admin"){
            $url = "RootCoordinadoresCR";
        }elseif($_SESSION['roll_sti'] == "Coordinador de Area"){
            $url = "CCoordinadores";
        }


        if ($matricula == "" || $nombre == "" || $apellido_paterno == "" || $apellido_materno == "" ||   $email == "" ) {


            echo '
             
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Algunos campos estan vacios, por favor rellenelos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.$url.'"
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
                     window.location="'.SERVERURL.$url.'"
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
                     window.location="'.SERVERURL.$url.'"
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
                     window.location="'.SERVERURL.$url.'"
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
                     window.location="'.SERVERURL.$url.'"
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
                     window.location="'.SERVERURL.$url.'"
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
                     window.location="'.SERVERURL.$url.'"
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
                     window.location="'.SERVERURL.$url.'"
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
                     window.location="'.SERVERURL.$url.'"
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
        $actualizar_usuario = usuarioModel::actualizar_ccarrera_modelo($datos_usuario_upd);

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
                     window.location="'.SERVERURL.$url.'"
                  } // location.reload();
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
                     window.location="'.SERVERURL.$url.'"
                     
                     
                  }
               });
            </script>
            ';
        }

    }

    public function eliminar_ccarrera_controlador(){
        $idmatricula=mainModel::limpiar_cadena($_POST['del_idCCarrera']);
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
                'Titulo'=> "Coordinador de Carrera eliminado",
                'Texto' => "El Coordinador de Carrera se ha eliminado correctamente",
                'Tipo' => "success"
            ];
            echo json_encode($alerta);
            exit();

        }
    }

    // Ocupado en RootCoordinadoresCR
    public function actualiza_coordinador_controlador(){
        if($_SESSION['roll_sti'] == "Admin"){
            $url = "RootCoordinadoresCR";
        }elseif($_SESSION['roll_sti'] == "Coordinador de Area"){
            $url = "CCoordinadores";
        }
        $idmatricula=mainModel::limpiar_cadena($_POST['rootccarrera']);
        $sentencia=mainModel::ejecutar_consulta_simple("SELECT * FROM trabajador t, trabajador t2 WHERE t2.Matricula= $idmatricula AND t.Areas_idAreas=t2.Areas_idAreas AND t.Roll='Coordinador de Carrera'");
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
        $respuesta=mainModel::ejecutar_consulta_simple("UPDATE trabajador t SET t.Roll='Coordinador de Carrera', t.Disponibilidad=0 WHERE t.Matricula = $idmatricula ;"  );

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
            mainModel::ejecutar_consulta_simple("INSERT INTO notificaciones(idNotif,Destinatario,Mensaje,Fecha,Leido) VALUES (DATE_FORMAT(NOW(),'%d%m%y%h%i%S'),$idmatricula,'Haz sido asignado como Coordinador de Area académica',CURDATE(),0);");
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


    // ccarrera trabajador existente
    public function actualiza_coordinadortj_controlador(){
        $idjdepto = mainModel::limpiar_cadena($_SESSION['matricula_sti']);
        $idmatricula=mainModel::limpiar_cadena($_POST['ccarreramat']);

        $sentencia=mainModel::ejecutar_consulta_simple("SELECT * FROM trabajador t, trabajador t2 WHERE t2.Matricula= $idmatricula AND t.Areas_idAreas=t2.Areas_idAreas AND t.Roll='Coordinador de Carrera'");
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
                     window.location="'.SERVERURL.'CCoordinadores"
                  }
               });
            </script>
            ';
            exit();

        }


        $respuesta=mainModel::ejecutar_consulta_simple("UPDATE trabajador t , trabajador t2 SET t.Roll='Coordinador de Carrera', t.Disponibilidad=0 WHERE t.Matricula = $idmatricula AND t2.Matricula=$idjdepto AND t.Areas_idAreas=t2.Areas_idAreas ;"  );

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
                     window.location="'.SERVERURL.'CCoordinadores"
                  }
               });
            </script>
            ';
            exit();

        }else{
            mainModel::ejecutar_consulta_simple("INSERT INTO notificaciones(idNotif,Destinatario,Mensaje,Fecha,Leido) VALUES (DATE_FORMAT(NOW(),'%d%m%y%h%i%S'),$idmatricula,'Haz sido asignado como Coordinador de Area académica',CURDATE(),0);");
            echo '
        
            <script>
            Swal.fire({
                  title: "Asignación exitosa",
                  text: "Se definido el nuevo coordinador",
                  type: "success",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                if(result.value){
                    window.location="'.SERVERURL.'CCoordinadores"
                  }
            });
            </script>
            ';
            exit();

        }
    }


}
