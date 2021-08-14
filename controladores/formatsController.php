<?php

if ($peticionAjax) {
    require_once "../modelos/mainModel.php";
    require_once "../vendor/autoload.php";
} else {
    require_once "./modelos/mainModel.php";
    require_once "./vendor/autoload.php";
}

class formatsController extends mainModel {
    public function create_format_controlador(){
        $generacion = mainModel::limpiar_cadena($_POST['format_tutor_gener']);
        $consulta = mainModel::ejecutar_consulta_simple("SELECT CONCAT(ptu.nombre,' ', ptu.APaterno,' ', ptu.AMaterno) AS	nombre, tu.NControl, ca.Nombre AS carrera, CONCAT( DATE_FORMAT(ge.fecha_inicio,'%M %Y'),'-',  DATE_FORMAT(ge.fecha_fin,'%M %Y')) AS fecha   
        FROM trabajador_tutorados tt, tutorado tu, persona ptu, carrera ca, generacion ge WHERE tt.Trabajador_Matricula=99173 AND tu.NControl=tt.Tutorado_NControl AND ca.idCarrera=tu.Carrera_idCarrera 
        AND ge.idGeneracion=tu.Generacion_idGeneracion AND ge.idGeneracion=161; ");
        $html = '';
        $pdf = new \Mpdf\Mpdf();
        $pdf->WriteHTML($html);
        $pdf->Output();



    }

}



?>