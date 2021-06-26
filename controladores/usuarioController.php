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
      $pass = mainModel::limpiar_cadena($_POST['no_ctrl_reg']);

      /* == comprobar campos vacíos ==*/

      if ($nombre == "" || $apellido_paterno == "" || $apellido_materno == "" || $direccion == ""  || $noctrl == "" || $carrera=="" || $fecha_nac=="") {
          $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Se han detectado campos vacios",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit(); /**/
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "No has llenado todos los campos que son obligatorios",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'"Registro";
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
            $alerta = [
               "Alerta" => "simple",
               "Titulo" => "Ocurrio un error inesperado",
               "Texto" => "Ha ingresado un CORREO no válido",
               "Tipo" => "error"
            ];
            echo json_encode($alerta);
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

      if (mainModel::verificar_datos("[0-9-]{8,10}", $noctrl)) {
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El NUMERO DE CONTROL no coincide con el formato solicitado",
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
      }/**/
      $condicion = "'$columdb' = '$noctrl'";
       $check_no_ctrl = mainModel::ejecutar_consulta_simple("SELECT $columdb FROM $tabledb WHERE $condicion" ); 
      /*$check_no_ctrl = mainModel::ejecutar_consulta_simple("SELECT Matricula FROM trabajador WHERE Matricula ='$noctrl'");*/
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
      $passw='';
      $passw=$noctrl;   
      $roll='';   
      if($select_usuario=="13") $roll="Coordinador De Area";
      if($select_usuario=="14") $roll="Coordinador De Carrera";
      if($select_usuario=="14") $roll="Docente";

      $datos_usuario_reg = [
         "Nombre" => $nombre,
         "APaterno" => $apellido_paterno,
         "AMaterno" => $apellido_materno,
         "FechaNac" => $fecha_nac,
         "Sexo" => $sexo,
         "Correo" => $email,
         "NTelefono" => $numero_telefono,
         "Direccion" => $direccion,
         "CarrAr" => $carrera,
         "NoUser" => $noctrl,
         "Passw" => $passw,
         "TipoUs"=> $select_usuario,
         "Roll"=>$roll,
         "status"=>"Inactivo"
      ];

      $agregar_usuario=usuarioModel::agregar_usuario_modelo($datos_usuario_reg);
      //$agregar_usuario=$agregar_usuario->rowCount();
      /*$row=$agregar_usuario->fetch();
      $agregar_usuario=$row['idPersona'];
       echo '
            <script> 
               Swal.fire({
                  title: "Usuario Registrado",
                  text: "El idperson del ultimo usuario es: '.$agregar_usuario.'",
                  type: "success",
                  confirmButtonText: "Aceptar"
               });
            </script>
            ';
        exit(); */
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

   public function actualizar_usuario_controlador()
   {

      $nombre = mainModel::limpiar_cadena($_POST['name_upd']);
      $apellido_paterno = mainModel::limpiar_cadena($_POST['apellidop_upd']);
      $apellido_materno = mainModel::limpiar_cadena($_POST['apellidom_upd']);
      $sexo = mainModel::limpiar_cadena($_POST['sexo_upd']);
      $num_tel = mainModel::limpiar_cadena($_POST['numtel_upd']);
      $direccion = mainModel::limpiar_cadena($_POST['direc_upd']);
      $email = mainModel::limpiar_cadena($_POST['email_upd']);
      $pass = mainModel::limpiar_cadena($_POST['pass_upd']);
      $passn = mainModel::limpiar_cadena($_POST['npass_upd']);
      $passn_repeat = mainModel::limpiar_cadena($_POST['rnpass_upd']);
       
        /*$img = $_FILES['imgperfil_upd']; */
      $iduser = mainModel::limpiar_cadena($_POST['no_upd']);
      $idper = mainModel::limpiar_cadena($_POST['noUs_upd']);

      
       /*$alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "La contraseña es incorrecta",
            "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();*/
      if ($pass=="") {
        echo '
            <script> 
               Swal.fire({
                  title: "Información",
                  text: "Es necesario ingresar su contraseña para realizar actualizar datos",
                  type: "info",
                  confirmButtonText: "Aceptar"
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
               });
            </script>
            ';
        exit();
      }

      if (mainModel::verificar_datos("[0-9-]{8,10}", $iduser)) {
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al actualizar los datos, intente recargar la página nuevamente",
                  type: "error",
                  confirmButtonText: "Aceptar"
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
        $condicion = "WHERE Matricula='".$iduser."' AND contraseña='".$pass."';";
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
               });
            </script>
            '; 
            exit();
      }
      if($pass == $passn && $passn!=""){
        echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "La nueva contraseña ya ha sido usada",
                  type: "error",
                  confirmButtonText: "Aceptar"
               });
            </script>
            '; 
            exit();
      }
      /* echo 'Condicionales terminadas'; */
      $link_img='';
      $name = $_FILES['image_upd']['name'];
       if(isset($_FILES['image_upd']) && $name!=""){
         
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
      if($actualizar_usuario = usuarioModel::actualizar_usuario_modelo($datos_usuario_upd)){
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

   /* == controlador registro multiple de usuario  */
   public function registro_multU_controlador(){
      require "../library/PHPExcel/Classes/PHPExcel.php";
      $tmpfname = $_FILES['archivoexcel']['tmp_name'];
      $typo_us = $_POST['type_us'];
      $readexcel = PHPExcel_IOFactory::createReaderForFile($tmpfname);
      $excelobj = $readexcel->load($tmpfname);
      
      $hoja = $excelobj->getSheet(0);//leer 1ra hoja del archivo
      $filas = $hoja->getHighestRow();
      $html = " <thead>"; 
      $datos = array();
      for($row=2; $row<=$filas ; $row++){ //iniciamos de la fila dos porque la 1 corresponde a la cabecera del formato
          $nom = $hoja ->getCell('A',$row)->getValue();
          $apep = $hoja ->getCell('B',$row)->getValue();
          $apem = $hoja ->getCell('C',$row)->getValue();
          $sex = $hoja ->getCell('D',$row)->getValue();
          $ncont = $hoja ->getCell('E',$row)->getValue();
          $esp = $hoja ->getCell('F',$row)->getValue();
          $gen = $hoja ->getCell('G',$row)->getValue();
          $email = $hoja ->getCell('H',$row)->getValue();
          if($typo_us==18){
            $consulta = "SELECT NControl FROM tutorado WHERE NControl ='$noctrl' ";
          }else{
            $consulta = "SELECT Matricula FROM trabajador WHERE Matricula ='$noctrl' ";
          }
         /*$check_no_ctrl = mainModel::ejecutar_consulta_simple($consulta);
         
         $repet=false; 
         $foreach($datos['ncont'] as $key){
            if(key==$ncont){
               $repet = true;
               break;
            }
         }
         if($repet){
            
            $status = 'Dato Repetido';
         }else if ($check_no_ctrl->rowCount() > 0) {
            $status = 'Dato Existente';
         }
          array_push('ID'=>($row-1), 'nom'=>$nom,'apellp'=>$apep,'apellm'=>$apem,'sex'=>$sex,'ncont'=>$ncont,'esp'=>$esp,'gen'=>$gen,'email'=>$email,'status'=>$status)*/ 
      } 
      $html +="</thead>";
      /*
      $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El NUMERO DE CONTROL ya se encuentra registrado en el sistema",
            "Tipo" => "error"
         ];*/
       /*return $alerta;*/
       return $filas; 



      /*
      
      */
      
   }



    /* == controlador coordinador Area - Visualiza Solicitudes
    static public function paginador_solicitudes_controlador($pagina,$registros,$rol,$id,$url,$busqueda){
        $pagina=mainModel::limpiar_cadena($pagina);
        $registros=mainModel::limpiar_cadena($registros);
        $rol=mainModel::limpiar_cadena($rol);
        $id=mainModel::limpiar_cadena($id);
        $url=mainModel::limpiar_cadena($url);
        $url=SERVERURL.$url."/";
        $busqueda=mainModel::limpiar_cadena($busqueda);
        $tabla="";
        $pagina=(isset($pagina) && $pagina>0) ? (int) $pagina: 1;
        $inicio= ($pagina>0) ?(($pagina*$registros)-$registros) : 0;

        if(isset($busqueda) && $busqueda!=""){
          //  $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM solicitudes WHERE tipo_solicitud LIKE '%$busqueda%' OR Tutorado_NControl LIKE '%$busqueda%' OR fecha_solicitud LIKE '%$busqueda%'  ORDER BY fecha_solicitud ASC LIMIT $inicio,$registros";


        }else{
            //$consulta="SELECT SQL_CALC_FOUND_ROWS * FROM solicitudes  ORDER BY fecha_solicitud ASC LIMIT $inicio,$registros";
            $consulta="SELECT SQL_CALC_FOUND_ROWS  s.Tutorado_NControl,p.Nombre,p.APaterno,p.AMaterno, s.tipo_solicitud, s.fecha_solicitud FROM persona p ,tutorado c ,solicitudes s  WHERE p.idPersona=c.Persona_idPersona AND p.idPersona!='$id' AND c.NControl=s.Tutorado_NControl ORDER BY s.fecha_solicitud ASC LIMIT $inicio,$registros";
        }
        $conexion = mainModel::conectar();
        $datos = $conexion->query($consulta);
        $datos = $datos->fetchAll();
        $total = $conexion->query("SELECT FOUND_ROWS()");
        $total = (int) $total->fetchColumn();
        $Npaginas = ceil($total/$registros);
        $tabla.='<div class="table-responsive">
		<table id="tabla_solicitudes" class="table table-dark table-sm">
			<thead>
				<tr class="text-center roboto-medium">
					<th>#</th>
					<th>NOMBRE</th>
					<th>APELLIDO PATERNO</th>
					<th>APELLIDO MATERNO</th>
					<th>NÚMERO DE CONTROL</th>
					<th>TIPO DE SOLICITUD</th>
					<th>FECHA DE SOLICITUD</th>
					<th>ACTUALIZAR</th> 
					<th>ELIMINAR</th>
				</tr>
			</thead>
			<tbody>';
        if($total>=1 && $pagina<=$Npaginas){
            $contador=$inicio+1;
            $reg_inicio=$inicio+1;
            foreach ($datos as $rows){
                $tabla.='
                    <tr class="text-center roboto-medium" >
                        <td>'.$contador.'</td>
                        <td>'.$rows['Nombre'].'</td>
                        <td>'.$rows['APaterno'].'</td>
                        <td>'.$rows['AMaterno'].'</td>
                        <td>'.$rows['Tutorado_NControl'].'</td>
                        <td>'.$rows['tipo_solicitud'].'</td>
                        <td>'.$rows['fecha_solicitud'].'</td>
                        <td>
                            <a href="#Actualizar" class="btn btn-success">
                                    <i class="fas fa-sync-alt"></i>	
                            </a>
                        </td>
                        <td>
                            <form class="FormularioAjax" action="'.SERVERURL.'ajax/usuarioAjax.php"  method="POST" data-form="delete" autocomplete="off">
                            
                                <button type="submit" class="btn btn-warning">
                                        <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>         
				    </tr>';
                $contador++;
            }
            $reg_final=$contador-1;
        }else{
            if($total>=1){
                $tabla.='<tr class="text-center" ><td colspan="9">
                <a href="'.$url.'" class="btn btn-raised btn-primary btn-sm">Haga clic aca para recargar el listado</a>                
                </td> </tr>';
            }else{
                $tabla.='<tr class="text-center" ><td colspan="9">No hay registros en el sistema</td> </tr>';
            }
        }
        $tabla.='</tbody></table></div>';
        return $tabla;
    } */

   public function selectRegistro_selectArEs(){
      $rol=$_POST['selectCarReg'];
      $code_html='';
      if($rol=="16"){
         $consult_select = mainModel::ejecutar_consulta_simple("SELECT idCarrera,Nombre FROM carrera;");
         $code_html = '<option selected="">Selecciona una carrera</option>';
      }else{
         $consult_select = mainModel::ejecutar_consulta_simple("SELECT idAreas,Nombre FROM areas;");
         $code_html = '<option selected="">Selecciona un area</option>';
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
