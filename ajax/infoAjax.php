<?php
require_once "../config/APP.php";

$peticionAjax = true;
if(isset($_POST['idInformacion'])){
    require_once "../controladores/coordinadorescController.php";
    $ins_informacion = new coordinadorescController();
    $respuesta= $ins_informacion->consulta_coordinadoresc_controlador($_POST['idInformacion']);
    echo json_encode($respuesta);
    /* echo 'Respuesta actividad ajax';*/
}else {
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}
?>