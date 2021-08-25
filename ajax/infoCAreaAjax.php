<?php
require_once "../config/APP.php";

$peticionAjax = true;
require_once "../controladores/jefesdController.php";
$ins_informacionCArea = new jefesdController();
if(isset($_POST['idInfoCArea'])){
    $respuesta= $ins_informacionCArea->consulta_jefesd_controlador($_POST['idInfoCArea']);
    echo json_encode($respuesta);
}elseif(isset($_POST['del_idJDepto'])){
    $respuesta= $ins_informacionCArea->eliminar_jdepto_controlador();
    echo json_encode($respuesta);

}else {
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}
?>