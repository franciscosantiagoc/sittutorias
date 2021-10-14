<?php
   require_once "mainModel.php";
   
   class generacionModel extends mainModel{


      protected static function registrar_gener_modelo($datos){
           $sql = mainModel::conectar()->prepare("INSERT INTO generacion(idGeneracion, fecha_inicio, fecha_fin) VALUES(:idGener, :fecha_ini, :fecha_fin)");

           $sql->bindParam(":idGener", $datos['idGener']);
           $sql->bindParam(":fecha_ini", $datos['fecha_ini']);
           $sql->bindParam(":fecha_fin",$datos['fecha_fin']);
           $sql->execute();
          return $sql;
      }


       protected static function actualizar_gener_modelo($datos){

           $sql = mainModel::conectar()->prepare("UPDATE generacion  SET idGeneracion=:idActGener, fecha_inicio=:ActFecha_ini, fecha_fin=:ActFecha_fin WHERE idGeneracion=:idActGener ");

           $sql->bindParam(":idActGener", $datos['idActGener']);
           $sql->bindParam(":ActFecha_ini", $datos['ActFecha_ini']);
           $sql->bindParam(":ActFecha_fin",$datos['ActFecha_fin']);
           $sql->execute();


           return $sql;
       }




   }