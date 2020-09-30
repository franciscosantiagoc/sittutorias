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
         $clave=mainModel::limpiar_cadena($_POST['pass']);

         /* == comprobar campos vacíos ==*/

         if($usuario=="" || $clave=="" ){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "No has llenado todos los campos que son requeridos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               });
            </script>
            ';
         }

         /* == Verificando integridad de los datos ==*/
         if(mainModel::verificar_datos("[0-9-]{6,13}",$usuario)){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El numero de control no coincide con el formato solicitado",
                  type: "error",
                  confirmButtonText: "Aceptar"
               });
            </script>
            ';
         }
         
         if(mainModel::verificar_datos("[a-zA-Z0-9]{8,16}",$clave)){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El numero de control no coincide con el formato solicitado",
                  type: "error",
                  confirmButtonText: "Aceptar"
               });
            </script>
            ';
         }
         /* $clave=mainModel::encryption($clave); */

         $datos_login=[
            "Usuario"=>$usuario,
            "Clave"=>$clave
         ];
         $datos_cuenta=loginModelo::iniciar_sesion_modelo($datos_login);
         if($datos_cuenta->rowCount()==1){
            $row=$datos_cuenta->fetch();
            session_start(['name'=>'STI']);
            $_SESSION['matricula_sti']=$row['Matricula'];
            $_SESSION['id_sti']=$row['Persona_idPersona'];
            $_SESSION['roll_sti']=$row['Roll'];
            $_SESSION['IdAreas_sti']=$row['Areas_idAreas'];
            $_SESSION['Estado']=$row['Estado'];
            $_SESSION['token_sti']=md5(uniqid(mt_rand(),true));

            return header("Location: ".SERVERURL."home");
         }else{
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El USUARIO o CLAVES son incorrectos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               });
            </script>
            ';
         }
      }
   }