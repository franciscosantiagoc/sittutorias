<?php
   require_once "mainModel.php";

   class loginModelo extends mainModel{
      /*-------------- Modelo iniciar sesion --------------*/
      protected static function consulta_select_registro($consulta)
      {
         $sql=mainModel::conectar()->prepare($consulta);
         $sql->execute();
         return $sql;
      }
    }