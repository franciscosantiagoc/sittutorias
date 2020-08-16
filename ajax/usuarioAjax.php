<?php
   $peticionAjax=true;
   require_once "../config/APP.php";

   if(isset($_POST['name'])){
      /*-------------- Instancia al controlador --------------*/
      require_once "../controladores/usuarioController.php";
      $ins_usuario = new usuarioController();

       /*-------------- Agregar un usuario -------------apellidop-*/
      if(isset($_POST['name']) && isset($_POST['apellidop'])){
          echo $ins_usuario->agregar_usuario_controlador();

      }

   }else{
      session_start(['name'=>'STI']);
      session_unset();
      session_destroy();
      header("Location: ".SERVERURL."login");
      exit();

   }