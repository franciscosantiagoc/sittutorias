<?php
$peticionAjax = true;
require_once "../config/APP.php";
require_once "../controladores/usuarioController.php";

 if (isset($_POST['name_reg'])) {
   /*-------------- Instancia al controlador --------------*/
   
   $ins_usuario = new usuarioController();

   /*-------------- Agregar un usuario --------------*/
   if (isset($_POST['name_reg']) && isset($_POST['apellidop_reg'])) {
      echo $ins_usuario->registro_usuario_controlador();
   }
}elseif (isset($_POST['name_upd'])) {
   echo 'actualizacion';//$ins_usuario->actualizar_usuario_controlador();
}elseif(isset($_POST['selectCarReg'])){
   $ins_usuario = new usuarioController();
   echo $ins_usuario->selectRegistro_selectArEs();

}elseif (is_array($_FILES['archivoexcel']) && count($_FILES['archivoexcel'])>0) {
   $ins_usuario = new usuarioController();
   echo $ins_usuario->registro_multU_controlador();
    /*echo 'archivo ajax ejecutado'; */

} else {
   session_start(['name' => 'STI']);
   session_unset();
   session_destroy();
   header("Location: " . SERVERURL . "login");
   exit();
}
