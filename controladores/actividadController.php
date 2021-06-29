<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModel.php";
} else {
    require_once "./modelos/usuarioModel.php";
}

class actividadController extends usuarioModel
{
    public function consulta_actividad_controlador($ncontrol)
    {
        $consulta_actividad = mainModel::ejecutar_consulta_simple("SELECT idActividades,Nombre,Fecha_registro ,Descripcion, Semestrerealizacion_sug FROM actividades;");
        $dat_info = $consulta_actividad -> fetchAll();
        $resultado = [];
        foreach($dat_info as $rows){
            $consult_entrega = mainModel::ejecutar_consulta_simple('SELECT * FROM actividades_asignadas WHERE Actividades_idActividades='. $rows['idActividades'] .' AND Tutorado_NControl=' . $ncontrol . ';');
            if($consult_entrega->rowCount() > 0){
                $rows['Estado']= 'Entregado';
            }else{
                $rows['Estado']= 'No entregado';
            }
            array_push($resultado, $rows);
        }
        return $resultado;
    }

}