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
}