<?php
   $peticionAjax=true;
   require_once "../config/APP.php";

   if(isset($_POST['name'])){
      /*-------------- Instancia al controlador --------------*/
      require_once "../controladores/usuarioController.php";
      $ins_usuario = new usuarioController();

       /*-------------- Agregar un usuario --------------*/
      if(isset($_POST['name_upd']) && isset($_POST['apellidop_upd'])){
         echo $ins_usuario->actualizar_trabajador_controlador();

     }

   }else{ 
      session_start(['name'=>'SMP']);
      session_unset();
      session_destroy();
      header("Location: ".SERVERURL."login");
      exit();

   }