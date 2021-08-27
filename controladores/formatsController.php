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

    public function create_format_cctutores_controlador(){
        $matricula = mainModel::limpiar_cadena($_POST['format_cctutores_matricula']);

        //mainModel::ejecutar_consulta_simple("SET lc_time_names = 'es_MX';");
        $estado=mainModel::limpiar_cadena($_POST["tutores"]);
        $consulta_tutoracti = mainModel::ejecutar_consulta_simple("SELECT CONCAT(p.nombre,' ', p.APaterno,' ', p.AMaterno) AS	nombre, tr.Matricula, a.Nombre AS area FROM trabajador cor, trabajador tr, persona p, areas a
        WHERE  cor.Matricula=$matricula AND a.idAreas=cor.Areas_idAreas AND tr.Areas_idAreas=a.idAreas  AND tr.Disponibilidad=$estado AND p.idPersona=tr.Persona_idPersona 
        ORDER BY  p.APaterno ASC;");

        $consulta_tutoracti = $consulta_tutoracti ->fetchAll();


        $consulta_datos= mainModel::ejecutar_consulta_simple("SELECT CONCAT(p.Nombre,' ', p.APaterno,'  ', p.AMaterno)AS Nombre, CONCAT(DAY(CURDATE()),' de ',MONTHNAME(CURDATE()), ' del ',YEAR(CURDATE())) AS Fecha FROM trabajador t, persona p WHERE t.Matricula=$matricula AND p.idPersona=t.Persona_idPersona;");

        $consulta_datos = $consulta_datos ->fetch();

        $datos=[
            "tutores"=>$consulta_tutoracti,
            "datos"=>$consulta_datos
        ];

        return $datos;



    }


    public function create_format_rootcoordinadoresar_controlador(){

        //mainModel::ejecutar_consulta_simple("SET lc_time_names = 'es_MX';");
        $consulta_tutoracti = mainModel::ejecutar_consulta_simple("SELECT CONCAT(p.nombre,' ', p.APaterno,' ', p.AMaterno) AS	nombre, tr.Matricula, a.Nombre AS AREA, tr.Roll FROM  trabajador tr, persona p, areas a
        WHERE   tr.Roll='Coordinador De Area' AND p.idPersona=tr.Persona_idPersona AND a.idAreas=tr.Areas_idAreas
        ORDER BY  p.APaterno ASC;");

        $consulta_tutoracti = $consulta_tutoracti ->fetchAll();


        $consulta_datos= mainModel::ejecutar_consulta_simple("SELECT CONCAT(p.Nombre,' ', p.APaterno,'  ', p.AMaterno)AS Nombre, CONCAT(DAY(CURDATE()),' de ',MONTHNAME(CURDATE()), ' del ',YEAR(CURDATE())) AS Fecha FROM trabajador t, persona p WHERE t.Roll='Admin' AND p.idPersona=t.Persona_idPersona;");

        $consulta_datos = $consulta_datos ->fetch();

        $datos=[
            "jefes"=>$consulta_tutoracti,
            "datos"=>$consulta_datos
        ];

        return $datos;



    }

    public function create_format_rootcoordinadorescr_controlador(){


        $consulta_tutoracti = mainModel::ejecutar_consulta_simple("SELECT CONCAT(p.nombre,' ', p.APaterno,' ', p.AMaterno) AS	nombre, tr.Matricula, a.Nombre AS AREA, tr.Roll FROM  trabajador tr, persona p, areas a
        WHERE   tr.Roll='Coordinador De Carrera' AND p.idPersona=tr.Persona_idPersona AND a.idAreas=tr.Areas_idAreas
        ORDER BY  p.APaterno ASC;");

        $consulta_tutoracti = $consulta_tutoracti ->fetchAll();


        $consulta_datos= mainModel::ejecutar_consulta_simple("SELECT CONCAT(p.Nombre,' ', p.APaterno,'  ', p.AMaterno)AS Nombre, CONCAT(DAY(CURDATE()),' de ',MONTHNAME(CURDATE()), ' del ',YEAR(CURDATE())) AS Fecha FROM trabajador t, persona p WHERE t.Roll='Admin' AND p.idPersona=t.Persona_idPersona;");

        $consulta_datos = $consulta_datos ->fetch();

        $datos=[
            "coordinadoresc"=>$consulta_tutoracti,
            "datos"=>$consulta_datos
        ];

        return $datos;



    }

    // Jefe de Depto.
    public function create_format_jdeptoccarrera_controlador(){

        $idmatjf=mainModel::limpiar_cadena($_SESSION['matricula_sti']);
        $consulta_tutoracti = mainModel::ejecutar_consulta_simple("SELECT CONCAT(p.nombre,' ', p.APaterno,' ', p.AMaterno) AS	nombre, tr.Matricula, a.Nombre AS AREA, tr.Roll FROM  trabajador tr,trabajador tr2, persona p, areas a
        WHERE  tr2.Matricula=$idmatjf AND tr.Roll='Coordinador De Carrera' AND tr.Areas_idAreas=tr2.Areas_idAreas AND p.idPersona=tr.Persona_idPersona AND a.idAreas=tr.Areas_idAreas
        ORDER BY  p.APaterno ASC;");

        $consulta_tutoracti = $consulta_tutoracti ->fetchAll();


        $consulta_datos= mainModel::ejecutar_consulta_simple("SELECT CONCAT(p.Nombre,' ', p.APaterno,'  ', p.AMaterno)AS Nombre, CONCAT(DAY(CURDATE()),' de ',MONTHNAME(CURDATE()), ' del ',YEAR(CURDATE())) AS Fecha FROM trabajador t, persona p WHERE t.Matricula=$idmatjf AND p.idPersona=t.Persona_idPersona;");

        $consulta_datos = $consulta_datos ->fetch();

        $datos=[
            "coordinadoresc"=>$consulta_tutoracti,
            "datos"=>$consulta_datos
        ];

        return $datos;



    }

}



?>