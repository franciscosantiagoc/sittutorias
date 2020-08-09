<?php
   if($peticionAjax){
      require_once "../modelos/usuarioModel.php";
   }else{
      require_once "./modelos/usuarioModel.php";
   }

   class usuarioController extends usuarioModel{
      /*-------------- Controlador agregar usuario --------------*/
      public function agregar_usuario_controlador(){
          $nombre=mainModel::limpiar_cadena($_POST['name']);
          $apellido_paterno=mainModel::limpiar_cadena($_POST['apellidop']);
          $apellido_materno=mainModel::limpiar_cadena($_POST['apellidom']);
          $fecha_nac=mainModel::limpiar_cadena($_POST['registro_fecha']);
          $sexo=mainModel::limpiar_cadena($_POST['registro_sexo']);
          $numero_telefono=mainModel::limpiar_cadena($_POST['numero_tel']);
          $direccion=mainModel::limpiar_cadena($_POST['direccion']);
          $email=mainModel::limpiar_cadena($_POST['email']);
          $carrera=mainModel::limpiar_cadena($_POST['registro_carrera']);
          $noctrl=mainModel::limpiar_cadena($_POST['no_ctrl']);

          /* == comprobar campos vacíos ==*/

          if($nombre=="" || $apellido_paterno=="" || $apellido_materno=="" || $numero_telefono=="" || $direccion==""  || $noctrl==""){
              $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No has llenado todos los campos que son obligatorios",
                  "Tipo"=>"error"
              ];
              echo json_encode($alerta);
              exit();

          }


      }
   }