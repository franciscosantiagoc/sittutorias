<?php
   require_once "mainModel.php";
   
   class usuarioModel extends mainModel{
      /*-------------- Modelo agregar usuario --------------*/
      protected static function agregar_usuario_modelo($datos){
         $sql = mainModel::conectar()->prepare("INSERT INTO persona(Nombre, APaterno, AMaterno, FechaNac, Sexo, Correo, NTelefono, Direccion, Ciudad,Foto) VALUES(:Nombre, :APaterno, :AMaterno, :FechaNac, :Sexo, :Correo, :NTelefono, :Direccion, :Ciudad,:Foto)");
         $sql->bindParam(":Nombre", $datos['Nombre']);
         $sql->bindParam(":APaterno",$datos['Nombre']);
         $sql->bindParam(":AMaterno",$datos['']); 
         $sql->bindParam(":FechaNac",$datos['']);
         $sql->bindParam(":Sexo", $datos['']);
         $sql->bindParam(":Correo",$datos['']);
         $sql->bindParam(":NTelefono", $datos['']);
         $sql->bindParam(":Direccion", $datos['']);
         $sql->bindParam(":Ciudad",$datos['']);
         $sql->bindParam(":Foto", $datos['']);
      }
   }