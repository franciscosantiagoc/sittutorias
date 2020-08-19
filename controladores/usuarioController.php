<?php
   if($peticionAjax){
      require_once "../modelos/usuarioModel.php";
   }else{
      require_once "./modelos/usuarioModel.php";

   }

   class usuarioController extends usuarioModel{
      /*-------------- Controlador agregar usuario --------------*/
      public function agregar_usuario_controlador(){
          $select_usuario=mainModel::limpiar_cadena($_POST['select_user']);
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

          if($nombre=="" || $apellido_paterno=="" || $apellido_materno=="" || $direccion==""  || $noctrl==""){
              $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No has llenado todos los campos que son obligatorios",
                  "Tipo"=>"error"
              ];
              echo json_encode($alerta);
              exit();

          }

          /* == Verificando integridad de los datos ==*/

          if(mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}",$nombre)){
            $alerta=[
               "Alerta"=>"simple",
               "Titulo"=>"Ocurrio un error inesperado",
               "Texto"=>"El NOMBRE no coincide con el formato solicitado",
               "Tipo"=>"error"
           ];
           echo json_encode($alerta);
           exit();

          }
          if(mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}",$apellido_paterno)){
            $alerta=[
               "Alerta"=>"simple",
               "Titulo"=>"Ocurrio un error inesperado",
               "Texto"=>"El APELLIDO PATERNO no coincide con el formato solicitado",
               "Tipo"=>"error"
           ];
           echo json_encode($alerta);
           exit();

          }
          if(mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}",$apellido_materno)){
            $alerta=[
               "Alerta"=>"simple",
               "Titulo"=>"Ocurrio un error inesperado",
               "Texto"=>"El APELLIDO MATERNO no coincide con el formato solicitado",
               "Tipo"=>"error"
           ];
           echo json_encode($alerta);
           exit();

          }
          if($numero_telefono!=""){
            if(mainModel::verificar_datos("[0-9()+]{8,20}",$numero_telefono)){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"El TELÉFONO no coincide con el formato solicitado",
                  "Tipo"=>"error"
              ];
              echo json_encode($alerta);
              exit();
   
             }
          }

          if(mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}",$direccion)){
            $alerta=[
               "Alerta"=>"simple",
               "Titulo"=>"Ocurrio un error inesperado",
               "Texto"=>"La DIRECCION no coincide con el formato solicitado",
               "Tipo"=>"error"
           ];
           echo json_encode($alerta);
           exit();

          }

          if(mainModel::verificar_datos("[0-9-]{8,10}",$noctrl)){
            $alerta=[
               "Alerta"=>"simple",
               "Titulo"=>"Ocurrio un error inesperado",
               "Texto"=>"El NUMERO DE CONTROL no coincide con el formato solicitado",
               "Tipo"=>"error"
           ];
           echo json_encode($alerta);
           exit();

          }



      }
   }