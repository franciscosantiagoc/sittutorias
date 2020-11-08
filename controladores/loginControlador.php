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
         if(mainModel::verificar_datos("[0-9-]{4,13}",$usuario)){
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
         $user = false;
         $datos_login=[
            "Usuario"=>$usuario,
            "Clave"=>$clave
         ];
         
         $datos_cuenta=loginModelo::iniciar_sesion_modelo_trab($datos_login);
         if($datos_cuenta->rowCount()==0){
            /*echo 'trabajador';*/
            $datos_cuenta=loginModelo::iniciar_sesion_modelo_tut($datos_login);
            /*echo 'tutorados';*/
            if($datos_cuenta->rowCount()==1){
               $user = true;
            }
         }
         
         if($datos_cuenta->rowCount()==1){
            $row=$datos_cuenta->fetch();
             /*print_r($row); */

            $imgen = file_get_contents(SERVERURL.$row['Foto']);
            $img_base64= chunk_split(base64_encode($imgen ));
            $img_perfil = "data:image/jpeg;base64,$img_base64";
            session_start(['name'=>'STI']);

            $_SESSION['last_time_sti'] = time();

            $_SESSION['nombre_sti']=$row['Nombre'];
            $_SESSION['apellPat_sti']=$row['APaterno'];
            $_SESSION['apellMat_sti']=$row['AMaterno'];
            $_SESSION['imgperfil_sti']=$img_perfil;
            $_SESSION['id_sti']=$row['Persona_idPersona'];
            
            if($user == false){
               $_SESSION['matricula_sti']=$row['Matricula'];
               $_SESSION['roll_sti']=$row['Roll'];
            }else{
               $_SESSION['NControl_sti']=$row['NControl'];
               $_SESSION['roll_sti']="Tutorado";
            }
            $_SESSION['token_sti']=md5(uniqid(mt_rand(),true));

            /*return header("Location: ".SERVERURL."MenuTutor");*/
            if($_SESSION['roll_sti'] == "Tutorado"){
               echo'<script type="text/javascript"> 
               window.location.href="'.SERVERURL.'MenuAlumno";</script>';
            }elseif($_SESSION['roll_sti'] == "Docente"){
               echo'<script type="text/javascript"> 
               window.location.href="'.SERVERURL.'MenuTutor";</script>';
            }elseif($_SESSION['roll_sti'] == "Coordinador De Carrera"){
               echo'<script type="text/javascript"> 
               window.location.href="'.SERVERURL.'MenuCordCa";</script>';
            }elseif($_SESSION['roll_sti'] == "Coordinador De Area"){
               echo'<script type="text/javascript"> 
               window.location.href="'.SERVERURL.'MenuCordArea";</script>';
            }
         }else{
            /* echo 'NO EXISTE USUARIO';*/
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
      }/*-------------- fin controlador iniciar sesion --------------*/

      /*-------------- controlador forzar cierre de sesion --------------*/
      public function forzar_cierre_sesion_controlador(){
         session_unset();
         session_destroy();
         /* if(headers_sent()){ */
         echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'";</script>';
         /* }else{
            return header("Location: ".SERVERURL);
         } */

      }/*-------------- fin controlador cierre de sesion --------------*/


      /*-------------- controlador cierre de sesion --------------*/
      public function cierre_sesion_controlador(){
         session_start(['name'=>'STI']);
         $token=mainModel::decryption($_POST['token']);
         $usuario=mainModel::decryption($_POST['usuario']);

         if($token==$_SESSION['token_sti']){
            session_unset();
            session_destroy();
            $alerta=[
               "Alerta"=>"redireccionar",
               "URL"=>SERVERURL
            ];

         }else{
            $alerta=[
                 "Alerta"=>"simple",
                 "Titulo"=>"Ocurrio un error inesperado",
                 "Texto"=>"No se pudo cerrar la sesion",
                 "Tipo"=>"error"
             ];
         }
         echo json_encode($alerta);
        
      }/*-------------- fin controlador cierre de sesion --------------*/

      public function cierre_sesiontiempo_controlador(){
         session_unset();
         session_destroy();

         /*echo '<script> 
               Swal.fire({
                  title: "Sesion Caducada",
                  text: "Su sesion ha caducado, por favor inicie sesion nuevamente",
                  type: "error",
                  confirmButtonText: "Aceptar"
               });
               
            </script>
            ';*/
         echo'<script type="text/javascript"> 
         alert("Su sesion ha caducado, por favor inicie sesion nuevamente);
         window.location.href="'.SERVERURL.'";</script>';
         
        
      }/*-------------- fin controlador cierre de sesion --------------*/
   }