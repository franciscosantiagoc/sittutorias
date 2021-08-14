<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModel.php";
} else {
    require_once "./modelos/usuarioModel.php";
}

class tutoradosController extends usuarioModel
{
    public function consulta_tutorados_controlador($matricula)
    {
        if($_SESSION['roll_sti'] == "Docente"){
            $consulta="SELECT SQL_CALC_FOUND_ROWS  c.NControl,p.Nombre,p.APaterno,p.AMaterno,p.NTelefono, r.Nombre as NombreCar,  CONCAT( DATE_FORMAT(g.fecha_inicio,'%M %Y') ,'-', DATE_FORMAT(g.fecha_fin,'%M %Y')) as gener, b.fecha_asig FROM persona p , tutorado c, trabajador_tutorados b, carrera r, generacion g  WHERE p.idPersona=c.Persona_idPersona AND  b.Trabajador_Matricula= $matricula  AND b.Tutorado_NControl=c.NControl AND r.idCarrera = c.Carrera_idCarrera ORDER BY p.Nombre";
            $consulta_tutorados = mainModel::ejecutar_consulta_simple($consulta);
            $dat_info = $consulta_tutorados -> fetchAll();
        }else{
            $consulta="SELECT SQL_CALC_FOUND_ROWS  c.NControl,p.Nombre,p.APaterno,p.AMaterno,p.NTelefono FROM persona p , tutorado c  WHERE p.idPersona=c.Persona_idPersona    ORDER BY p.Nombre";
            $consulta_tutorados = mainModel::ejecutar_consulta_simple($consulta);
            $dat_info = $consulta_tutorados -> fetchAll();
        }
        return $dat_info;
    }

    public function consulta_asignacion_controlador(){

        $data = usuarioModel::ejecutar_consulta_simple("SELECT pt.Nombre as NombreTu, pt.APaterno as APaternoTu, pt.AMaterno as AMaternoTu, tu.NControl, ca.Nombre AS NombreC,DATE_FORMAT(tt.fecha_asig,'%d-%m-%Y') as fecha, CONCAT(ptr.Nombre,' ', ptr.APaterno, ' ', ptr.AMaterno) AS tutor, tr.Matricula FROM trabajador_tutorados tt, tutorado tu, carrera ca, trabajador tr, persona pt, persona ptr WHERE tu.NControl=tt.Tutorado_NControl AND tr.Matricula=tt.Trabajador_Matricula AND pt.idPersona=tu.Persona_idPersona AND ptr.idPersona=tr.Persona_idPersona AND ca.idCarrera=tu.Carrera_idCarrera;");

        return $data;
    }

    public function consulta_asigtutorado_controlador(){
        $nocontrol = mainModel::limpiar_cadena($_POST['asig_tutorado']);

        $data = usuarioModel::ejecutar_consulta_simple("SELECT pt.Nombre as NombreTu, pt.APaterno as APaternoTu, pt.AMaterno as AMaternoTu, tu.NControl, ca.idCarrera, tr.Matricula FROM trabajador_tutorados tt, tutorado tu, carrera ca, trabajador tr, persona pt, persona ptr WHERE tt.Tutorado_Ncontrol=$nocontrol AND tu.NControl=tt.Tutorado_NControl AND tr.Matricula=tt.Trabajador_Matricula AND pt.idPersona=tu.Persona_idPersona AND ptr.idPersona=tr.Persona_idPersona AND ca.idCarrera=tu.Carrera_idCarrera;");
        if($data->rowCount()==0){
            $alerta = [
                "Titulo" => "Error inesperado",
                "Texto" => "Error el usuario seleccionado no existe, recargue la página para continuar",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }

        $data = $data -> fetchAll();
        echo json_encode($data);
    }

    public function consulta_historico_controlador(){
        $nocontrol = mainModel::limpiar_cadena($_POST['hist_tutorado']);


        $check_nctrl = usuarioModel::ejecutar_consulta_simple("SELECT tu.NControl,CONCAT(p.Nombre, ' ',p.APaterno, ' ', p.AMaterno) as NombreTu, ca.Nombre as NCarrera FROM tutorado tu, persona p, carrera ca 
            WHERE tu.NControl=$nocontrol AND p.idPersona=tu.Persona_idPersona AND ca.idCarrera=tu.Carrera_idCarrera;");
        if($check_nctrl->rowCount()==0){
            $alerta = [
                "Titulo" => "Error inesperado",
                "Texto" => "Ha ocurrido un error al realizar la consulta, recargue la pagina para continuar $nocontrol",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        $data_tutorado = $check_nctrl ->fetch();

        $data = usuarioModel::ejecutar_consulta_simple("SELECT ha.idHistorico, tr.Matricula, ptr.Nombre, ptr.APaterno, ptr.AMaterno, ha.Fecha FROM historico_asignacion ha, trabajador tr, persona ptr WHERE ha.Tutorado_Ncontrol=$nocontrol AND tr.Matricula=ha.Trabajador_Matricula  AND ptr.idPersona=tr.Persona_idPersona;");
        if($data->rowCount()==0){
            $alerta = [
                "Titulo" => "Error inesperado",
                "Texto" => "Error al obtener el historico del alumno",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        $data= $data->fetchAll();


        $info =[
            'NControl'=> $data_tutorado['NControl'],
            'Nombre'=> $data_tutorado['NombreTu'],
            'Carrera'=> $data_tutorado['NCarrera'],
            'Tutores' => $data
        ];

        echo json_encode($info);
    }

    public function actualiza_asigtutorado_controlador(){
        $nocontrol = mainModel::limpiar_cadena($_POST['asig_ed_noctrl']);
        $matricula = mainModel::limpiar_cadena($_POST['asig_ed_tut']);
        $datos_asignacion_upd = [
            "Matricula" => $matricula,
            "NControl" =>  $nocontrol
        ];

        $data = usuarioModel::actualizar_asignacion_modelo($datos_asignacion_upd);
        usuarioModel::agregar_historicoasig_modelo($datos_asignacion_upd);
        if($data->rowCount()==0){
            $alerta = [
                "Titulo" => "Error inesperado",
                "Texto" => "Error el usuario seleccionado no existe, recargue la página para continuar matri: $matricula ncontrol:$nocontrol",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }else{
            $alerta = [
                "Titulo" => "Datos actualizados",
                "Texto" => "Se ha actualizado correctamente los datos",
                "Tipo" => "success"
            ];
            echo json_encode($alerta);
            exit();
        }
    }


    public function registra_asignación_controlador()
    {
        $matricula = mainModel::limpiar_cadena($_POST['number_asignacion']);

        $check_matricula = mainModel::ejecutar_consulta_simple("SELECT * FROM trabajador WHERE matricula=$matricula AND Roll='Coordinador de Carrera'");
        if ($check_matricula->rowCount() == 0) {
            $alerta = [
                "Titulo" => "Error inesperado",
                "Texto" => "Se ha detectado un error al asignar los tutorados recargue la página para continuar",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        //consulta de tutorados
        $tutorados = mainModel::ejecutar_consulta_simple("SELECT t.NControl FROM tutorado t,persona p,carrera c, trabajador tr WHERE p.idPersona=t.Persona_idPersona AND c.idCarrera=t.Carrera_idCarrera AND c.Areas_idAreas=tr.Areas_idAreas AND tr.Matricula=$matricula ORDER BY p.APaterno;");
        $datos_tutorados = $tutorados->fetchAll();


        //consulta de tutorados ya asignados
        $tutorados_asignados = mainModel::ejecutar_consulta_simple("SELECT Tutorado_NControl FROM trabajador_tutorados");
        $datos_tutorados_asig = $tutorados_asignados->fetchAll();

        //consulta de tutores disponibles
        $tutores_disponibles = mainModel::ejecutar_consulta_simple("SELECT t.Matricula FROM trabajador t,trabajador t2 WHERE t.Roll='Docente' AND t.Disponibilidad=1 AND t.Areas_idAreas=t2.Areas_idAreas AND t2.Matricula=$matricula");
        $datos_tutores = $tutores_disponibles->fetchAll();

        $iMax = count($datos_tutorados);
        $iMax2 = count($datos_tutorados_asig);
        if($iMax-$iMax2==0){
            $alerta = [
                "Titulo" => "Asignación no realizada",
                "Texto" => "No se han detectado alumnos sin asignar",
                "Tipo" => "info"
            ];
            echo json_encode($alerta);
            exit();
        }
        $array_registro = [];
        for ($i = 0; $i < $iMax; $i++) {
            $exit = false;
            for ($j = 0; $j < $iMax2; $j++) {
                //recorrido de tutorados y tabla de asignacion para conocer tutorados no asignados
                if ($datos_tutorados[$i][0] == $datos_tutorados_asig[$j][0]) {
                    $exit = true;
                }
            }
            if (!$exit) {//sino existe el tutorado entre los asignados se agrega al arreglo
                array_push($array_registro, $datos_tutorados[$i][0]);
            }
        }
        $total_al = count($array_registro);
        $total_tu = count($datos_tutores);
        $cont_tu = 0;
        for ($cont = 0; $cont < $total_al; $cont++) {
            $asignacion = [
                "NControl" => $array_registro[$cont],
                "Matricula" => $datos_tutores[$cont_tu][0]
            ];
            $registro = usuarioModel::agregar_asignacion_modelo($asignacion);
            $historico = usuarioModel::agregar_historicoasig_modelo($asignacion);
            $cont_tu++;
            if ($cont_tu == $total_tu) $cont_tu = 0; //reiniciando lista de tutores
        }


        if($registro->rowCount()==0 || $historico->rowCount()==0){
            $alerta = [
                "Titulo" => "Error inesperado",
                "Texto" => "Error realizar la asignación de los alumnos",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }else{
            $alerta = [
                "Titulo" => "Asignación exitosa",
                "Texto" => "Se han asignado un total de ".count($array_registro)." tutorados",
                "Tipo" => "success"
            ];
            echo json_encode($alerta);
            exit();
        }
    }

}