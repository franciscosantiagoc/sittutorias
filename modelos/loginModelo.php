<?php
   require_once "mainModel.php";

   class loginModelo extends mainModel{
      /*-------------- Modelo iniciar sesion --------------*/
      protected static function iniciar_sesion_modelo($datos)
      {
         $sql=mainModel::conectar()->prepare("SELECT * FROM trabajador WHERE Matriculas=:Usuario 
         AND contraseña=:Clave AND Estado='Activo' ");
         $sql->bindParam(":Usuario",$datos['Usuario']);
         $sql->bindParam(":Clave",$datos['Clave']);
         $sql->execute();
         return $sql;

      }
   }