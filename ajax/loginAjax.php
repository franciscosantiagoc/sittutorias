<?php
   $peticionAjax=true;
   require_once "../config/APP.php";
   if(){

   }else {
      session_start(['name'=>'STI']);
      session_unset();
      session_destroy();
      header("Location: ".SERVERURL."login/")
      exit();
      
   }