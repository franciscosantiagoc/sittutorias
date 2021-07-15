<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModel.php";
} else {
    require_once "./modelos/usuarioModel.php";
}

class coordinadorescController extends usuarioModel
{
    public function consulta_coordinadoresc_controlador()
    {
        $consulta="SELECT SQL_CALC_FOUND_ROWS  t.Matricula,p.Nombre,p.APaterno,p.AMaterno, p.Sexo, p.NTelefono, p.Correo, t.Carrera_idCarrera, p.Foto FROM persona p , trabajador t  WHERE p.idPersona=t.Persona_idPersona  AND t.Roll!='Admin' AND t.Roll='Coordinador De Carrera' AND t.Roll!='Coordinador De Area'  ORDER BY p.Nombre ";
        $consulta_coordinadoresc = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_coordinadoresc -> fetchAll();
        return $dat_info;
    }


}
