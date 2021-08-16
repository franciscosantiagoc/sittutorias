<?php

if ($peticionAjax) {
    require_once "../modelos/mainModel.php";
    require_once "../vendor/autoload.php";
} else {
    require_once "./modelos/mainModel.php";
    require_once "./vendor/autoload.php";
}

class formatsController extends mainModel {
    public function create_format_tutortutorados_controlador(){
        $generacion = mainModel::limpiar_cadena($_POST['format_tutortutorado_gener']);
        $matricula = mainModel::limpiar_cadena($_POST['format_tutortutorado_matricula']);
        if($generacion!="all")
            $generacion = "tu.Generacion_idGeneracion = ".$generacion." AND";
        else
            $generacion = "";

        //mainModel::ejecutar_consulta_simple("SET lc_time_names = 'es_MX';");
        $consulta_tutorados = mainModel::ejecutar_consulta_simple("SELECT CONCAT(ptu.nombre,' ', ptu.APaterno,' ', ptu.AMaterno) AS	nombre, tu.NControl, ca.Nombre AS carrera, CONCAT(DATE_FORMAT(ge.fecha_inicio,'%M %Y'),'-', DATE_FORMAT(ge.fecha_fin,'%M %Y')) AS gener FROM tutorado tu, persona ptu, carrera ca, generacion ge, trabajador_tutorados tt WHERE $generacion ptu.idPersona= tu.Persona_idPersona AND ca.idCarrera=tu.Carrera_idCarrera AND ge.idGeneracion=tu.Generacion_idGeneracion AND tu.NControl=tt.Tutorado_NControl AND tt.Trabajador_Matricula=$matricula ORDER BY ge.fecha_inicio, ptu.APaterno ASC;");

        $consulta_tutorados = $consulta_tutorados ->fetchAll();

        $consulta_actividades = mainModel::ejecutar_consulta_simple("SELECT ac.Nombre FROM actividades ac ORDER BY ac.Semestrerealizacion_sug;");

        $consulta_actividades = $consulta_actividades  ->fetchAll();

        $consulta_datos= mainModel::ejecutar_consulta_simple("SELECT CONCAT(p.Nombre,' ', p.APaterno,'  ', p.AMaterno)AS Nombre, CONCAT(DAY(CURDATE()),' de ',MONTHNAME(CURDATE()), ' del ',YEAR(CURDATE())) AS Fecha FROM trabajador t, persona p WHERE t.Matricula=99173 AND p.idPersona=t.Persona_idPersona;");

        $consulta_datos = $consulta_datos ->fetch();

        $datos=[
            "tutorados"=>$consulta_tutorados,
            "actividades"=>$consulta_actividades,
            "datos"=>$consulta_datos
        ];

        return $datos;



    }

}



?>