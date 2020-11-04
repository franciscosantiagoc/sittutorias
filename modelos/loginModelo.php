<?php
   require_once "mainModel.php";

   class loginModelo extends mainModel{
      /*-------------- Modelo iniciar sesion --------------*/
      protected static function iniciar_sesion_modelo_trab($datos)
      {
         $sql=mainModel::conectar()->prepare("SELECT * FROM trabajador, persona WHERE Matricula=:Usuario 
         AND contraseña=:Clave AND idPersona = Persona_idPersona");
         $sql->bindParam(":Usuario",$datos['Usuario']);
         $sql->bindParam(":Clave",$datos['Clave']);
         $sql->execute();
         return $sql;
      }

      protected static function iniciar_sesion_modelo_tut($datos)
      {
         $sql=mainModel::conectar()->prepare("SELECT * FROM tutorado, persona WHERE NControl=:Usuario 
         AND contraseña=:Clave AND idPersona = Persona_idPersona");
         $sql->bindParam(":Usuario",$datos['Usuario']);
         $sql->bindParam(":Clave",$datos['Clave']);
         $sql->execute();
         return $sql;

      }
   }