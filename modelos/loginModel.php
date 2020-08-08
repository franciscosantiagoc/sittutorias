<?php
   require_once "mainModel.php";

   class loginModel extends mainModel{
      /*-------------- Modelo iniciar sesion --------------*/
      protected static function iniciar_sesion_modelo($datos)
      {
         $sql=mainModel::conectar()->prepare("SELECT * FROM ");

      }
   }