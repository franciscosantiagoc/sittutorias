<?php
require_once "../config/APP.php";

$peticionAjax = true;
require_once "../controladores/coordinadorescController.php";
$ins_informacionCCarrera = new coordinadorescController();
if(isset($_POST['idInfoCCarrera'])){
    $respuesta= $ins_informacionCCarrera->consulta_coordinadoresc_controlador($_POST['idInfoCCarrera']);
    echo json_encode($respuesta);
}elseif(isset($_POST['del_idCCarrera'])){
    $respuesta= $ins_informacionCCarrera->eliminar_ccarrera_controlador();
    echo json_encode($respuesta);

}else {
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}
?>