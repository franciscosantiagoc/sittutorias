<?php
   require_once "mainModel.php";

   class loginModelo extends mainModel{
      /*-------------- Modelo iniciar sesion --------------*/
      protected static function iniciar_sesion_modelo($datos)
      {
         $sql=mainModel::conectar()->prepare("SELECT * FROM trabajador WHERE Matricula=:Usuario 
         AND contraseña=:Clave");
         $sql->bindParam(":Usuario",$datos['Usuario']);
         $sql->bindParam(":Clave",$datos['Clave']);
         $sql->execute();
         return $sql;

      }
   }