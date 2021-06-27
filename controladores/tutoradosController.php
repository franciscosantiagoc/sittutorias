<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModel.php";
} else {
    require_once "./modelos/usuarioModel.php";
}

class tutoradosController extends usuarioModel
{
    public function consulta_tutorados_controlador()
    {
        $consulta="SELECT SQL_CALC_FOUND_ROWS  c.NControl,p.Nombre,p.APaterno,p.AMaterno,p.NTelefono FROM persona p , tutorado c  WHERE p.idPersona=c.Persona_idPersona  ORDER BY p.Nombre";
        $consulta_tutorados = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_tutorados -> fetchAll();
        return $dat_info;


    }

}