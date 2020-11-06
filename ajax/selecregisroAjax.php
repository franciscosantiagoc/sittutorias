<?php
   
   if($peticionAjax){
      require_once "../modelos/usuarioModel.php";
   }else{
      require_once "./modelos/usuarioModel.php";

   }
   if(isset($_POST['name'])){

      require_once "../controladores/usuarioController.php";
      $ins_usuario = new usuarioController();
      
      echo $select_usuario->agregar_usuario_controlador();
   }else{ 
      session_start(['name'=>'STI']);
      session_unset();
      session_destroy();
      header("Location: ".SERVERURL."login");
      exit();

   }

