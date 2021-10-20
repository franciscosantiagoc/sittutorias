<?php
if ($peticionAjax) {
   require_once "../modelos/usuarioModel.php";
} else {
   require_once "./modelos/usuarioModel.php";
}

class usuarioController extends usuarioModel
{
   /*-------------- Controlador agregar usuario --------------*/

   /* == controlador actualizar trabajador */
   public function registro_usuario_controlador()
   {

      $select_usuario = mainModel::limpiar_cadena($_POST['select_usertype']);
      $nombre = mainModel::limpiar_cadena($_POST['name_reg']);
      $apellido_paterno = mainModel::limpiar_cadena($_POST['apellidop_reg']);
      $apellido_materno = mainModel::limpiar_cadena($_POST['apellidom_reg']);
      $fecha_nac = mainModel::limpiar_cadena($_POST['fecha_reg']);
      $sexo = mainModel::limpiar_cadena($_POST['sexo_reg']);
      $numero_telefono = mainModel::limpiar_cadena($_POST['numero_tel_reg']);
      $direccion = mainModel::limpiar_cadena($_POST['direccion_reg']);
      $email = mainModel::limpiar_cadena($_POST['email_reg']);
      $carrera = mainModel::limpiar_cadena($_POST['carrera_reg']);
      $noctrl = mainModel::limpiar_cadena($_POST['no_ctrl_reg']);
      $pass = mainModel::encryption($noctrl);
      $gener = mainModel::limpiar_cadena($_POST['gen_reg']);
      $foto='/directory/img-person/default.png';

      /* == comprobar campos vacíos ==*/

      if ($nombre == "" || $apellido_paterno == "" || $apellido_materno == "" || $direccion == ""  || $noctrl == "" || $carrera=="" || $fecha_nac=="") {

         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Se han detectado campos vacios",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro";
                  }
               });
            </script>
            ';
        exit();
      }
      if($select_usuario!="13" && $select_usuario!="14" && $select_usuario!="15" && $select_usuario!="16"){
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al seleccionar el tipo de usuario, recargue la pagina para continuar",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
        exit();
      }
      /* == Verificando integridad de los datos ==*/

      if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $nombre)) {
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El NOMBRE no coincide con el formato solicitado",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
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
                  text: "El APELLIDO PATERNO no coincide con el formato solicitado",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
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
                  text: "El APELLIDO MATERNO no coincide con el formato solicitado",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
         exit();
      }
      if ($sexo!="M" && $sexo!="F") {
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Ha ocurrido un error, recargue la pagina para continuar,sexo",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
         exit();
      }
      if ($numero_telefono != "") {
         if (mainModel::verificar_datos("[0-9()+]{8,20}", $numero_telefono)) {
            echo '
               <script> 
                  Swal.fire({
                     title: "Ocurrio un error inesperado",
                     text: "El TELÉFONO no coincide con el formato solicitado",
                     type: "error",
                     confirmButtonText: "Aceptar"
                  }).then((result)=>{
                     if(result.value){
                        window.location="'.SERVERURL.'Registro"
                     }
                  });
               </script>
               ';
            exit();
         }
      }

      if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}", $direccion)) {
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "La DIRECCION no coincide con el formato solicitado",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
         exit();
      }
      /*== Comprobando email ==*/
      if ($email != "") {
         if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $check_email = mainModel::ejecutar_consulta_simple("SELECT Correo FROM persona WHERE Correo='$email'");
            if ($check_email->rowCount() > 0) {

               echo '
                     <script> 
                        Swal.fire({
                           title: "Ocurrio un error inesperado",
                           text: "El CORREO ya se encuentra registrado en el sistema, intente con otro",
                           type: "error",
                           confirmButtonText: "Aceptar"
                        }).then((result)=>{
                           if(result.value){
                              window.location="'.SERVERURL.'Registro"
                           }
                        });
                     </script>
                     ';
               exit();
            }
         } else {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Ha ingresado un CORREO no válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
            exit();
         }
      } else {
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Ingrese un correo válido para continuar",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
        exit();
      }
      

      /*== Comprobando area/carrera ==*/
      if($select_usuario=="16"){
         $dbtable="carrera";
         $dbcolum="idCarrera";
      }else{
         $dbtable="areas";
         $dbcolum="idAreas";
      }
      $check_email = mainModel::ejecutar_consulta_simple("SELECT * FROM $dbtable WHERE $dbcolum=$carrera");
         if ($check_email->rowCount() == 0) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El area / carrera seleccionada no existe",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
         exit();
         }

      if (mainModel::verificar_datos("[0-9-]{4,10}", $noctrl)) {
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El NControl/Matricula no coincide con el formato solicitado",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
         exit();
      }

      /* == comprbando No. Ctrl. == */
      if($select_usuario==16){//tutorado
         $columdb = "NControl";
         $tabledb = "tutorado";

      }elseif($select_usuario>=13 && $select_usuario<=15){
           $columdb="Matricula";
           $tabledb="trabajador";
      }else{
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "ha ocurrido un error al registrar, recargue la pagina para continuar",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
        exit();
      }


      $condicion = "'$columdb' = '$noctrl'";
       $check_no_ctrl = mainModel::ejecutar_consulta_simple("SELECT $columdb FROM $tabledb WHERE $condicion" ); 
      if ($check_no_ctrl->rowCount() > 0) {
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El NUMERO DE CONTROL ya se encuentra registrado en el sistema",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
        exit();
      }
      $roll='';   
      if($select_usuario=="13") $roll="Coordinador de Area";
      if($select_usuario=="14") $roll="Coordinador de Carrera";
      if($select_usuario=="15") $roll="Docente";

      $datos_usuario_reg = [
         "Nombre" => $nombre,
         "APaterno" => $apellido_paterno,
         "AMaterno" => $apellido_materno,
         "FechaNac" => $fecha_nac,
         "Sexo" => $sexo,
         "Correo" => $email,
         "NTelefono" => $numero_telefono,
         "Direccion" => $direccion,
         "Foto"=>$foto,

         "NoUser" => $noctrl,
         "Roll"=>$roll,
         "CarrAr" => $carrera,
         "Passw" => $pass,
         "Gener" => $gener,
         "status"=>"Inactivo",

         "TipoUs"=> $select_usuario //16 tutorado  13-15 tra
      ];

      $agregar_usuario=usuarioModel::agregar_usuario_modelo($datos_usuario_reg);
      //echo $agregar_usuario;
      if($agregar_usuario->rowCount()==1){
         echo '
            <script>
               Swal.fire({
                  title: "Usuario Registrado",
                  text: "El usuario ha sido registrado correctamente",
                  type: "success",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
        exit();

      }else{
         echo '
            <script>
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al registrar el usuario",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
        exit();
      }
   }

   public function registro_admin_controlador()
   {

      $select_usuario = 'Admin';
      $roll = 'Admin';
      $nombre = 'Administador';
      $apellido_paterno = 'SIT';
      $apellido_materno = 'ITISTMO';
      $fecha_nac = '2021-10-01';
      $sexo = 'M';
      $numero_telefono = '0000000000';
      $direccion = 'predeterminada';
      $email = 'predeterminado@predeterminado.com';
      $carrera = null;
      $noctrl = 'Admin';
      $pass = mainModel::encryption('SITITISTMO');
      $gener = null;
      $foto='/directory/img-person/default.png';

      $datos_usuario_reg = [
         "Nombre" => $nombre,
         "APaterno" => $apellido_paterno,
         "AMaterno" => $apellido_materno,
         "FechaNac" => $fecha_nac,
         "Sexo" => $sexo,
         "Correo" => $email,
         "NTelefono" => $numero_telefono,
         "Direccion" => $direccion,
         "Foto"=>$foto,

         "NoUser" => $noctrl,
         "Roll"=>$roll,
         "CarrAr" => $carrera,
         "Passw" => $pass,
         "Gener" => $gener,
         "status"=>"Inactivo",

         "TipoUs"=> $select_usuario 
      ];

      $agregar_usuario=usuarioModel::agregar_usuario_modelo($datos_usuario_reg);
      //echo $agregar_usuario;
      if($agregar_usuario->rowCount()==1){
         echo '
            <script>
               Swal.fire({
                  title: "Usuario Registrado",
                  text: "El usuario ha sido registrado correctamente",
                  type: "success",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
        exit();

      }else{
         echo '
            <script>
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al registrar el usuario",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Registro"
                  }
               });
            </script>
            ';
        exit();
      }
   }

    /* == controlador registro multiple de usuario  */
    public function registro_multU_controlador(){
      $select_usuario = mainModel::limpiar_cadena($_POST['datauser']);
      $carrera = mainModel::limpiar_cadena($_POST['dataCAR']);
      $gener = mainModel::limpiar_cadena($_POST['datagen']);
      
      $datos_reg = json_decode($_POST['dataexcel']);

      
      if($select_usuario==''){
         $alerta = [
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Seleccione un tipo de usuario para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }
      if($select_usuario!=13 && $select_usuario!=14 && $select_usuario!=15 && $select_usuario!=16){
         $alerta = [
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Se ha detectado un error con el tipo de usuario, recargue la pagina para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      if($carrera==''){
         $alerta = [
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Debe seleccionar un area/carrera para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      if($select_usuario=='16'){
         if($gener==''){
            $alerta = [
               "Titulo" => "Ocurrio un error inesperado",
               "Texto" => "Debe seleccionar una generación para continuar",
               "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
         }


         $consulta ="SELECT idGeneracion FROM generacion WHERE idGeneracion=$gener" ;
         $check_gen = mainModel::ejecutar_consulta_simple($consulta); 
         if ($check_gen->rowCount() == 0) {
            $alerta = [
               "Titulo" => "Ocurrio un error inesperado",
               "Texto" => "La generación seleccionada no existe, recargue la página para continuar",
               "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
         }

      }

      $consulta='';
      if($select_usuario=='16'){
          $consulta="SELECT idCarrera FROM carrera WHERE idCarrera=$carrera" ;
      }else {
         $consulta="SELECT idAreas FROM areas WHERE idAreas=$carrera";
      }

      $check_CarAr = mainModel::ejecutar_consulta_simple($consulta); 
      if ($check_CarAr->rowCount() == 0) {
         $alerta = [
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El area/carrera seleccionada no existe, recargue la página para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

         //for($i=0; i<count($datos_reg); $i++)
      //comparar si existe algun alumno alumno

      if($select_usuario=='16'){
         $consulta="SELECT NControl FROM tutorado WHERE NControl=" ;
     }else {
        $consulta="SELECT Matricula FROM trabajador WHERE Matricula=";
     }
     $roll='';   
      if($select_usuario=="13") $roll="Coordinador de Area";
      if($select_usuario=="14") $roll="Coordinador de Carrera";
      if($select_usuario=="15") $roll="Docente";

     for($i = 0; $i < count($datos_reg); ++$i) {
         $check_userdat = mainModel::ejecutar_consulta_simple($consulta.$datos_reg[$i][4]); 
         if ($check_userdat->rowCount() > 0) {
            $alerta = [
               "Titulo" => "Ocurrio un error inesperado",
               "Texto" => "El usuario con Matricula/NControl ".$datos_reg[0][4]." ya existe, verifique los datos para continuar",
               "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();

         }
      }
      $cont = 0;
      $users='';
      for($i = 0; $i < count($datos_reg); $i++) {
         $nombre= mainModel::limpiar_cadena($datos_reg[$i][0]);
         $apellido_paterno = mainModel::limpiar_cadena($datos_reg[$i][1]);
         $apellido_materno = mainModel::limpiar_cadena($datos_reg[$i][2]);
         $fecha_nac = "2012-12-12";
         $sexo = mainModel::limpiar_cadena($datos_reg[$i][3]);
         $email = mainModel::limpiar_cadena($datos_reg[$i][5]);
         $tel = "00000000";
         $direc = "Juchitán Oaxaca";
         $noctrl = mainModel::limpiar_cadena($datos_reg[$i][4]);
         $pass = mainModel::encryption($noctrl);
         $datos_usuario_reg = [
            "Nombre" => $nombre,
            "APaterno" => $apellido_paterno,
            "AMaterno" => $apellido_materno,
            "FechaNac" => $fecha_nac,
            "Sexo" => $sexo,
            "Correo" => $email,
            "NTelefono" => $tel,
            "Direccion" => $direc,
            "NoUser" => $noctrl,
            "Roll"=>$roll,
            "CarrAr" => $carrera,
            "Passw" => $pass,
            "Gener" => $gener,
            "status"=>"Inactivo",
   
            "TipoUs"=> $select_usuario //16 tutorado  13-15 tra
             
         ];
         $agregar_usuario=usuarioModel::agregar_usuario_modelo($datos_usuario_reg);
         $cont++;
         //$users = $users."$nombre $apellido_paterno $sexo -------------- ";        
     }

     if($agregar_usuario->rowCount()==0){  
         $alerta = [
            "Titulo" => "Error inesperado",
            "Texto" => "Error al registrar al usuario $nombre $apellido_paterno $noctrl",
            "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();

      }else{
         $alerta = [
            "Titulo" => "Registro exitoso de usuarios",
            "Texto" => "Se han registrado correctamente $cont datos",
            "Tipo" => "success"
            ];
            echo json_encode($alerta);
            exit();
      }
         
   }

   public function actualizar_usuario_controlador()
   {

      $nombre = mainModel::limpiar_cadena($_POST['name_upd']);
      $apellido_paterno = mainModel::limpiar_cadena($_POST['apellidop_upd']);
      $apellido_materno = mainModel::limpiar_cadena($_POST['apellidom_upd']);
      $sexo = mainModel::limpiar_cadena($_POST['sexo_upd']);
      $num_tel = mainModel::limpiar_cadena($_POST['numtel_upd']);
      $direccion = mainModel::limpiar_cadena($_POST['direc_upd']);
      $email = mainModel::limpiar_cadena($_POST['email_upd']);
      $pass = mainModel::encryption(mainModel::limpiar_cadena($_POST['pass_upd']));
      $passn = mainModel::limpiar_cadena($_POST['npass_upd']);
      $passn_repeat = mainModel::limpiar_cadena($_POST['rnpass_upd']);

      $check_tutor= isset($_POST['check_upd'])?'1':'0';
       
        /*$img = $_FILES['imgperfil_upd']; */
      $iduser = mainModel::limpiar_cadena($_POST['no_upd']);
      $idper = mainModel::limpiar_cadena($_POST['noUs_upd']);

      if ($pass=="") {
        echo '
            <script> 
               Swal.fire({
                  title: "Información",
                  text: "Es necesario ingresar su contraseña para realizar actualizar datos",
                  type: "info",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Edit-Perfil";
                  }
               });
            </script>
            ';
        exit();
      }
      if (mainModel::verificar_datos("[a-zA-Z0-9]{1,35}", $pass)) {
        echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato de la contraseña es inválido, solo se admiten caracteres alfanumericos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Edit-Perfil";
                  }
               });
            </script>
            ';
        exit();
        
         }
        if ($nombre == "" || $apellido_paterno == "" || $apellido_materno == "" || $direccion == ""  || $iduser == "" || $email == "") {
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Algunos campos estan vacios, por favor rellenelos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Edit-Perfil";
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
                     window.location="'.SERVERURL.'Edit-Perfil";
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
                     window.location="'.SERVERURL.'Edit-Perfil";
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
                     window.location="'.SERVERURL.'Edit-Perfil";
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
                  window.location="'.SERVERURL.'Edit-Perfil";
               }
            });
         </script>
         ';
      exit();
      }
      

      if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}", $direccion)) {
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato de la dirección, no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Edit-Perfil";
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
                     window.location="'.SERVERURL.'Edit-Perfil";
                  }
               });
            </script>
            ';
        exit();
      }

      if (mainModel::verificar_datos("[0-9A-Za-z]{4,10}", $iduser)) {
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al actualizar los datos, intente recargar la página nuevamente",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Edit-Perfil";
                  }
               });
            </script>
            ';
        exit();
      }
    
      $tabla='tutorado';
      $condicion="WHERE NControl='".$iduser."' AND contraseña='".$pass."';";
      $total_usuarios= usuarioModel::datos_usuario_modelo("Conteo","tutorado",$condicion);
      $total=$total_usuarios->rowCount();
      if($total==0){
        $tabla='trabajador';
        $condicion = " WHERE Matricula='$iduser' AND contraseña='$pass';";
        /* echo "<script>console.log('$condicion');</script>";
        exit(); */
        $total_usuarios= usuarioModel::datos_usuario_modelo("Conteo","trabajador",$condicion);
        $total=$total_usuarios->rowCount();
      }
      if($total==0){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "La contraseña es incorrecta",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Edit-Perfil";
                  }
               });
            </script>
            '; 
            exit();
      }
      if($passn!="" && $passn_repeat!="" && $passn!=$passn_repeat){
        echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Los campos de la nueva contraseña, no coinciden",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Edit-Perfil";
                  }
               });
            </script>
            '; 
            exit();
      }
      if($passn!=""){
         $passn=mainModel::encryption($passn);
      }
      

      if($pass == $passn && $passn!=""){
        echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "La nueva contraseña ya ha sido usada",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Edit-Perfil";
                  }
               });
            </script>
            '; 
            exit();
      }
      /* echo 'Condicionales terminadas'; */
      $link_img='';
      $name = $_FILES['image_upd']['name'];
      //if(isset($_FILES['image_upd']) && $name!=""){
       if($name!=null){
         
         if(strpos($name, 'jpg')){
            $tipo='.jpg';
         }elseif(strpos($name, 'jpeg')){
            $tipo='.jpeg';
         }else{
            $tipo='.png';
         }
         $temp = $_FILES['image_upd']['tmp_name'];
         $link_img='/directory/img-person/'.$nombre.'_'.$iduser.$tipo;
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
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Edit-Perfil";
                  }
               });
            </script>
            '; 
            exit();
         }
      }
      
      $datos_usuario_upd = [
         "Nombre" => $nombre,
         "APaterno" => $apellido_paterno,
         "AMaterno" => $apellido_materno,
         "Sexo" => $sexo,
         "Correo" => $email,
         "NTelefono" => $num_tel,
         "Direccion" => $direccion,
         "Foto" => $link_img,
         "IDUS" => $iduser,
         "NPass" =>$passn,
         "Tabla" =>$tabla,
         "ID" => $idper,
         "Pass" => $pass
      ];  

      
      /* echo $actualizar_usuario;
      exit(); */
      $sentencia=false;
      if(isset($_SESSION['matricula_sti'])){
         $sentencia=mainModel::ejecutar_consulta_simple("UPDATE trabajador SET Disponibilidad='$check_tutor' WHERE Matricula='".$_SESSION['matricula_sti']."'");
         $sentencia=$sentencia->rowCount()==1?true:false;
      }
      $actualizar_usuario = usuarioModel::actualizar_usuario_modelo($datos_usuario_upd);

      if($actualizar_usuario->rowCount()==1 || $sentencia){//comprobando realizacion de actualizacion
         echo '
            <script> 
               Swal.fire({
                  title: "Usuario Actualizado",
                  text: "Los datos se han actualizado correctamente",
                  type: "success",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Edit-Perfil";
                  }
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
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'Edit-Perfil";
                  }
               });
            </script>
            '; 
      }

   }

   public function busqueda_tutorado_controlador(){
      $noctrl = mainModel::limpiar_cadena($_POST['idtutorado']);
      if (mainModel::verificar_datos("[0-9-]{8,10}", $noctrl)) {
         $alerta = [
            "Response" => "error",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Ha ocurrido un error al consultar los datos, recargue la pagina para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      $busqueda_tutorado = usuarioModel::ejecutar_consulta_simple("SELECT p.idPersona, p.Nombre, p.APaterno, p.AMaterno, p.Correo, p.Foto, t.Carrera_idCarrera, t.Generacion_idGeneracion FROM persona p, tutorado t WHERE t.NControl=$noctrl AND p.idPersona=t.Persona_idPersona");
      
      if($busqueda_tutorado->rowCount()==0){
         $alerta = [
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Ha ocurrido un error al consultar los datos, recargue la pagina para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }
      $dat_info = $busqueda_tutorado -> fetchAll();
      return json_encode($dat_info); 

   }


    public function ver_tutorado_controlador(){
        $noctrl = mainModel::limpiar_cadena($_POST['idtutorado_ver']);
        if (mainModel::verificar_datos("[0-9-]{8,10}", $noctrl)) {
            $alerta = [
                "Response" => "error",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto" => "Ha ocurrido un error al consultar los datos, recargue la pagina para continuar",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }


        $busqueda_tutorado = usuarioModel::ejecutar_consulta_simple("SELECT t.NControl, p.Nombre, p.APaterno, p.AMaterno, p.NTelefono, p.Correo,r.Nombre as NombreCar, CONCAT( DATE_FORMAT(g.fecha_inicio,'%M %Y') ,'-', DATE_FORMAT(g.fecha_fin,'%M %Y')) , p.Foto   FROM persona p, tutorado t, trabajador_tutorados b, carrera r,generacion g WHERE t.NControl=$noctrl AND r.idCarrera = t.Carrera_idCarrera AND g.idGeneracion=t.Generacion_idGeneracion AND p.idPersona=t.Persona_idPersona");

        if($busqueda_tutorado->rowCount()==0){
            $alerta = [
                "Titulo" => "Ocurrio un error inesperado",
                "Texto" => "Ha ocurrido un error al consultar los datos, recargue la pagina para continuar",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        $dat_info = $busqueda_tutorado -> fetchAll();
        return json_encode($dat_info);

    }


   public function actualiza_tutorado_controlador(){
      $nocarr = mainModel::limpiar_cadena($_POST['ed_carr_tu']);
      $nogen = mainModel::limpiar_cadena($_POST['ed_gen_tu']);
      $noctrl = mainModel::limpiar_cadena($_POST['ed_noctrl_tu']);
      if (mainModel::verificar_datos("[0-9-]{2,10}", $nocarr)) {
         $alerta = [
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Se ha detectado un error con el formato de la carrera seleccionada, recargue la pagina para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }
      if (mainModel::verificar_datos("[0-9-]{2,10}", $nogen)) {
         $alerta = [
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Se ha detectado un error con el formato de la generación seleccionada, recargue la pagina para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      $check_carrera = usuarioModel::ejecutar_consulta_simple("SELECT idCarrera FROM carrera WHERE idCarrera=$nocarr"); 
      if($check_carrera->rowCount()==0){
         $alerta = [
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Se ha detectado un error con la carrera seleccionada, recargue la pagina para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      $check_generacion = usuarioModel::ejecutar_consulta_simple("SELECT idGeneracion FROM generacion WHERE idGeneracion=$nogen"); 
      if($check_generacion->rowCount()==0){
         $alerta = [
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Se ha detectado un error con la generacion seleccionada, recargue la pagina para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      $check_noctrl = usuarioModel::ejecutar_consulta_simple("SELECT NControl FROM tutorado WHERE NControl=$noctrl"); 
      if($check_noctrl->rowCount()==0){
         $alerta = [
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Se ha detectado un error con el numero de control, recargue la pagina para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }




      $datos_tutorado_upd = [
         "carrera" => $nocarr,
         "generacion" => $nogen,
         "ncontrol" => $noctrl
      ];

      $actualizar_tutorado=usuarioModel::actualizar_tutorado_modelo($datos_tutorado_upd);
      
       if($actualizar_tutorado->rowCount()==0){
         $alerta = [
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Error al actualizar, modifique los datos para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }else{
         $alerta = [
            "Titulo" => "Usuario actualizado",
            "Texto" => "Los datos del usuario han sido actualizados correctamente",
            "Tipo" => "success"
         ];
         echo json_encode($alerta);
         exit();
      } /**/
      
   }

   public function datos_usuario_controlador($tipo,$tabla,$condicion){
      $tipo=mainModel::limpiar_cadena($tipo);
      $tabla=mainModel::limpiar_cadena($tabla);
      $condicion=mainModel::limpiar_cadena($condicion);

      return usuarioModel::datos_usuario_modelo($tipo,$tabla,$condicion);
   
   }

   public function datos_ta_controlador($campos,$tabla,$condicion){
      $campos=mainModel::limpiar_cadena($campos);
      $tabla=mainModel::limpiar_cadena($tabla);
      /* $condicion=mainModel::limpiar_cadena($condicion); */

      return usuarioModel::datos_ta_modelo($campos,$tabla,$condicion);
   }

   public function selectRegistro_selectArEs(){
      $rol=$_POST['selectCarReg'];
      $code_html='';
      if($rol=="16"){
         $consult_select = mainModel::ejecutar_consulta_simple("SELECT idCarrera,Nombre FROM carrera;");
         $code_html = '<option selected="" value="">Selecciona una carrera</option>';
      }else{
         $consult_select = mainModel::ejecutar_consulta_simple("SELECT idAreas,Nombre FROM areas;");
         $code_html = '<option selected="" value="">Selecciona un area</option>';
      }
       $dat_info=$consult_select->fetchAll(); 
       
       foreach($dat_info as $row){
          $id = $row[0];
          $name = $row[1];
          $code_html = $code_html."<option value='$id'>$name</option>";
       }
      return $code_html;
   }

   
}
