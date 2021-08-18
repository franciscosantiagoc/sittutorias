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
            $sql2=mainModel::conectar()->prepare("SELECT idPersona FROM persona ORDER BY idPersona DESC LIMIT 1");
            $sql2->execute();
            $row=$sql2->fetch();
            $idper=$row['idPersona'];

            if($datos['TipoUs']==16){
               $sentencia="INSERT INTO tutorado (NControl, Persona_idPersona,Carrera_idCarrera,contraseña,Generacion_idGeneracion,Estado) VALUES(:NoUser,:idperson,:CarrAr,:contra,:Gen,:Estado)";
            }else{
              $sentencia="INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas,contraseña,Estado) VALUES(:NoUser,:idperson,:Roll,:CarrAr,:contra,:Estado)"; 
            }
            $sql3 = mainModel::conectar()->prepare($sentencia);
            $sql3->bindParam(":idperson", $idper);
            $sql3->bindParam(":NoUser", $datos['NoUser']);   
            if($datos['TipoUs']!='16') $sql3->bindParam(":Roll",$datos['Roll']);
            $sql3->bindParam(":CarrAr",$datos['CarrAr']);
            $sql3->bindParam(":contra",$datos['Passw']); 
            if($datos['TipoUs']=='16') $sql3->bindParam(":Gen",$datos['Gener']);
            $sql3->bindParam(":Estado", $datos['status']);/**/
           
            $sql3->execute();
         } /**/

         return $sql3;
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

       protected static function actualizar_tutorado_modelo($datos){
         /*$sql = "UPDATE tutorado SET Carrera_idCarrera=".$datos['carrera'].", Generacion_idGeneracion=".$datos['generacion']." WHERE NControl=".$datos['ncontrol'];
         */
         $sql = mainModel::conectar()->prepare("UPDATE tutorado SET Carrera_idCarrera=:Carrera, Generacion_idGeneracion=:Generacion WHERE NControl=:noctrl");   
         $sql->bindParam(":Carrera", $datos['carrera']);
         $sql->bindParam(":Generacion", $datos['generacion']);
         $sql->bindParam(":noctrl", $datos['ncontrol']);        
         $sql->execute(); 

         return $sql;
      }

       protected static function actualizar_tutores_modelo($datos){
           $sql = mainModel::conectar()->prepare("UPDATE trabajador t, persona p  SET t.Matricula=:Matricula, p.Nombre=:Nombre, p.APaterno=:APaterno, p.AMaterno=:AMaterno, p.Sexo=:Sexo, p.Correo=:Correo, p.NTelefono=:NTelefono, t.Areas_idAreas=:Areas WHERE t.Matricula=:Matricular AND p.idPersona=t.Persona_idPersona ");

           $sql->bindParam(":Matricular", $datos['Matricular']);
           $sql->bindParam(":Matricula", $datos['Matricula']);
           $sql->bindParam(":Nombre", $datos['Nombre']);
           $sql->bindParam(":APaterno",$datos['APaterno']);
           $sql->bindParam(":AMaterno",$datos['AMaterno']);
           $sql->bindParam(":Sexo",$datos['Sexo']);
           $sql->bindParam(":Correo",$datos['Correo']);
           $sql->bindParam(":NTelefono", $datos['NTelefono']);
           $sql->bindParam(":Areas", $datos['Areas']);
           $sql->execute();


           return $sql;
       }

       protected static function actualizar_jdepto_modelo($datos){

           $sql = mainModel::conectar()->prepare("UPDATE trabajador t, persona p  SET t.Matricula=:Matricula, p.Nombre=:Nombre, p.APaterno=:APaterno, p.AMaterno=:AMaterno, p.Sexo=:Sexo, p.Correo=:Correo, p.NTelefono=:NTelefono, t.Areas_idAreas=:Areas WHERE t.Matricula=:Matricular AND p.idPersona=t.Persona_idPersona ");

           $sql->bindParam(":Matricular", $datos['Matricular']);
           $sql->bindParam(":Matricula", $datos['Matricula']);
           $sql->bindParam(":Nombre", $datos['Nombre']);
           $sql->bindParam(":APaterno",$datos['APaterno']);
           $sql->bindParam(":AMaterno",$datos['AMaterno']);
           $sql->bindParam(":Sexo",$datos['Sexo']);
           $sql->bindParam(":Correo",$datos['Correo']);
           $sql->bindParam(":NTelefono", $datos['NTelefono']);
           $sql->bindParam(":Areas", $datos['Areas']);
           $sql->execute();


           return $sql;
       }

       protected static function agregar_asignacion_modelo($datos){
           $sql = mainModel::conectar()->prepare("INSERT INTO trabajador_tutorados (Trabajador_Matricula,Tutorado_NControl,fecha_asig) VALUES (:matricula,:ncontrol,CURDATE())");
           $sql->bindParam(":matricula", $datos['Matricula']);
           $sql->bindParam(":ncontrol", $datos['NControl']);
           $sql->execute();
           return $sql;
       }

       protected static function actualizar_asignacion_modelo($datos){
           $sql = mainModel::conectar()->prepare("UPDATE trabajador_tutorados SET Trabajador_Matricula=:matricula WHERE Tutorado_NControl=:ncontrol;");
           $sql->bindParam(":matricula", $datos['Matricula']);
           $sql->bindParam(":ncontrol", $datos['NControl']);
           $sql->execute();
           return $sql;
       }

       protected static function agregar_historicoasig_modelo($datos){
           $sql = mainModel::conectar()->prepare("INSERT INTO historico_asignacion (idHistorico,Trabajador_Matricula,Tutorado_NControl,Fecha) VALUES (CONCAT(HOUR(NOW()),MINUTE(NOW()),DAY(CURDATE()),MONTH(CURDATE()), YEAR(CURDATE()),:ncontrol),:matricula,:ncontrol,CURDATE())");
           $sql->bindParam(":matricula", $datos['Matricula']);
           $sql->bindParam(":ncontrol", $datos['NControl']);
           $sql->execute();
           return $sql;
       }

       /*------------------------Modelo datos usuario------------------------*/
       protected static function datos_usuario_modelo($tipo,$tabla,$condicion){
          if($tipo=="Unico"){
            $sql=mainModel::conectar()->prepare("SELECT idPersona,Nombre,Apaterno,Amaterno,FechaNac,Correo,Sexo,NTelefono,Direccion FROM persona, $tabla WHERE idPersona=Persona_idPersona AND $condicion ;");
            //echo "SELECT idPersona,Nombre,Apaterno,Amaterno,FechaNac,Correo,Sexo,NTelefono,Direccion FROM persona, $tabla WHERE idPersona=Persona_idPersona AND $condicion ;";
          }elseif($tipo=="Conteo"){
            $sql=mainModel::conectar()->prepare("SELECT * FROM $tabla $condicion");
          }elseif($tipo=="Consulta"){
              $sql=mainModel::conectar()->prepare("$condicion");
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
   
