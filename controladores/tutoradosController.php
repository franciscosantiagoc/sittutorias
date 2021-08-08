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
            $consulta="SELECT SQL_CALC_FOUND_ROWS  c.NControl,p.Nombre,p.APaterno,p.AMaterno,p.NTelefono, b.fecha_asig FROM persona p , tutorado c, trabajador_tutorados b  WHERE p.idPersona=c.Persona_idPersona AND  b.Trabajador_Matricula= $matricula  AND b.Tutorado_NControl=c.NControl ORDER BY p.Nombre";
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

        $data = usuarioModel::ejecutar_consulta_simple("SELECT pt.Nombre as NombreTu, pt.APaterno as APaternoTu, pt.AMaterno as AMaternoTu, tu.NControl, ca.Nombre AS NombreC, CONCAT(ptr.Nombre,' ', ptr.APaterno, ' ', ptr.AMaterno) AS tutor, tr.Matricula FROM trabajador_tutorados tt, tutorado tu, carrera ca, trabajador tr, persona pt, persona ptr WHERE tu.NControl=tt.Tutorado_NControl AND tr.Matricula=tt.Trabajador_Matricula AND pt.idPersona=tu.Persona_idPersona AND ptr.idPersona=tr.Persona_idPersona AND ca.idCarrera=tu.Carrera_idCarrera;");

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

    public function actualiza_asigtutorado_controlador(){
        $nocontrol = mainModel::limpiar_cadena($_POST['asig_ed_noctrl']);
        $matricula = mainModel::limpiar_cadena($_POST['asig_ed_tut']);
        $datos_asignacion_upd = [
            "Matricula" => $matricula,
            "NControl" =>  $nocontrol
        ];

        $data = usuarioModel::actualizar_asignacion_modelo($datos_asignacion_upd);
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

}