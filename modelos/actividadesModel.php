<?php
   require_once "mainModel.php";
   
   class actividadesModel extends mainModel{

      //modelo registro de actividad
      protected static function registrar_actividad_modelo($datos){
           $sql = mainModel::conectar()->prepare("INSERT INTO actividades(idActividades, Nombre, Descripcion, Semestrerealizacion_sug, Semestre_obligatorio, Fecha_registro, URLFormato) VALUES(:idActividad, :Nombre, :Descripcion, :Semestrer,:Semestreoblig, CURDATE(), :Formato)");

           $sql->bindParam(":idActividad", $datos['idActividad']);
           $sql->bindParam(":Nombre", $datos['Nombre']);
           $sql->bindParam(":Descripcion",$datos['Descripcion']);
           $sql->bindParam(":Semestrer",$datos['Semestre_Sug']);
           $sql->bindParam(":Semestreoblig",$datos['Semestre_Oblig']);
           $sql->bindParam(":Formato", $datos['URLFile']);
           $sql->execute();
          return $sql;
      }
      //modelo regitro de entrega de actividad de tutorado
      protected static function entregar_actividad_modelo($datos){
          $sql = mainModel::conectar()->prepare("INSERT INTO actividades_asignadas(Actividades_idActividades, Tutorado_NControl,URLFile,Fecha, Estatus) VALUES(:idActividad, :NControl, :Urlfile, CURDATE(), :Estatus)");
         $sql->bindParam(":idActividad", $datos['idActividad']);
         $sql->bindParam(":NControl", $datos['NControl']);
         $sql->bindParam(":Urlfile",$datos['URLFile']);
         //$sql->bindParam(":Fecha",$datos['Fecha']);
         $sql->bindParam(":Estatus",$datos['Status']);
         $sql->execute();  
         return $sql; 

      }
       protected static function actualizar_actividades_modelo($datos){



           $sql = mainModel::conectar()->prepare("UPDATE actividades  SET idActividades=:idAcActividad, Nombre=:Nombre, Descripcion=:Descripcion, Semestrerealizacion_sug=:Semestre_sug, URLFormato=:Formato WHERE idActividades=:idAcActividad ");

           $sql->bindParam(":idAcActividad", $datos['idAcActividad']);
           $sql->bindParam(":Nombre", $datos['Nombre']);
           $sql->bindParam(":Descripcion",$datos['Descripcion']);
           $sql->bindParam(":Semestre_sug",$datos['Semestre_sug']);
           $sql->bindParam(":Formato", $datos['URLFile']);
           $sql->execute();


           return $sql;
       }
      //modelo reenvio de entrega de actividad de tutorado
      protected static function modificarstatus_actividad_modelo($datos){
         $sql = mainModel::conectar()->prepare("UPDATE actividades_asignadas SET Estatus='En espera' WHERE Actividades_idActividades=:idActividad AND Tutorado_NControl=:NControl");
         $sql->bindParam(":idActividad", $datos['idActividad']);
         $sql->bindParam(":NControl", $datos['NControl']);
         $sql->execute();
      }



      protected static function valida_actividad_modelo($datos){

      }
   }