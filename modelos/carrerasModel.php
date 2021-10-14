<?php
   require_once "mainModel.php";
   
   class carrerasModel extends mainModel{


      protected static function registrar_carrera_modelo($datos){
           $sql = mainModel::conectar()->prepare("INSERT INTO carrera(idCarrera, Areas_idAreas, Nombre) VALUES(:idCarrera, :idAreas, :Nombre)");

           $sql->bindParam(":idCarrera", $datos['idCarrera']);
           $sql->bindParam(":idAreas", $datos['idArea']);
           $sql->bindParam(":Nombre",$datos['Nombre']);
           $sql->execute();
          return $sql;
      }


       protected static function actualizar_carreras_modelo($datos){

           $sql = mainModel::conectar()->prepare("UPDATE carrera  SET idCarrera=:idActCarrera, Areas_idAreas=:idActArea, Nombre=:NombreCarrera WHERE idCarrera=:idActCarrera ");

           $sql->bindParam(":idActCarrera", $datos['idAcCarrera']);
           $sql->bindParam(":idActArea", $datos['idActArea']);
           $sql->bindParam(":NombreCarrera",$datos['NombreActCarrera']);
           $sql->execute();


           return $sql;
       }




   }