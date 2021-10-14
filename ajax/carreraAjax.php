<?php
require_once "../config/APP.php";

$peticionAjax = true;
require_once "../controladores/carrerasController.php";
$ins_carrera = new carrerasController();
if(isset($_POST['idAcCarrera']) && isset($_POST['idAcCArea'])){
    $respuesta= $ins_carrera->consulta_ac_carrera_controlador();
    echo json_encode($respuesta);
}elseif(isset($_POST['del_idCarrera'])){
    $respuesta= $ins_carrera->eliminar_carrera_controlador();
    echo json_encode($respuesta);

} else {
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}

?>