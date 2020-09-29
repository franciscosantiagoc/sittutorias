<?php
   require_once "mainModel.php";
   
   class usuarioModel extends mainModel{
      /*-------------- Modelo agregar usuario --------------*/
      protected static function agregar_usuario_modelo($datos){
         $sql = mainModel::conectar()->prepare("INSERT INTO persona(Nombre, APaterno, AMaterno, FechaNac, Sexo, Correo, NTelefono, Direccion, Ciudad,Foto) VALUES(:Nombre, :APaterno, :AMaterno, :FechaNac, :Sexo, :Correo, :NTelefono, :Direccion, :Ciudad,:Foto)");

         $sql->bindParam(":Nombre", $datos['Nombre']);
         $sql->bindParam(":APaterno",$datos['APaterno']);
         $sql->bindParam(":AMaterno",$datos['AMaterno']);
         $sql->bindParam(":FechaNac",$datos['FechaNac']);
         $sql->bindParam(":Sexo", $datos['Sexo']);
         $sql->bindParam(":Correo",$datos['Correo']);
         $sql->bindParam(":NTelefono", $datos['NTelefono']);
         $sql->bindParam(":Direccion", $datos['Direccion']);
         $sql->bindParam(":Ciudad",$datos['Ciudad']);
         $sql->bindParam(":Foto", $datos['Foto']);
         $sql->execute();

         return $sql;
      }

      protected static function actualizar_trabajador_modelo($datos){
         $sql = mainModel::conectar()->prepare("UPDATE persona SET (Nombre=:Nombre, APaterno=:APaterno, AMaterno=:AMaterno, FechaNac=:FechaNac, Sexo=:Sexo, Correo=:Correo, NTelefono=:NTelefono, Direccion=:Direccion, Ciudad=:Ciudad,Foto=:Foto) ");
   
         $sql->bindParam(":Nombre", $datos['Nombre']);
         $sql->bindParam(":APaterno",$datos['APaterno']);
         $sql->bindParam(":AMaterno",$datos['AMaterno']);
         $sql->bindParam(":FechaNac",$datos['FechaNac']);
         $sql->bindParam(":Sexo", $datos['Sexo']);
         $sql->bindParam(":Correo",$datos['Correo']);
         $sql->bindParam(":NTelefono", $datos['NTelefono']);
         $sql->bindParam(":Direccion", $datos['Direccion']);
         $sql->bindParam(":Ciudad",$datos['Ciudad']);
         $sql->bindParam(":Foto", $datos['Foto']);
         $sql->execute();
   
         return $sql;
      }


       protected static function actualizar_tutorado_modelo($datos){
           $sql = mainModel::conectar()->prepare("UPDATE persona SET (Nombre=':Nombre', APaterno=':APaterno', AMaterno=':AMaterno', FechaNac=':FechaNac', Sexo=':Sexo', Correo=':Correo', NTelefono=':NTelefono', Direccion=':Direccion', Ciudad=':Ciudad',Foto=':Foto') ");

           $sql->bindParam(":Nombre", $datos['Nombre']);
           $sql->bindParam(":APaterno",$datos['APaterno']);
           $sql->bindParam(":AMaterno",$datos['AMaterno']);
           $sql->bindParam(":FechaNac",$datos['FechaNac']);
           $sql->bindParam(":Sexo", $datos['Sexo']);
           $sql->bindParam(":Correo",$datos['Correo']);
           $sql->bindParam(":NTelefono", $datos['NTelefono']);
           $sql->bindParam(":Direccion", $datos['Direccion']);
           $sql->bindParam(":Ciudad",$datos['Ciudad']);
           $sql->bindParam(":Foto", $datos['Foto']);
           $sql->execute();

           return $sql;
       }
   }
   
