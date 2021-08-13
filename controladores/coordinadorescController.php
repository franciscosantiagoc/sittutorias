<?php
if ($peticionAjax) {
    require_once "../modelos/mainModel.php";
} else {
    require_once "./modelos/mainModel.php";
}

class coordinadorescController extends mainModel
{
    public function consulta_coordinadoresc_controlador()
    {
        $consulta="SELECT SQL_CALC_FOUND_ROWS  t.Matricula,p.Nombre,p.APaterno,p.AMaterno, p.Sexo, p.NTelefono, p.Correo, a.Nombre as aname, p.Foto FROM persona p , trabajador t, areas a WHERE p.idPersona=t.Persona_idPersona  AND a.idAreas=t.Areas_idAreas  AND t.Roll='Coordinador De Carrera'  ORDER BY p.Nombre ";
        $consulta_coordinadoresc = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_coordinadoresc -> fetchAll();

        return $dat_info;
    }


}
