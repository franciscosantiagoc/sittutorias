<?php
if ($peticionAjax) {
    require_once "../modelos/mainModel.php";
} else {
    require_once "./modelos/mainModel.php";
}

class estadisticosController extends mainModel
{
    public function obtener_grafica_controlador()
    {
        if($_POST['g_data']=="Riesgo"){
            $limit=$_POST['g_nperiod'];
            $sem=$_POST['g_sem'];

            $consulta= "SELECT CONCAT(MONTHNAME(g.fecha_inicio),'-',YEAR(g.fecha_inicio),' to ',MONTHNAME(g.fecha_fin),'-',YEAR(g.fecha_fin)) AS gen, COUNT(*) AS conteo
            FROM actividades_asignadas aa
            INNER JOIN actividades a ON a.idActividades=aa.Actividades_idActividades
            INNER JOIN tutorado t ON t.NControl=aa.Tutorado_NControl
            INNER JOIN generacion g ON t.Generacion_idGeneracion=g.idGeneracion
            WHERE a.Semestrerealizacion_sug='$sem' AND a.Semestre_obligatorio='1' AND aa.Puntuacion='5'
            GROUP BY gen ORDER BY gen ASC LIMIT $limit;";
             $datos = mainModel::ejecutar_consulta_simple($consulta);
            $datos = $datos -> fetchAll(); 
           return $datos; 
            /*return $consulta;*/

        }else if($_POST['g_data']=="Alumnos"){
            $group_sex='';
            $cond_genunica='';
            $consulta = "SELECT CONCAT(MONTHNAME(g.fecha_inicio),'-',YEAR(g.fecha_inicio),' to ',MONTHNAME(g.fecha_fin),'-',YEAR(g.fecha_fin))";
            
            if($_POST['g_period']!="all"){//periodo obtener todos los periodos
                $gen= mainModel::limpiar_cadena($_POST['g_period']);
                $cond_genunica = " AND t.Generacion_idGeneracion=".$gen;
                $group_sex = ",p.Sexo ORDER BY p.Sexo ASC";
                $consulta .= ",p.sexo";
            }
            $consulta .=" AS gen, COUNT(*) AS conteo FROM tutorado t, generacion g, persona p WHERE p.idPersona=t.Persona_idPersona ";

            if($_POST['g_sex']!="all" && $_POST['g_period']=="all"){//Sexo
               $sex= mainModel::limpiar_cadena($_POST['g_sex']); 
               $consulta = $consulta ." AND p.Sexo='".$sex."' ";
            }
           
            $consulta = $consulta . "$cond_genunica AND g.idGeneracion=t.Generacion_idGeneracion GROUP BY t.Generacion_idGeneracion $group_sex";

            $datos = mainModel::ejecutar_consulta_simple($consulta);
            $datos = $datos -> fetchAll(); 
            return $datos; 

             /*return $consulta;*/
        }
        //return 'graficacion controller data:'.$_POST['g_data'].'  per:'.$_POST['g_period'].' sex:'.$_POST['g_sex'];
    }


}