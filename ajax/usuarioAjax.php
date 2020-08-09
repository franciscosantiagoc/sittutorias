<?php
   $peticionAjax=true;
   require_once "../config/APP.php";

   if(){
      /*-------------- Instancia al controlador --------------*/
      require_once "../controladores/usuarioController.php";
      $ins_usuario = new usuarioController();
   }else{
      session_start(['name'=>'STI']);
      session_unset();
      session_destroy();
      header("Location: ".SERVERURL."login");

   }