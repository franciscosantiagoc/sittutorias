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

      protected static function actualizar_usuario_modelo($datos){
         $condfoto='';
         $condID='Ncontrol';
         $condNpass='';
         if($datos['Foto']!="")
            $condfoto= ', Foto=:Foto';
         /* if($datos['NPass']!="")
            $condNpass= ', contraseña=:NPass';
         if($datos['Tabla']!="tutorado")
            $condID='Matricula'; */
         
          $sql = mainModel::conectar()->prepare("UPDATE persona SET Nombre=:Nombre, APaterno=:APaterno, AMaterno=:AMaterno, Sexo=:Sexo, Correo=:Correo, NTelefono=:NTelefono, Direccion=:Direccion $condfoto WHERE idPersona=:ID");
   
   
         $sql->bindParam(":Nombre", $datos['Nombre']);
         $sql->bindParam(":APaterno",$datos['APaterno']);
         $sql->bindParam(":AMaterno",$datos['AMaterno']);
         $sql->bindParam(":Sexo",$datos['Sexo']);
         $sql->bindParam(":Correo",$datos['Correo']);
         $sql->bindParam(":NTelefono", $datos['NTelefono']);
         $sql->bindParam(":Direccion", $datos['Direccion']);
         $sql->bindParam(":ID", $datos['ID']);

          if($condfoto!="")
            $sql->bindParam(":Foto",$datos['Foto']);
         /*if($condNpass!="")
            $sql->bindParam(":NPass",$datos['NPass']);  */
        
         $sql->execute(); /* */
         /*$sql ="UPDATE persona, ".$datos['Tabla'] ." SET (Nombre=".$datos['Nombre'].", APaterno=".$datos['APaterno'].", AMaterno=".$datos['AMaterno'].", FechaNac=".$datos['FechaNac'].", Sexo=".$datos['Sexo'].", Correo=".$datos['Correo'].", NTelefono=".$datos['NTelefono'].", Direccion=".$datos['Direccion']." , Foto=:".$datos['Foto'].") WHERE $condID=".$datos['ID']." AND contraseña=".$datos['Pass']." AND idPersona=Persona_idPersona"; */

         return $sql;
      }

       /*------------------------Modelo datos usuario------------------------*/
       protected static function datos_usuario_modelo($tipo,$tabla,$condicion){
          if($tipo=="Unico"){
            $sql=mainModel::conectar()->prepare("SELECT idPersona,Nombre,Apaterno,Amaterno,FechaNac,Correo,Sexo,NTelefono,Direccion,Ciudad FROM persona, $tabla WHERE idPersona=Persona_idPersona AND $condicion ;");
          }elseif($tipo=="Conteo"){
            $sql=mainModel::conectar()->prepare("SELECT * FROM $tabla $condicion");
          }
          

          $sql->execute();
          return $sql;
       }

       protected static function datos_ta_modelo($campos,$tabla,$condicion){
         /*$sql="SELECT $campos FROM $tabla $condicion";*/
          $sql=mainModel::conectar()->prepare("SELECT $campos FROM $tabla $condicion");
          $sql->execute(); 
          return $sql;
       }
   }
   
