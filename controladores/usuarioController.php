<?php
   if($peticionAjax){
      require_once "../modelos/usuarioModel.php";
   }else{
      require_once "./modelos/usuarioModel.php";
   }

   class usuarioController extends usuarioModel{
      /*-------------- Controlador agregar usuario --------------*/
      public static function agregar_usuario_controlador(){
         
      }
   }