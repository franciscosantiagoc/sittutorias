<?php
   $peticionAjax=true;
   require_once "../config/APP.php";

   if(isset($_POST['name_reg'])){
      /*-------------- Instancia al controlador --------------*/
      require_once "../controladores/usuarioController.php";
      $ins_usuario = new usuarioController();

       /*-------------- Agregar un usuario --------------*/
      if(isset($_POST['name_reg']) && isset($_POST['apellidop_reg'])){
         echo $ins_usuario->registrar_trabajador_controlador();

     }

   }else{ 
      session_start(['name'=>'STI']);
      session_unset();
      session_destroy();
      header("Location: ".SERVERURL."login");
      exit();

   }