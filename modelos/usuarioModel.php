<?php
   require_once "mainModel.php";
   
   class usuarioModel extends mainModel{
      /*-------------- Modelo agregar usuario --------------*/
      protected static function agregar_usuario_modelo($datos){
         $sql = mainModel::conectar()->prepare("INSERT INTO persona(Nombre, APaterno, AMaterno, FechaNac, Sexo, Correo, NTelefono, Direccion, Foto) VALUES(:Nombre, :APaterno, :AMaterno, :FechaNac, :Sexo, :Correo, :NTelefono, :Direccion,'')");

         $sql->bindParam(":Nombre", $datos['Nombre']);
         $sql->bindParam(":APaterno",$datos['APaterno']);
         $sql->bindParam(":AMaterno",$datos['AMaterno']);
         $sql->bindParam(":FechaNac",$datos['FechaNac']);
         $sql->bindParam(":Sexo", $datos['Sexo']);
         $sql->bindParam(":Correo",$datos['Correo']);
         $sql->bindParam(":NTelefono", $datos['NTelefono']);
         $sql->bindParam(":Direccion", $datos['Direccion']);
         $sql->execute();

          if($sql->rowCount() == 1){
           $sql=mainModel::conectar()->prepare("SELECT idPersona FROM persona ORDER BY idPersona DESC LIMIT 1");
            $sql->execute();
            $row=$sql->fetch();
            $iduser=$row['idPersona'];
            if($datos['TipoUs']==16){
               $sentencia="INSERT INTO tutorado (NControl, Persona_idPersona,Carrera_idCarrera,contraseña,Estado) VALUES(:NoUser,$iduser,:CarrAr,:contra,:Estado)";
            }else{
              $sentencia="INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas,contraseña,Estado) VALUES(:NoUser,SELECT idPersona FROM persona ORDER BY idPersona DESC LIMIT 1,:Roll,:CarrAr,:contra,:estatus)"; 
            }
            $sql = mainModel::conectar()->prepare($sentencia);
            $sql->bindParam(":NoUser", $datos['NoUser']);
            if($datos['TipoUs']!='16'){
               $sql->bindParam(":Roll",$datos['Roll']);
            }
               
            $sql->bindParam(":CarrAr",$datos['CarrAr']);
            $sql->bindParam(":contra",$datos['Passw']); 
            $sql->bindParam(":Estado", $datos['status']);/**/
           
            $sql->execute();
         } /**/

         return $sql;
      }

      protected static function actualizar_usuario_modelo($datos){
         $condfoto='';
         $campo='NControl';
         $condNpass='';
         $condicionNPass = '';
         $tabla = ','.$datos['Tabla'];
         if($datos['Tabla']!="tutorado")
            $campo='Matricula';
         if($datos['Foto']!="")
            $condfoto= ', Foto=:Foto';
          if($datos['NPass']!=""){
             $condNpass= ', contraseña=:NPass';
             $condicionNPass = 'AND '.$campo.'=:IDUS AND contraseña=:Pass';
          }else{
             $tabla = '';
          }
            
         
         
          $sql = mainModel::conectar()->prepare("UPDATE persona $tabla SET Nombre=:Nombre, APaterno=:APaterno, AMaterno=:AMaterno, Sexo=:Sexo, Correo=:Correo, NTelefono=:NTelefono, Direccion=:Direccion $condfoto $condNpass WHERE idPersona=:ID $condicionNPass");
   
   
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
         if($condNpass!=""){
            $sql->bindParam(":IDUS",$datos['IDUS']);
            $sql->bindParam(":Pass",$datos['Pass']);
            $sql->bindParam(":NPass",$datos['NPass']);
         }
        
         $sql->execute();


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
   
