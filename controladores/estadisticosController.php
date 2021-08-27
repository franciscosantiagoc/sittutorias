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
         //$consulta="SELECT SQL_CALC_FOUND_ROWS  t.Matricula,p.Nombre,p.APaterno,p.AMaterno, p.Sexo, p.NTelefono, p.Correo, t.Carrera_idCarrera, p.Foto FROM persona p , trabajador t  WHERE p.idPersona=t.Persona_idPersona  AND t.Roll!='Admin' AND t.Roll='Coordinador De Carrera' AND t.Roll!='Coordinador De Area'  ORDER BY p.Nombre ";
        /* $consulta_coordinadoresc = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_coordinadoresc -> fetchAll();
        return $dat_info;  */
        /*
         * Riesgo desercion
         SELECT COUNT(*),aa.Puntuacion,t.Generacion_idGeneracion,CONCAT(DATE_FORMAT(g.fecha_inicio,'%M %Y'),' - ',DATE_FORMAT(g.fecha_fin,'%M %Y')) AS Generacion FROM actividades_asignadas aa, actividades a, tutorado t, carrera c,generacion g WHERE a.idActividades=aa.Actividades_idActividades AND
t.NControl=aa.Tutorado_NControl AND c.idCarrera=t.Carrera_idCarrera AND g.idGeneracion=t.Generacion_idGeneracion AND aa.Puntuacion!='NULL' GROUP BY aa.Puntuacion,t.Generacion_idGeneracion;
         * */
        if($_POST['g_data']=="Bajas"){

        }else if($_POST['g_data']=="Alumnos"){
            $consulta = "SELECT CONCAT(MONTHNAME(g.fecha_inicio),'-',YEAR(g.fecha_inicio),' to ',MONTHNAME(g.fecha_fin),'-',YEAR(g.fecha_fin)) AS gen, COUNT(*) AS conteo FROM tutorado t, generacion g, persona p WHERE p.idPersona=t.Persona_idPersona ";
            //if($datos[1]=="Todo")carrera
            if($_POST['g_period']!="all"){//periodo obtener todos los periodos
                $gen= mainModel::limpiar_cadena($_POST['g_period']);
                $consulta = $consulta ." AND t.Generacion_idGeneracion=".$gen;
            }

            if($_POST['g_sex']!="all"){//Sexo
               $sex= mainModel::limpiar_cadena($_POST['g_sex']); 
               $consulta = $consulta ." AND p.Sexo='".$sex."' ";
            }
            //if($datos[2]=="all"){
            $consulta = $consulta . " AND g.idGeneracion=t.Generacion_idGeneracion GROUP BY t.Generacion_idGeneracion";
            //}
            $datos = mainModel::ejecutar_consulta_simple($consulta);
             $datos = $datos -> fetchAll(); /**/
            return $datos;
        }
        //return 'graficacion controller data:'.$_POST['g_data'].'  per:'.$_POST['g_period'].' sex:'.$_POST['g_sex'];
    }


}