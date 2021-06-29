<?php
   require_once "mainModel.php";
   
   class actividadesModel extends mainModel{
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

      protected static function entregar_actividad_modelo($datos){
         $sql = mainModel::conectar()->prepare("INSERT INTO actividades_asignadas(Actividades_idActividades, Tutorado_NControl, Fecha_entrega, Estatus) VALUES(:Nombre, :APaterno, :AMaterno, 'En espera')");
         

      }

      protected static function valida_actividad_modelo($datos){

      }
   }