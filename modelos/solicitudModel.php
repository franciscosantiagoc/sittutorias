<?php
require_once "mainModel.php";

class solicitudModel extends mainModel
{
    /*-------------- Modelo agregar solicitud --------------*/
    protected static function agregar_solicitud_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT  INTO solicitudes (idSolicitud,Tutorado_NControl, tipo_solicitud, Trabajador_Matriculanuevo, fecha_solicitud, estado) VALUES (CONCAT(:ncontrol,DATE_FORMAT(NOW(),'%d%m%Y%I%i%s')),:ncontrol,:tsolicitud,:matricula ,CURDATE(),0) ");
        $sql->bindParam(":ncontrol", $datos['ncontrol']);
        $sql->bindParam(":tsolicitud", $datos['tsolicitud']);
        $sql->bindParam(":matricula",$datos['matricula']);
        $sql->execute();
         // $sql = "INSERT  INTO solicitudes (idSolicitud,Tutorado_NControl, tipo_solicitud, Trabajador_Matriculanuevo, fecha_solicitud, estado) VALUES (CONCAT(".$datos['ncontrol'].",DATE_FORMAT(NOW(),'%d%m%Y%I%i%s')),".$datos['ncontrol'].",".$datos['tsolicitud'].",".$datos['matricula']." ,CURDATE(),0) ";
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
        $sql = mainModel::conectar()->prepare("INSERT INTO historico_asignacion (idHistorico,Tutorado_NControl,Trabajador_Matricula,Fecha) VALUES (CONCAT(HOUR(NOW()),MINUTE(NOW()),DAY(CURDATE()),MONTH(CURDATE()), YEAR(CURDATE()),:ncontrol),:ncontrol,:matricula,CURDATE())");
        $sql->bindParam(":matricula", $datos['Matricula']);
        $sql->bindParam(":ncontrol", $datos['NControl']);
        $sql->execute();
        return $sql;
    }
    protected static function actualizar_solicitud_modelo($estado,$idsolic){
        $sql = mainModel::conectar()->prepare("UPDATE solicitudes SET estado=:estado WHERE idSolicitud=:idsolic");
        $sql->bindParam(":estado",$estado);
        $sql->bindParam(":idsolic",$idsolic);
        $sql->execute();
        return $sql;


    }
}