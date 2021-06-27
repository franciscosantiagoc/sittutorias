<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModel.php";
} else {
    require_once "./modelos/usuarioModel.php";
}

class solicitudesController extends usuarioModel
{

    /* == controlador actualizar trabajador */
    public function consulta_solicitudes_controlador()
    {
        $consulta="SELECT SQL_CALC_FOUND_ROWS  s.Tutorado_NControl,p.Nombre,p.APaterno,p.AMaterno, s.tipo_solicitud, s.fecha_solicitud, s.estado FROM persona p ,tutorado c ,solicitudes s  WHERE p.idPersona=c.Persona_idPersona AND  c.NControl=s.Tutorado_NControl ORDER BY s.fecha_solicitud ";
        $consulta_solicitudes = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_solicitudes -> fetchAll();
        return $dat_info;


    }


}
