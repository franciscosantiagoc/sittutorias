<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModel.php";
} else {
    require_once "./modelos/usuarioModel.php";
}

class tutoradosController extends usuarioModel
{
    public function consulta_tutorados_controlador($matricula)
    {
        $consulta="SELECT SQL_CALC_FOUND_ROWS  c.NControl,p.Nombre,p.APaterno,p.AMaterno,p.NTelefono, b.fecha_asig FROM persona p , tutorado c, trabajador_tutorados b  WHERE p.idPersona=c.Persona_idPersona AND  b.Trabajador_Matricula= $matricula  AND b.Tutorado_NControl=c.NControl ORDER BY p.Nombre";
        $consulta_tutorados = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_tutorados -> fetchAll();
        return $dat_info;


    }

}