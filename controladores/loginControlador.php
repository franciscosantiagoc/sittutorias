<?php
   if($peticionAjax){
      require_once "../modelos/loginModelo.php";
   }else{
      require_once "./modelos/loginModelo.php";
   }
   class loginControlador extends loginModelo{
      /*-------------- controlador iniciar sesion --------------*/
      public function iniciar_sesion_controlador(){
         $usuario=mainModel::limpiar_cadena($_POST['numcont']);
         $clave=mainModel::limpiar_cadena($_POST['contraseña']);

         /* == comprobar campos vacíos ==*/

         if($usuario=="" || $clave=="" ){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "No has llenado todos los campos que son requeridos",
                  type: "Error",
                  confirmButtonText: "Aceptar",
               });
            </script>';
         }

         /* == Verificando integridad de los datos ==*/
         if(mainModel::verificar_datos("[0-9-]6,10}",$usuario)){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El numero de control no coincide con el formato solicitado",
                  type: "Error",
                  confirmButtonText: "Aceptar",
               });
            </script>';
         }
         $clave=mainModel::encryption($clave);

         $datos_login=[
            "Usuario"=>$usuario,
            "Clave"=>$clave
         ];
         $datos_cuenta=loginModelo::iniciar_sesion_modelo($datos_login);
         if($datos_cuenta->rowCount()==1){
            $row=$datos_cuenta->fetch();
            session_start(['name'=>'SPM']);
            $_SESSION['matricula_spm']=$row['Matricula'];
            $_SESSION['id_spm']=$row['Persona_IdPersona'];
            $_SESSION['nombre_spm']=$row['Roll'];
            $_SESSION['Areas_IdAreas_spm']=$row['Matricula'];
            $_SESSION['token_spm']=md5(uniqid(mt_rand(),true))

            return header("Location: ".SERVERURL."/tutorias/home/");
         }else{
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El USUARIO o CLAVES son incorrectos",
                  type: "Error",
                  confirmButtonText: "Aceptar",
               });
            </script>';
         }
      }
   }