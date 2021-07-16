<?php
   require_once "mainModel.php";
   
   class actividadesModel extends mainModel{

      //modelo registro de actividad
      protected static function agregar_actividad_modelo($datos){
         $sql = mainModel::conectar()->prepare("INSERT INTO actividades(idActividades, Nombre, Descripcion, Semetrerealizacion_sug, Fecha_registro, URLFormato) VALUES(:idActividad, :Nombre, :Descripcion, :semestrer, :Fechareg, :Formato)");

         $sql->bindParam(":idActividad", $datos['idActividad']);
         $sql->bindParam(":Nombre", $datos['Nombre']);
         $sql->bindParam(":Descripcion",$datos['Descripcion']);
         $sql->bindParam(":Semestrer",$datos['Semetrer']);
         $sql->bindParam(":Fechareg",$datos['Fechareg']);
         $sql->bindParam(":Formato", $datos['Formato']);
         $sql->execute();
      }
      //modelo regitro de entrega de actividad de tutorado
      protected static function entregar_actividad_modelo($datos){
         
          $sql = mainModel::conectar()->prepare("INSERT INTO actividades_asignadas(Actividades_idActividades, Tutorado_NControl,URLFile, Estatus) VALUES(:idActividad, :NControl, :Urlfile, :Estatus)");
         $sql->bindParam(":idActividad", $datos['idActividad']);
         $sql->bindParam(":NControl", $datos['NControl']);
         $sql->bindParam(":Urlfile",$datos['URLFile']);
         //$sql->bindParam(":Fecha",$datos['Fecha']);
         $sql->bindParam(":Estatus",$datos['Status']);
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