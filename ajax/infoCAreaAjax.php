<?php
require_once "../config/APP.php";

$peticionAjax = true;
if(isset($_POST['idInfoCArea'])){
    require_once "../controladores/jefesdController.php";
    $ins_informacionCArea = new jefesdController();
    $respuesta= $ins_informacionCArea->consulta_jefesd_controlador($_POST['idInfoCArea']);
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