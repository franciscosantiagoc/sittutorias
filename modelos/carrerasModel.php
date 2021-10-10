<?php
   require_once "mainModel.php";
   
   class carrerasModel extends mainModel{

      //modelo registro de actividad
      protected static function registrar_area_modelo($datos){
           $sql = mainModel::conectar()->prepare("INSERT INTO areas(idAreas, Nombre, Descripcion) VALUES(:idArea, :NombreArea, :Descripcion)");

           $sql->bindParam(":idArea", $datos['idArea']);
           $sql->bindParam(":NombreArea", $datos['NombreArea']);
           $sql->bindParam(":Descripcion",$datos['Descripcion']);
           $sql->execute();
          return $sql;
      }


       protected static function actualizar_areas_modelo($datos){

           $sql = mainModel::conectar()->prepare("UPDATE areas  SET idAreas=:idAcArea, Nombre=:Nombre, Descripcion=:Descripcion WHERE idAreas=:idAcArea ");

           $sql->bindParam(":idAcArea", $datos['idAcArea']);
           $sql->bindParam(":Nombre", $datos['Nombre']);
           $sql->bindParam(":Descripcion",$datos['Descripcion']);
           $sql->execute();


           return $sql;
       }




   }