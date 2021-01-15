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

      $nombre = mainModel::limpiar_cadena($_POST['name_upd']);
      $apellido_paterno = mainModel::limpiar_cadena($_POST['apellidop_upd']);
      $apellido_materno = mainModel::limpiar_cadena($_POST['apellidom_upd']);
      $fecha_nac = mainModel::limpiar_cadena($_POST['fecha_upd']);
      $sexo = mainModel::limpiar_cadena($_POST['sexo_upd']);
      $numero_telefono = mainModel::limpiar_cadena($_POST['numero_tel_upd']);
      $direccion = mainModel::limpiar_cadena($_POST['direccion_upd']);
      $email = mainModel::limpiar_cadena($_POST['email_upd']);
      $carrera = mainModel::limpiar_cadena($_POST['carrera_upd']);
      $noctrl = mainModel::limpiar_cadena($_POST['no_ctrl_upd']);

      /* == comprobar campos vacíos ==*/

      if ($nombre == "" || $apellido_paterno == "" || $apellido_materno == "" || $direccion == ""  || $noctrl == "") {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "No has llenado todos los campos que son obligatorios",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }




      /* == Verificando integridad de los datos ==*/

      if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $nombre)) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El NOMBRE no coincide con el formato solicitado",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }
      if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $apellido_paterno)) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El APELLIDO PATERNO no coincide con el formato solicitado",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }
      if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $apellido_materno)) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El APELLIDO MATERNO no coincide con el formato solicitado",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }
      if ($numero_telefono != "") {
         if (mainModel::verificar_datos("[0-9()+]{8,20}", $numero_telefono)) {
            $alerta = [
               "Alerta" => "simple",
               "Titulo" => "Ocurrio un error inesperado",
               "Texto" => "El TELÉFONO no coincide con el formato solicitado",
               "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
         }
      }

      if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}", $direccion)) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "La DIRECCION no coincide con el formato solicitado",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      if (mainModel::verificar_datos("[0-9-]{8,10}", $noctrl)) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El NUMERO DE CONTROL no coincide con el formato solicitado",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      /* == comprbando No. Ctrl. == 
         if($select_usuario==16){//tutorado*/
      $columdb = "Matricula";
      $tabledb = "trabajador";

      /*}elseif($select_usuario>=13 || $select_usuario<=15){
           $columdb="Matricula";
           $tabledb="trabajador";
         }*/
      $condicion = "'$columdb' = '$noctrl'";
      /* $check_no_ctrl = mainModel::ejecutar_consulta_simple("SELECT '$columdb' FROM '$tabledb' WHERE '$condicion'" ); */
      $check_no_ctrl = mainModel::ejecutar_consulta_simple("SELECT Matricula FROM trbajador WHERE Matricula ='$noctrl'");
      if ($check_no_ctrl->rowCount() > 0) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El NUMERO DE CONTROL ya se encuentra registrado en el sistema",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      /*== Comprobando email ==*/
      if ($email != "") {
         if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $check_email = mainModel::ejecutar_consulta_simple("SELECT Correo FROM persona WHERE Correo='$email'");
            if ($check_email->rowCount() > 0) {
               $alerta = [
                  "Alerta" => "simple",
                  "Titulo" => "Ocurrio un error inesperado",
                  "Texto" => "El CORREO ya se encuentra registrado en el sistema",
                  "Tipo" => "error"
               ];
               echo json_encode($alerta);
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
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Ingrese un correo para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

<<<<<<< HEAD

      $datos_usuario_reg = [
         "Nombre" => $nombre,
         "APaterno" => $apellido_paterno,
         "AMaterno" => $apellido_materno,
         "FechaNac" => $fecha_nac,
         "Sexo" => $sexo,
         "Correo" => $email,
         "NTelefono" => $numero_telefono,
         "Direccion" => $direccion
      ];
   }
}
=======
      protected function obtener_datos_usuario($tipo,$id,$roll,$desc,$rolla){ //tipoconsulta, IDusuari, rollAseleccionar y boolean para determinar si es seleccion por roll unico o de forma descendente
         if($tipo == "unico"){

         }else{

            if($desc){ //si la seleccion por roll descentente es verdadera buscara usuarios de roll descentente es decir Coordinador area, coordinador carrera, docente...

            }else{//caso contrario hara una seleccion por roll unico ya sea docentes o alumnos o coordinadores

            }

         }
         
      }

     
   }
>>>>>>> 4171508dd7fdb6b6c549e57ebee1f2121821e6ed
