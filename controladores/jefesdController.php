<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModel.php";
} else {
    require_once "./modelos/usuarioModel.php";
}

class jefesdController extends usuarioModel
{
    public function consulta_jefesd_controlador()
    {
        $consulta="SELECT SQL_CALC_FOUND_ROWS  t.Matricula,p.Nombre,p.APaterno,p.AMaterno, p.Sexo, p.NTelefono, p.Correo,  a.Nombre as aname, p.Foto FROM persona p , trabajador t, areas a   WHERE p.idPersona=t.Persona_idPersona AND idAreas= Areas_idAreas AND t.Roll!='Admin' AND t.Roll!='Coordinador De Carrera' AND t.Roll='Coordinador De Area'  ORDER BY p.Nombre ";
        $consulta_jefesd = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_jefesd -> fetchAll();
        return $dat_info;


    }

} 