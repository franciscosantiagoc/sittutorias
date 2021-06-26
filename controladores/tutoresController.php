<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModel.php";
} else {
    require_once "./modelos/usuarioModel.php";
}

class tutoresController extends usuarioModel
{
    public function consulta_tutores_controlador()
    {
        $consulta="SELECT SQL_CALC_FOUND_ROWS  t.Matricula,p.Nombre,p.APaterno,p.AMaterno,p.NTelefono FROM persona p , trabajador t  WHERE p.idPersona=t.Persona_idPersona  AND t.Roll!='Admin' AND t.Roll!='Coordinador De Carrera' AND t.Roll!='Coordinador De Area'  ORDER BY p.Nombre ";
        $consulta_tutores = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_tutores -> fetchAll();
        return $dat_info;


    }

}